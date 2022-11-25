<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\HomeResource;
use App\Http\Resources\Api\ProductResource;
use App\Models\Catergory;
use App\Models\Language;
use App\Models\Product;
use App\Models\StoreProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeRequest(Request $request){
        //Product
        $product = StoreProduct::all();
        // Categoru 
        $selectLang = $request->header('lang') ?? 'ar';
        $lang = Language::where('code', $selectLang)->first();

        $catergory = Catergory::whereHas('translations', function ($q) use ($lang) {
            $q->where('language_id', $lang->id);
        })->with(['translations' => function ($q) use ($lang) {
            $q->where('language_id', $lang->id);
        }])->where('active', true)->get();

        // Most View


        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => [
                'slider_product' => ProductResource::collection($product->take(4)),
                'top_category' => CategoryResource::collection($catergory),
                'most_view' => $this->mostView(),
                'top_rated' => $this->topRated(),
                'best_recent' => $this->bestRecent()
            ],
         ]);
    }


    public function topRated(){
        $product = StoreProduct::where('overal_rate','>',3)->orderBy('overal_rate','desc')->get();
        return ProductResource::collection($product);
    } 
    

    public function mostView(){
        $product = StoreProduct::orderBy('view','desc')->get();
        return ProductResource::collection($product);
    }

    public function cheep(){
        $product = StoreProduct::orderBy('price')->get();
        return ProductResource::collection($product);
    } 

    public function bestRecent(){
        $product = StoreProduct::where('overal_rate','>',3)->orderBy('price')->get();
        return ProductResource::collection($product);
    } 

    

}
