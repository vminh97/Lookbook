<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['customer_name','image_customer','birthday','address','email','isactive','status','first_name','last_name','phone','certificatesbill_id'];

    // protected $appends = [
    //     'avatar_path'
    // ];

    // public function getAvatarLinkAttribute()
    // {
    //     if ($this->attributes['image_customer'] == 'image_customer.png') {
    //         return Avatar::create($this->attributes['customer_name'])->toBase64();
    //     } else {
    //         return 'img/customer/' . $this->attributes['user'] . '/avatar/' . $this->attributes['image_customer'];
    //     }
    
    //     return $this->attributes['image_customer'];
    // }

};
