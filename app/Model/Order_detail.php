<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail';
    protected $fillable = ['order_id','ordercode','product_id','goods_code','quantity','sale_price','product_image','isCancer','product_price','product_price_sale','created_at',
    'created_at'];
}
