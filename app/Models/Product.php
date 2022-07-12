<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product',
        'price',
        'description',
        'discount',
        'secret_id',
        'status',
        'profile_image',
    ];

    public function secret(){
        return $this->hasOne(secret::class,"id",'secret_id');
    }

}
