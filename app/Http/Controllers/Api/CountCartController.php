<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Library\Utilities;



class CountCartController extends Controller
{
    public function cartdetails($id,$user_id){
        $get_cart = Cart::where(['id'=>$id,'user_id'=>$user_id])->first();
        $total_cart = $get_cart->qty * $get_cart->price;
        return Utilities::sendResponse($total_cart,"Cart_count");
    }
}
