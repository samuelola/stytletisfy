<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Library\Utilities;
use App\Http\Resources\WishlistResource;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $basket = Wishlist::where('user_id',$current_user)->where('product_id',$product_id)->first();
        if(!$basket){
           Wishlist::create([
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

        return Utilities::sendResponse($basket,"Successfully added to wishlist");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_wishlist = Wishlist::where('user_id',$id)->get();
        return Utilities::sendResponse(WishlistResource::collection($user_wishlist),"Retrieved Successfully");
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
         $cart = Wishlist::find($id);
         $cart->qty = $request->qty;
         $cart->price = $request->totalprice;
         $cart->save();
         return Utilities::sendResponse($cart,"Wishlist updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $user_id = $request->user_id;
        $get_cart = Wishlist::where('id',$id)->delete();
        $basket_count = Wishlist::where('user_id',$user_id)->sum('qty');
        return Utilities::sendResponse([],"Wishlist item is removed");
    }
}
