<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Library\Utilities;
use App\Models\User;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['user','category','subcategory'])->get();
        return Utilities::sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product_data = $request->validated();
        if($request->hasFile('image')){
            // without package
            // $path = time().'.'.$request->image->extension();
            // $request->image->move(public_path('images'),$path);

            // using image intervention method
            $image=$request->file('image');
            $path = time().'.'.$request->image->extension();
            $location=public_path('images/'.$path);
            Image::read($image)->resize(800, 900)->save($location);
        
        }

        $newProduct = new Product;
        $newProduct->title = $product_data['title'];
        $newProduct->description = $product_data['description'];
        $newProduct->price = $product_data['price'];
        $newProduct->image = 'images/'.$path;
        //$newProduct->user_id = auth()->user()->id;
        $newProduct->user_id = $product_data['user_id'];
        $newProduct->uuid = Str::uuid();
        $newProduct->stock_qty = $product_data['stock_qty'];
        $newProduct->stock_status = $product_data['stock_status'];
        $newProduct->category_id = $product_data['category_id'];
        $newProduct->sub_category_id = $product_data['sub_category_id'];
        $newProduct->save();

        return Utilities::sendResponse(new ProductResource($newProduct), 'Product saved successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $find_product = Product::where('id',$id)->orderByDesc('created_at')->first();
        if (is_null($find_product)) {
            return Utilities::sendError('Product not found.');
        }
       
        return Utilities::sendResponse(new ProductResource($find_product), 'Product retrieved successfully.');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {     
          $find_product = Product::where('id',$id)->orderByDesc('created_at')->first();

          if (is_null($find_product)) {
            return Utilities::sendError('Product not found.');
          }else{

              $product_data = $request->validated();
              if($request->hasFile('image')){
                 
                   $logo = $request->image;
                   $filename = time().'.'.$logo->getClientOriginalName();
                   $path = $logo->storeAs('images',$filename,'public');
                   
                //   $path = time().'.'.$request->image->extension();
                //   $request->image->move(public_path('images'),$path);

                  
                  $product_data['image'] = $path;
                  
                  $find_product->update($product_data);

              }else{

                  $find_product->update($product_data);
              }

              return Utilities::sendResponse($find_product, 'Product Updated successfully.');
          }
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Utilities::sendResponse('Deleted','Product Updated successfully.');
    }
}
