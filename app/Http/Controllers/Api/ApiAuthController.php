<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllersService;
use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Mail\SendCodeVerifiy;
use App\Models\Store;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
            'fcm_token' => 'nullable|string'
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', $request->get('email'))->first();

            if ($user->account_status == "Verified") {
                return $this->generateToken($request, $user);
            } else {
                $message = '';
                if ($user->account_status == "Blocked") {
                    $message = Messages::getMessage('IN_ACTIVE_ACCOUNT');
                }
                if($user->account_status == "UnVerified"){
                    $message = Messages::getMessage('NOT_VERIFIED');
                }
                return response()->json([
                    'status' => false,
                    'message' => $message,
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    private function generateToken(Request $request, $user,$type = 'login')
    {
        try {
        $response = Http::asForm()->post(env('API_TOKEN_URL'), [
            'grant_type' => 'password',
            'client_id' => env('USER_CLIENT_ID'),
            'client_secret' => env('USER_CLIENT_SECRET'),
            'username' => $request->get('email'),
            'password' => $request->get('password'),
            'scope' => '*',
        ]);

        if($type == 'login'){
            $this->saveFcmToken($request, $user);
        }
        $user->setAttribute('token', $response->json()['access_token']);
        $user->setAttribute('token_type', $response->json()['token_type']);
        $user->setAttribute('refresh_token', $response->json()['refresh_token']);
        $this->revokePreviousTokens($user);
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage($type == "login" ? 'LOGGED_IN_SUCCESSFULLY' : 'AUTH_CODE_SENT'),
            'code_debug' => $type == 'register' ? $user->code_active_debug : '-',
            'data' => new UserResource($user),
        ], Response::HTTP_OK);
        } catch (Exception $e) {
            $message = '';
            if ($response->json()['error'] == 'invalid_grant') {
                $message = Messages::getMessage('ERROR_CREDENTIALS');
            } else {
                $message = Messages::getMessage($type == "login" ? 'LOGIN_IN_FAILED' : 'REGISTER_FAILED');
            }
            return response()->json([
                'status' => false,
                'message' => $message,
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    private function saveFcmToken(Request $request, User $user)
    {
        $user->fcm_token = $request->get('fcm_token');
        $user->save();
    }


    public function forgetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', $request->get('email'))->first();
            // if ($user->verified) {
                $code = random_int(1000, 9999);
                $user->verification_code = Hash::make($code);
                $isSaved = $user->save();
                // send code
                $this->sendResetPasswordCode($user,$code);
                return response()->json([
                    'status' => $isSaved,
                    'message' => $isSaved ? Messages::getMessage('FORGET_PASSWORD_SUCCESS') : Messages::getMessage('FORGET_PASSWORD_FAILED'),
                    'code_debug' => $code
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            // } else {
            //     return response()->json([
            //         'status' => false,
            //         'message' => Messages::getMessage('NOT_VERIFIED'),
            //     ], Response::HTTP_FORBIDDEN);
            // }
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
            'code' => 'required|numeric|digits:4',
            'password' => 'required|string|confirmed',
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', $request->get('email'))->first();
            if(!is_null($user->verification_code)){
                if(Hash::check($request->input('code'),$user->verification_code)){
                    $user->password = Hash::make($request->get('password'));
                    $user->verification_code = null;
                    $isSaved = $user->save();
                    return response()->json([
                        'status' => $isSaved,
                        'message' => $isSaved ? Messages::getMessage('RESET_PASSWORD_SUCCESS') : Messages::getMessage('RESET_PASSWORD_FAILED')
                    ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => Messages::getMessage('FAILD_CHECKED')
                    ], Response::HTTP_BAD_REQUEST);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => Messages::getMessage('NO_PASSWORD_RESET_CODE')
                ], Response::HTTP_BAD_REQUEST);
            }
           
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'current_password' => 'required|string|password:user-api|min:3',
            'new_password' => 'required|confirmed',
        ]);

        if (!$validator->fails()) {
            $user = auth('user-api')->user();
            $user->password = Hash::make($request->get('new_password'));
            $isSaved = $user->save();
            return response()->json([
                'status' => $isSaved,
                'message' => $isSaved ? Messages::getMessage('CHANGE_PASSWORD_SUCCESS') : Messages::getMessage('CHANGE_PASSWORD_FAILED')
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function register(Request $request)
    {
        $roles = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_date' => 'required|date:Y-m-d',
            'address' => 'required|string',
            'street_name' => 'required|string',
            'phone_number' => 'required|string',
            'home_number' => 'required|string',
            'flat_number' => 'required|string',
            'account_type' => 'required|string|in:Regular,Professional',
            'region_id' => 'required|numeric|exists:regions,id',
            'job_id' => 'required|numeric|exists:jobs,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'country_id' => 'required|numeric|exists:countries,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:12|confirmed',
            'gender' => 'required|string|in:M,F',
            'agree' => 'required|string|in:true,false'
        ];
        $validator = Validator($request->all(), $roles);
        if (!$validator->fails()) {
            $user = new User();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->birth_date = $request->input('birth_date');
            $user->address = $request->input('address');
            $user->street_name = $request->input('street_name');
            $user->phone_number = $request->input('phone_number');
            $user->home_number = $request->input('home_number');
            $user->flat_number = $request->input('flat_number');
            $user->account_type = $request->input('account_type');
            $user->region_id = $request->input('region_id');
            $user->job_id = $request->input('job_id');
            $user->city_id = $request->input('city_id');
            $user->country_id = $request->input('country_id');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->gender = $request->input('gender');
            $user->agree = $request->input('agree') == 'true' ? true : false;
            $isSaved = $user->save();
            if ($isSaved) {
                $code = random_int(1000, 9999);
                $this->sendActivationCodeDebug($user,$code);
                $user->setAttribute('code_active_debug',$code);
                return $this->generateToken($request,$user,'register');
            } else {
                return ControllersService::generateProcessResponse(false, 'REGISTER');
            }
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function updateProfile(Request $request)
    {
        $roles = [
            'city_id' => 'required|integer|exists:cities,id',
            'name' => 'required|string|min:3|max:30',
            'gender' => 'required|string|in:M,F',
        ];
        $validator = Validator($request->all(), $roles);
        if (!$validator->fails()) {
            $user = auth('user-api')->user();
            $user->name = $request->get('name');
            $user->gender = $request->get('gender');
            $user->city_id = $request->get("city_id");
            $isSaved = $user->save();
            return response()->json([
                'status' => $isSaved,
                'message' => $isSaved ? Messages::getMessage('USER_UPDATED_SUCCESS') : Messages::getMessage('USER_UPDATED_FAILED')
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    private function sendActivationCodeDebug(User $user,$code)
    {
        $user->verification_code = Hash::make($code);
        $user->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => Messages::getMessage('AUTH_CODE_SENT'),
        //     'code' => $code
        // ], Response::HTTP_CREATED);
        
    }

    private function sendActivationCode(User $user)
    {
        $code = random_int(1000, 9999);
        $user->verification_code = Hash::make($code);
        $user->save();
        Mail::to($user)->send(new SendCodeVerifiy($code));
        // return response()->json([
        //     'status' => true,
        //     'message' => Messages::getMessage('AUTH_CODE_SENT'),
        //     'code' => $code
        // ], Response::HTTP_CREATED);
        
    }

    public function sendResetPasswordCode(User $user,$code){
        $user->verification_code = Hash::make($code);
        $user->save();
        Mail::to($user)->send(new SendCodeVerifiy($code));
    }

    public function checkResetPasswordCode(Request $request){
        $user = User::where('email',$request->input('email'))->first();
        if(Hash::check($request->input('code'),$user->verification_code)){
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('SUCCESS_CHECKED'),
            ], Response::HTTP_CREATED);
        }else{
            return response()->json([
                'status' => false,
                'message' => Messages::getMessage('FAILD_CHECKED'),
            ], Response::HTTP_CREATED);
        }
    }

    public function sendVerifiyCode(Request $request)
    {
        $user = auth()->user();
        $code = random_int(1000, 9999);
        $user->verification_code = Hash::make($code);
        $user->save();
        Mail::to($user)->send(new SendCodeVerifiy($code));

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('AUTH_CODE_SENT'),
            'code_debug' => $code
        ], Response::HTTP_CREATED);
    }

    public function checkCode(Request $request)
    {
        if(Hash::check($request->input('code'),auth()->user()->verification_code)){
            $user = auth()->user();
            $user->account_status = "Verified";
            $user->verification_code = null;
            $user->save();
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('SUCCESS_CHECKED'),
            ], Response::HTTP_CREATED);
        }else{
            return response()->json([
                'status' => false,
                'message' => Messages::getMessage('FAILD_CHECKED'),
            ], Response::HTTP_CREATED);
        }
    }


    public function activateAccount(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|digits:9|exists:users,email',
            'code' => 'required|numeric|digits:4',
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', $request->get('email'))->first();
            if (!is_null($user->verification_code)) {
                if (Hash::check($request->get('code'), $user->verification_code)) {
                    $user->verification_code = null;
                    $user->verified = true;
                    $isSaved = $user->save();
                    if ($isSaved) $user->assignRole(Role::findByName('Customer-API', 'user-api'));
                    return response()->json([
                        'status' => $isSaved,
                        'message' => $isSaved ? Messages::getMessage('SUCCESS_AUTH') : Messages::getMessage('FAILED_AUTH')
                    ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
                } else {
                    return ControllersService::generateProcessResponse(false, 'AUTH_CODE_ERROR');
                }
            } else {
                if ($user->verified) {
                    return ControllersService::generateProcessResponse(false, 'VERIFIED_BOFORE');
                } else {
                    return $this->sendActivationCode($user);
                }
            }
        } else {
            return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function logout()
    {
        $token = auth('user-api')->user()->token();
        $isRevoked = $token->revoke();
        return response()->json([
            'status' => $isRevoked,
            'message' => $isRevoked ? Messages::getMessage('LOGGED_OUT_SUCCESSFULLY') : Messages::getMessage('LOGGED_OUT_FAILED'),
        ], $isRevoked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function refreshFcmToken(Request $request)
    {
        $validator = Validator($request->all(), [
            'fcm_token' => 'required|string'
        ]);
        if (!$validator->fails()) {
            $user = auth('api')->user();
            $user->fcm_token = $request->get('fcm_token');
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Token refreshed successfully'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    private function revokePreviousTokens($userId)
    {
        DB::table('oauth_access_tokens')
            ->where('user_id', $userId)
            ->update([
                'revoked' => true
            ]);
    }

    private function checkForActiveTokens($userId)
    {
        return DB::table('oauth_access_tokens')
            ->where('user_id', $userId)
            ->where('revoked', false)
            ->exists();
    }




     

}
