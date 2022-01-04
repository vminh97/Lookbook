<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'products';
    protected $fillable = ['id','goods_code','slug_url','name_product','teacher_id','introduction_product','content_product','title_procduct','category_id','certificate_id',
        'name_brand','price','price_no_tax','price_offsale','price_offsale_no_tax','product_image','product_image_text',
    'video','material_name','hashtag_name','search_keywords','list_image','isPublic','isRefund',
    'isCertification','isOnlinePayment','isRate','isFreeShip','timeRefund','count_video',
     'sum_time_video','date_start','date_end','count_discount','discount_code','activation code',
    'date_promotion_start','date_promotion_end','status'];
}
