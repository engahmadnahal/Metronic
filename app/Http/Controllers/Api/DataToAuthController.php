<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use App\Http\Resources\Api\CountryResource;
use App\Http\Resources\Api\JobResource;
use App\Http\Resources\Api\RegionResource;
use App\Models\CityTranslation;
use App\Models\CountryTranslation;
use App\Models\JobTranslation;
use App\Models\Language;
use App\Models\RegionTranslation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataToAuthController extends Controller
{
    public function countries(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();

        $data = CountryTranslation::where('language_id',$lang->id)->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => CountryResource::collection($data)
        ],Response::HTTP_OK);
    }

    public function cities(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();

        $data = CityTranslation::where('language_id',$lang->id)->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => CityResource::collection($data)
        ],Response::HTTP_OK);
    }


    public function regions(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();

        $data = RegionTranslation::where('language_id',$lang->id)->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => RegionResource::collection($data)
        ],Response::HTTP_OK);
    }

    public function jobs(Request $request){

        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();

        $data = JobTranslation::where('language_id',$lang->id)->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => JobResource::collection($data)
        ],Response::HTTP_OK);
    }


}
