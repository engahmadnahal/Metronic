<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\SingleCategoryResource;
use App\Models\Catergory;
use App\Models\Language;
use Illuminate\Http\Request;

class CategoryController extends Controller
{



    public function getCategories(Request $request)
    {

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();

        $catergory = Catergory::whereHas('translations', function ($q) use ($lang) {
            $q->where('language_id', $lang->id);
        })->with(['translations' => function ($q) use ($lang) {
            $q->where('language_id', $lang->id);
        }])->where('active', true)->get();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => CategoryResource::collection($catergory)
        ]);
    }

    public function getSingleCategory(Request $request, Catergory $catergory)
    {
        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();

        $catergory = $catergory->with(['subCategories', 'translations' => function ($q) use ($lang) {
            $q->where('language_id', $lang->id);
        }])->first();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => new CategoryResource($catergory)
        ]);
    }
}
