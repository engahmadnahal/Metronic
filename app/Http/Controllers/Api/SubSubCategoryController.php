<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\SubSubCategoryResource;
use App\Models\Language;
use App\Models\SubSubCatergory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    //

    

    public function getSubSubCategories(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code' ,$selectLang)->first();

        $subSubCatergory = SubSubCatergory::whereHas('translations',function($q) use($lang){
            $q->where('language_id',$lang->id);

        })->with(['translations' => function($q) use($lang){
            $q->where('language_id',$lang->id);
        }])->where('active',true)->get();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => SubSubCategoryResource::collection($subSubCatergory)
        ]);

    }

    public function getSingleSubSubCategory(Request $request,SubSubCatergory $subSubCatergory){
        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code' ,$selectLang)->first();


        $subSubCatergory = $subSubCatergory->with(['translations' => function($q) use($lang){
            $q->where('language_id',$lang->id);
        }])->first();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => new SubSubCategoryResource($subSubCatergory)
        ]);
    }
}
