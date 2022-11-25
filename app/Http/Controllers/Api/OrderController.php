<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\StoreProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function sendOrder(Request $request)
    {
        $validator = Validator($request->all(), [
            'product_array' => 'required|string',
        ]);



        if (!$validator->fails()) {

            if (count(json_decode($request->input('product_array'))) > 0) {
                $order = new Order;
                $order->code = 'Ord-U' . auth()->user()->id;
                $order->user_id = auth()->user()->id;
                $order->save();

                foreach (json_decode($request->input('product_array')) as $prodId) {
                    $prod = StoreProduct::find($prodId);
                    if ($prod != null) {
                        $orderProduct = new OrderProduct;
                        $orderProduct->order_id = $order->id;
                        $orderProduct->product_id = $prod->id;
                        $orderProduct->store_id = $prod->store->id;
                        $orderProduct->save();
                    }
                }
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
}
