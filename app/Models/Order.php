<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    public function User(){
        return $this->hasOne(User::class,'id','user_id');
}
public function Products(){
    return $this->hasOne(Product::class,'id','product_id');
}
}
