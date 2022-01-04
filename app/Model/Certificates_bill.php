<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Certificates_bill extends Model
{
    protected $table = 'certificate_bill';
    protected $fillable = ['certificate_id','product_id','customer_id','date_sent','date_receive','phone','address'];
}
