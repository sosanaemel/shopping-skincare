<?php

namespace App\Http\Controllers;
use App\Models\Details;
use App\Models\Order;
use App\Models\User;

class CkeckController extends Controller
{
public static function check()
{
    $order = Order::query()->get()->last();

    $order_details = Details::query()->where('order_id', $order->id)->get();
    $user_details = User::query()->where('id', $order->user_id)->first();

    // [order  => $order]
   return view('check', compact('order', 'order_details', 'user_details'));


}
}



