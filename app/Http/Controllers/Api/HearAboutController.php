<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HearAboutResource;
use App\Models\HearAbout;
use App\Models\HearAboutUser;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HearAboutController extends Controller
{


    public function getHearAbout(Request $request){
        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code' ,$selectLang)->first();
        $hear = HearAbout::whereHas('translations',function($q) use($lang){
            $q->where('language_id',$lang->id);
        })->with('translations')->get();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => HearAboutResource::collection($hear)
        ]);
    }

    public function sendHearAbout(Request $request){
        $validator = Validator($request->all(), [
            'hear_about_us_id' => 'required|numeric|exists:hear_abouts,id'
        ]);
        if (!$validator->fails()) {
            $hearAbout = new HearAboutUser;
            $hearAbout->hear_about_id = $request->input('hear_about_us_id');
            $hearAbout->user_id = auth()->user()->id;
            $hearAbout->save();
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
