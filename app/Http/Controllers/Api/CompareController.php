<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compare;
use App\Library\Utilities;
use App\Http\Resources\CompareResource;

class CompareController extends Controller
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
        $basket = Compare::where('user_id',$current_user)->where('product_id',$product_id)->first();
        if(!$basket){
           Compare::create([
               "user_id"=>$current_user,
               "product_id" => $product_id,
           ]);
        }
        else{
           //update if product is already in cart table
           $basket->qty += 1;
           $basket->price += $price;
           $basket->save();  
        }

        return Utilities::sendResponse($basket,"Successfully added for compare");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_compare = Compare::where('user_id',$id)->get();
        return Utilities::sendResponse(CompareResource::collection($user_compare),"Retrieved Successfully");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_id = $request->user_id;
        $get_cart = Compare::where('id',$id)->delete();
        $basket_count = Compare::where('user_id',$user_id)->sum('qty');
        return Utilities::sendResponse([],"Compare item is removed");
    }
}
