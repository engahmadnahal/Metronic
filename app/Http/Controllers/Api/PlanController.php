<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use App\Models\Language;
use App\Models\Plan;
use App\Models\PlanUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanController extends Controller
{
    public function getPlans(Request $request){
        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code' ,$selectLang)->first();
        $plan = Plan::whereHas('translations',function($q) use($lang){
            $q->where('language_id',$lang->id);
        })->where('active',true)->with(['translations' => function($q) use($lang){
            $q->where('language_id',$lang->id);
        }])->get();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => PlanResource::collection($plan)
        ]);
    }


    public function subscription(Request $request){
        $validator = Validator($request->all(),[
            'plan_id' => 'required|numeric|exists:plans,id'
        ]);

        if(!$validator->fails()){
            $plan = Plan::find($request->input('plan_id'));
            // Logic Payment Getway is Here

            $startDate = Carbon::now();
            $endDate = Carbon::now()->addMonth($plan->max_month);

            $planUser = new PlanUser;
            $planUser->user_id = auth()->user()->id;
            $planUser->plan_id = $request->input('plan_id');
            $planUser->cost = $plan->price - ($plan->price * ($plan->discount_value / 100 ));
            $planUser->start = $startDate;
            $planUser->end = $endDate;
            $planUser->save();

            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('SUCCESS_SUBSC'),
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ],Response::HTTP_BAD_REQUEST);
        }
    }
}
