<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CartShowResource;
use App\Models\Cart;
use App\Library\Utilities;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $current_user = $request->user_id;
        $product_id = $request->product_id;
        $qty        = 1;
        $price      = $request->price;
        $basket = Cart::where('user_id',$current_user)->where('product_id',$product_id)->first();
        if(!$basket){
           Cart::create([
               "user_id"=>$current_user,
               "product_id" => $product_id,
               "qty"  => $qty,
               "price" => $price
           ]);
        }
        else{
           //update if product is already in cart table
           $basket->qty += 1;
           $basket->price += $price;
           $basket->save();  
        }

        $basket_count = Cart::where('user_id',$current_user)->sum('qty');
        return Utilities::sendResponse($basket_count,"Successfully added to cart");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_cart = Cart::where('user_id',$id)->get();
        return CartShowResource::collection($user_cart);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $cart = Cart::find($id);
         $cart->qty = $request->qty;
         $cart->price = $request->totalprice;
         $cart->save();
         return Utilities::sendResponse($cart,"Cart_updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $user_id = $request->user_id;
        $get_cart = Cart::where('id',$id)->delete();
        $basket_count = Cart::where('user_id',$user_id)->sum('qty');
        return Utilities::sendResponse($basket_count,"basket_count");
    }
}
