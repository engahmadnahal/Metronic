<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Models\FavoriteProduct;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductRate;
use App\Models\ProductView;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    //

    public function getProducts(Request $request){
        $products = StoreProduct::where('active',true)->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => ProductResource::collection($products)
        ]);
    }

    public function getSingelProduct(Request $request,$id){
        $product = StoreProduct::findOrFail($id);
        $this->setView($id);
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => new ProductResource($product)
        ]);
    }


    public function rating(Request $request, $id){
        $validator = Validator($request->all(), [
            'rate' => 'required|numeric|in:1,2,3,4,5',
            'comment' => 'required|string|max:150',
        ]);

        if (!$validator->fails()) {
            
            $storeProduct = StoreProduct::findOrFail($id);
            ProductRate::updateOrCreate([
                'user_id' => auth()->user()->id,
                'store_product_id' => $storeProduct->id
            ], [
                'rate' => $request->input('rate'),
                'comment' => $request->input('comment')
            ]);

            // Overal Rate
            $rates = ProductRate::all();
            if($rates->count() > 0){
                $perc = $rates->sum('rate') / ($rates->count() * 5) * 100;
                $overalRate = 5 * $perc / 100;
                $storeProduct->overal_rate = $overalRate;
                $storeProduct->save();
            }

            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('SUCCESS_SEND'),
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ]);
        }
    }

    public function topRated(){
        $product = StoreProduct::where('overal_rate','>',3)->orderBy('overal_rate','desc')->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => ProductResource::collection($product)
        ]);
    } 
    
    

    public function mostView(){
        $product = StoreProduct::orderBy('view','desc')->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => ProductResource::collection($product)
        ]);
    }

    public function mostOrderd(){
        // $product = OrderProduct::orderBy('product_id')->get();
        // dd($product);
        // return response()->json([
        //     'status' => true,
        //     'message' => Messages::getMessage('SUCCESS_GET'),
        //     'data' => ProductResource::collection($product)
        // ]);
        return 'No ready yet !';

    } 

    public function cheep(){
        $product = StoreProduct::orderBy('price')->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => ProductResource::collection($product)
        ]);
    } 


    public function setView($id){
        $product = StoreProduct::findOrFail($id);
        $product->view = $product->view + 1;
        $product->save();

        $prodView = ProductView::where('store_product_id',$product->id)->where('user_id',auth()->user()->id)->first();
        if($prodView != null){
            $prodView->view = $prodView->view + 1;
            $prodView->save();
        }else{
            $newProductView = new ProductView;
            $newProductView->user_id = auth()->user()->id;
            $newProductView->store_product_id = $product->id;
            $newProductView->view = 1;
            $newProductView->save();
        }

        // return response()->json([
        //     'status' => true,
        //     'message' => Messages::getMessage('SUCCESS_SEND'),
        // ]);
        
    }


    public function favorite($id){
        $product = StoreProduct::findOrFail($id);
        $fav = new FavoriteProduct;
        $fav->user_id = auth()->user()->id;
        $fav->store_product_id = $product->id;
        $fav->save();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_SEND'),
        ]);
    }

    public function filterWithSubSub($id){
       
        $product = StoreProduct::whereHas('product',function($q) use($id){
            $q->where('sub_sub_category_id',$id);
        })->get();
        return response()->json([
        'status' => true,
        'message' => Messages::getMessage('SUCCESS_GET'),
        'data' => ProductResource::collection($product)
        ]);
        
    }

}
