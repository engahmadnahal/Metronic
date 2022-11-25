<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\Language;
use App\Models\SubCatergory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //


    public function getSubCategories(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code' ,$selectLang)->first();

        $subCatergory = SubCatergory::whereHas('translations',function($q) use($lang){
            $q->where('language_id',$lang->id);

        })->with(['translations' => function($q) use($lang){
            $q->where('language_id',$lang->id);
        }])->where('active',true)->get();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => SubCategoryResource::collection($subCatergory)
        ]);

    }

    public function getSingleSubCategory(Request $request,SubCatergory $subCatergory){
        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code' ,$selectLang)->first();


        $subCatergory = $subCatergory->with(['translations' => function($q) use($lang){
            $q->where('language_id',$lang->id);
        }])->first();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => new SubCategoryResource($subCatergory)
        ]);
    }
}
