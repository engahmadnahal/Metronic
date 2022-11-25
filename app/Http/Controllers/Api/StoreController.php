<?php

namespace App\Http\Controllers\Api;

use App\Helpers\DayService;
use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\ProductResource;
use App\Http\Resources\Api\StoreResource;
use App\Http\Resources\Api\WorkingHourResource;
use App\Models\Catergory;
use App\Models\Language;
use App\Models\Store;
use App\Models\StoreBranch;
use App\Models\StoreProduct;
use App\Models\StoreRate;
use App\Models\StoreTranslations;
use App\Models\UserBlockStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    
    private $selectLang;
    private $lang;

    public function __construct()
    {
        $this->selectLang = request()->header('lang') ?? 'ar';
        $this->lang = Language::where('code', $this->selectLang)->first();
    }

    public function getStores()
    {
        $langCode = request()->header('lang') ?? 'ar';
        $selLang = Language::where('code', $langCode)->first();

        $stores = Store::whereDoesntHave('userBlock', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->with(['translations' => function ($q) use ($selLang) {
            $q->where('language_id', $selLang->id);
        }])->where('blocked', false)->get();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => StoreResource::collection($stores)
        ]);
    }

    public function getSingelStore(Store $store)
    {

        $isBlock = $store->userBlock->where('user_id', auth()->user()->id)->count() > 0;
        if ($isBlock) {
            return response()->json([
                'status' => false,
                'message' => Messages::getMessage('YOUR_STORE_BLOCK'),
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            // 'data' => $stores
            'data' => new StoreResource($store)
        ]);
    }

    public function setRateStore(Request $request, Store $store)
    {
        $validator = Validator($request->all(), [
            'rate' => 'required|numeric|in:1,2,3,4,5',
            'comment' => 'required|string|max:150',
        ]);

        if (!$validator->fails()) {
            StoreRate::updateOrCreate([
                'user_id' => auth()->user()->id,
                'store_id' => $store->id
            ], [
                'rate' => $request->input('rate'),
                'comment' => $request->input('comment')
            ]);

            $rates = StoreRate::all();
            if($rates->count() > 0){
                $perc = $rates->sum('rate') / ($rates->count() * 5) * 100;
                $overalRate = 5 * $perc / 100;
                $store->overal_rate = $overalRate;
                $store->save();
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

    public function getStoreOnline()
    {
        $langCode = request()->header('lang') ?? 'ar';
        $selLang = Language::where('code', $langCode)->first();

        $stores = Store::whereHas('dayWorks', function ($q) {
            $q->where('day_id', DayService::now());
        })->whereDoesntHave('userBlock', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->with(['translations' => function ($q) use ($selLang) {
            $q->where('language_id', $selLang->id);
        }])->where('blocked', false)->get();

        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            // 'data' => $stores
            'data' => StoreResource::collection($stores)
        ]);
    }

    public function getWorkingHour(Store $store)
    {
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => WorkingHourResource::collection($store->dayWorks)
        ]);
    }
    // For All Stores
    public function homePageStore(Request $request){
        $product = StoreProduct::all();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => [
                'slider_product' => ProductResource::collection($product->take(4)),
                'top_catgegory' => $this->topCategory(),
                'recommended_store' => $this->recommendedStore(),
                'top_rated' => $this->topRated(),
                'all_store' => $this->allStores()
            ],
         ]);
    }

    public function topCategory(){
        $catergory = Catergory::whereHas('translations', function ($q) {
            $q->where('language_id', $this->lang->id);
        })->with(['translations' => function ($q) {
            $q->where('language_id', $this->lang->id);
        }])->where('active', true)->get();

        return CategoryResource::collection($catergory);

    }

    public function recommendedStore(){
        $stores = Store::whereHas('dayWorks', function ($q) {
            $q->where('day_id', DayService::now());
        })->whereDoesntHave('userBlock', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->with(['translations' => function ($q)  {
            $q->where('language_id', $this->lang->id);
        }])->where('blocked', false)->where('overal_rate','>','3')->get();

        if(count($stores) == 0){
            $storesDefualt = Store::with(['translations' => function ($q)  {
                $q->where('language_id', $this->lang->id);
            }])->whereDoesntHave('userBlock', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->where('blocked', false)->get();
        }
        return StoreResource::collection(count($stores) != 0 ? $stores : $storesDefualt);
    }

    public function topRated($isOnline = false){
        $stores = new Store();
        if($isOnline){
            $stores = Store::whereHas('dayWorks', function ($q) {
                $q->where('day_id', DayService::now());
            })->whereDoesntHave('userBlock', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->with(['translations' => function ($q)  {
                $q->where('language_id', $this->lang->id);
            }])->where('blocked', false)->where('overal_rate','>','3')->orderBy('overal_rate','desc')->get();

        }else{
            $stores = Store::whereDoesntHave('userBlock', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->with(['translations' => function ($q)  {
                $q->where('language_id', $this->lang->id);
            }])->where('blocked', false)->where('overal_rate','>','3')->orderBy('overal_rate','desc')->get();
        }

        if(count($stores) == 0){
            $storesDefualt = Store::with(['translations' => function ($q)  {
                $q->where('language_id', $this->lang->id);
            }])->whereDoesntHave('userBlock', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->where('blocked', false)->get();
        }
        return StoreResource::collection(count($stores) != 0 ? $stores : $storesDefualt);
    }

    public function allStores($isOnline = false){
        
        if($isOnline) {
            $stores = Store::whereHas('dayWorks', function ($q) {
                $q->where('day_id', DayService::now());
            })->with(['translations' => function ($q)  {
                $q->where('language_id', $this->lang->id);
            }])->whereDoesntHave('userBlock', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->where('blocked', false)->get();
        }else{
            $stores = Store::with(['translations' => function ($q)  {
                $q->where('language_id', $this->lang->id);
            }])->whereDoesntHave('userBlock', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->where('blocked', false)->get();
        }
        
        return StoreResource::collection($stores);
    }

    // For Online Stores
    public function homePageOnlineStore(Request $request){
        $product = StoreProduct::all();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => [
                'slider_product' => ProductResource::collection($product->take(4)),
                'top_catgegory' => $this->topCategory(),
                'recommended_store' => $this->recommendedStore(),
                'top_rated' => $this->topRated(true),
                'all_store' => $this->allStores(true)
            ],
         ]);
    }


    // public function branches(){
    //     $branches = StoreBranch::with(['translations' => function ($q)  {
    //         $q->where('language_id', $this->lang->id);
    //     }])->get();
    // }


    public function topRateStoreRequest(){
        $stores = Store::whereDoesntHave('userBlock', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->with(['translations' => function ($q)  {
            $q->where('language_id', $this->lang->id);
        }])->where('blocked', false)->where('overal_rate','>','3')->orderBy('overal_rate','desc')->get();
        return response()->json([
            'status' => true,
            'message' => Messages::getMessage('SUCCESS_GET'),
            'data' => StoreResource::collection($stores)
        ]);
    }



    public function storeBlock(Store $store){
       $block = new UserBlockStore();
       $isExists = UserBlockStore::where('user_id',auth()->user()->id)->where('store_id',$store->id)->exists();
       if(!$isExists){
           $block->store_id = $store->id;
           $block->user_id = auth()->user()->id;
           $block->save();
        }
           return response()->json([
        'status' => true,
        'message' => Messages::getMessage('SUCCESS_SEND'),
    ]);
    }



    public function searchStore(Request $request){
        $validator = Validator($request->all(),[
            'search' => 'required|string'
        ]);
        if(!$validator->fails()){
            $allStores = collect();
            $idStores = StoreTranslations::where('name','like','%'.$request->input('search').'%')->orWhere('note','like','%'.$request->input('search').'%')->get();
            foreach($idStores as $idStore) {
                $store = Store::find($idStore->id);
                $isblockUser = $store->userBlock->where('user_id',auth()->user()->id)->first() != null;
                if($isblockUser){
                    continue;
                }
                $allStores->add($store);
            }
            return response()->json([
                'status' => true,
                'message' => Messages::getMessage('SUCCESS_GET'),
                'data' => StoreResource::collection($allStores)
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
     }
}
