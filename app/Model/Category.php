<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';
    /**
     * Get the phone record associated with the user.
     */
    protected $fillable = ['order_number','Name','name_Display','is_diplay','slug_url','category_status','parent_id'];

    
}
