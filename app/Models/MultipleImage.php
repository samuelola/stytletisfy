<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleImage extends Model
{
    use HasFactory;

    protected $table = 'products_multiple_images';

    public function product(){

        return $this->belongsTo(Product::class);
    }
}
