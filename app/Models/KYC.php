<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;

class KYC extends Model
{
    use HasFactory;

    protected $table = 'kyc';

    public function user(){

        return $this->belongsTo(User::class);
    }
}
