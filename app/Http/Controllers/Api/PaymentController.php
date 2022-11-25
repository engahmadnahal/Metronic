<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Language;
use App\Models\Payment;
use App\Models\PaymentUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{

    

    public function getPayments(Request $request){
        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code' ,$selectLang)->first();
        $payments = Payment::where('active',true)->get();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => PaymentResource::collection($payments)
        ]);
    }

    public function sendPaymentUser(Request $request){
        $validator = Validator($request->all(), [
            'payment_id' => 'required|numeric|exists:payments,id'
        ]);
        if (!$validator->fails()) {
            PaymentUser::updateOrCreate([
                'user_id' => auth()->user()->id
            ],[
                'payment_id' => $request->input('payment_id')
            ]);
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('SUCCESS_SEND')
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    
}
