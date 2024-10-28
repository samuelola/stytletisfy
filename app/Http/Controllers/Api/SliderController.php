<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Slider;

class SliderController extends Controller
{
    public function uploadSliderImage(SliderRequest $request){

        $find_slider = Slider::where('id',$id)->orderByDesc('created_at')->first();
        if (is_null($find_slider)) {
            return Utilities::sendError('Slider not found.');
          }else{
             $slider_data = $request->validated();
             if($request->hasFile('slider_image') || $request->hasFile('slider_background_image')){
                  $slider_image=$request->file('slider_image');
                  $path_image = time().'.'.$request->slider_image->extension();
                  $location=public_path('slider_images/'.$path_image);
                  Image::read($slider_image)->resize(448, 557)->save($location);
                  $slider_data['slider_image'] = 'slider_images/'.$path_image;
                  $slider_background_image=$request->file('slider_background_image');
                  $path_image2 = time().'.'.$request->slider_background_image->extension();
                  Image::read($slider_background_image)->resize(1903, 520)->save($location);
                  $slider_data['slider_background_image'] = 'slider_images/'.$path_image2;
                  $find_slider->create($slider_data);
             }
          }
    }
}
