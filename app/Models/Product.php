<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'uuid',
        'stock_qty',
        'stock_status',
        'vendor_id',
        'brand'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function multipleproductsimage(){
        return $this->hasMany(MultipleImage::class,'products_multiple_image_id');
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    // public function vendors(){
    //     return $this->hasMany(Vendor::class);
    // }
}
