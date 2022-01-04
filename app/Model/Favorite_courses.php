<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Favorite_courses extends Model
{
    protected $table = 'favorite_courses';
    protected $fillable = ['customer_id','products_id','name_favorite','created_at','updated_at'];
}
