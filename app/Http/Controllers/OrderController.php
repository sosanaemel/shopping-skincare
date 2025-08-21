<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public static function store(Request $request)
    {

        // explode  => convert string to array
        // implode  == > array => string

//        $str = "order-1";
//        $arr = explode('-', $str);


        try {

            DB::beginTransaction();

            // fetch last order
            $order = Order::query()->orderByDesc('id')->first();     // orderByDesc  == orderBy('id', 'DESC')
//          $order = Order::query()->get()->last();

            if ($order && preg_match('/order-(\d+)/', $order->reference_number, $matches)) {
                $lastNumber = (int)$matches[1];
            } else {
                $lastNumber = 0;
            }


//        if($order){
//            // get value pfn of reference_number
//            $referenceNumber = $order->reference_number;
//            $lastNumber = explode('-', $referenceNumber)[1];
//
//        }else{
//
//            $lastNumber = 0 ;
//        }


            // increment of this number ==> x +1
            $newReferenceNumber = 'order-' . ($lastNumber + 1);

            // array => object to sum total_price
            $sumTotalPrice = collect($request->products)->sum('total_price');


            $order = Order::query()->create([
                                                'cart_total'       => $sumTotalPrice,
                                                'reference_number' => $newReferenceNumber,
                                                'user_id'          => auth()->user()->id,
                                            ]);
            foreach ($request->products as $product) {
                Details::query()->create([
                                             'product_id'  => intval($product['product_id']),
                                             'order_id'    => $order->id,
                                             'price'       => floatval($product['price']),
                                             'quantity'    => intval($product['quantity']),
                                             'total_price' => floatval($product['total_price']),
                                         ]);
            }
            DB::commit();
            return redirect()->route('check');
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500); //???
        }

    }

                public function destroy($id)
                {
//                    dd($id);
                    $order_delete = Order::find($id);
                    $order_delete->delete();
                    $order_delete->save();
                    return redirect()->route('product')->with('success', 'Order deleted.');
                }
}




