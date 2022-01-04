<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['total_amount','total_quanity','shipper_on','status','comment','payment_method','customer_birthday','customer_code','customer_name','customer_phone','customer_email',
    'receiver_name','receiver_phone','receiver_email','receiver_address','receiver_city','receiver_provice','receiver_tower'];
}
