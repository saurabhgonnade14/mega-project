<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'featured',
        'status',
        'category',
        'profile_image',
    ];



        public function category(){
            return $this->hasOne(category::class, 'id', 'category_id');

        }
    }

    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }


