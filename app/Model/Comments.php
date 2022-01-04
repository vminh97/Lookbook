<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = ['goods_code','customer_id','product_id','customers_code','customers_name','content_comment','star_comment','comment_image',
      'status','isPublic'];
}
