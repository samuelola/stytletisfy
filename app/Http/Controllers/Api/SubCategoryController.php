<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\ProductResource;
use App\Library\Utilities;
use App\Models\Product;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $subcategories = SubCategory::with('category')->get();
          return Utilities::sendResponse(SubCategoryResource::collection($subcategories), 'Subcategories retrieved successfully.');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $find_product = Product::where('sub_category_id',$id)->orderByDesc('created_at')->get();
        if (is_null($find_product)) {
            return Utilities::sendError('Product not found.');
        }
        return Utilities::sendResponse($find_product, 'Product retrieved successfully.');
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
        //
    }
}
