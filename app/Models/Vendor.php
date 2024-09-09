<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team_size',
        'business_name',
        'business_description',
        'business_email',
        'corperate_type',
        'profile_image',
        'phone_number',
        'address',
        'social',
        'position',
        'title',
        'status'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
