<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateProductCatRequest;
use App\Library\Utilities;
use App\Models\Category;
use App\Models\CategoryMonth;
use App\Models\Product;

class UploadCategoryImagesController extends Controller
{
    public function uploadcatImage(UpdateCategoryRequest $request,$id){
        
        $find_cat = Category::where('id',$id)->orderByDesc('created_at')->first();

          if (is_null($find_cat)) {
            return Utilities::sendError('Category not found.');
          }else{

              $category_data = $request->validated();
              if($request->hasFile('image')){
                  $image=$request->file('image');
                  $path = time().'.'.$request->image->extension();
                  $location=public_path('category_images/'.$path);
                  Image::read($image)->resize(410, 123)->save($location);
                  $category_data['image'] = 'category_images/'.$path;
                  $find_cat->update($category_data);

              }else{

                  $find_cat->update($category_data);
              }

              return Utilities::sendResponse($find_cat, 'Category Updated successfully.');
          }
  
    }

    public function uploadcatMonthImage(UpdateCategoryRequest $request,$id){
        
        $find_cat = CategoryMonth::where('id',$id)->orderByDesc('created_at')->first();

          if (is_null($find_cat)) {
            return Utilities::sendError('Category not found.');
          }else{

              $category_data = $request->validated();
              if($request->hasFile('image')){

                  $image=$request->file('image');
                  $path = time().'.'.$request->image->extension();
                  $location=public_path('category_images/'.$path);
                  Image::read($image)->resize(190, 184)->save($location);
                  $category_data['image'] = 'category_images/'.$path;
                  $find_cat->update($category_data);

              }else{

                  $find_cat->update($category_data);
              }

              return Utilities::sendResponse($find_cat, 'Category Updated successfully.');
          }
  
    }

    public function getcatMonthImage(){
 
        $category = CategoryMonth::all();
        return Utilities::sendResponse($category, 'Categories retrieved successfully.');

    }

    public function uploadProductImage(UpdateProductCatRequest $request,$id){
         
          $find_prod = Product::where('id',$id)->orderByDesc('created_at')->first();
          if (is_null($find_prod)) {
            return Utilities::sendError('Product not found.');
          }else{
              $product_data = $request->validated();
              if($request->hasFile('image')){
                  $image=$request->file('image');
                  $path = time().'.'.$request->image->extension();
                  $location=public_path('images/'.$path);
                  Image::read($image)->resize(660, 743)->save($location);
                  $product_data['image'] = 'images/'.$path;
                  
                  $find_prod->image = $product_data['image'];
                  $find_prod->title = $product_data['title'];
                  $find_prod->product_rating = $product_data['product_rating'];
                  $find_prod->category_id = $product_data['category_id'];
                  $find_prod->sub_category_id = $product_data['sub_category_id'];
                  $find_prod->deal_of_the_day = $product_data['deal_of_the_day'];
                  $find_prod->save();
              }else{
                  $find_prod->image = $product_data['image'];
                  $find_prod->title = $product_data['title'];
                  $find_prod->product_rating = $product_data['product_rating'];
                  $find_prod->category_id = $product_data['category_id'];
                  $find_prod->sub_category_id = $product_data['sub_category_id'];
                  $find_prod->deal_of_the_day = $product_data['deal_of_the_day'];
                  $find_prod->save();
              }

              return Utilities::sendResponse($find_prod, 'Product Updated successfully.');
          }
    }
}
