<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hastang extends Model
{
    protected $table = 'hastang';
    /**
     * Get the phone record associated with the user.
     */
    protected $fillable = ['hastang_code','hastang_title','status','start_date','end_date','isDisplay','keyword','description','show_order'];

    
}
