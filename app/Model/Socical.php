<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = "socials";
    protected $fillable = ['name','user_id','email','type','raw_data'];

    function user()
    {
        return $this->belongsTo(User::class);
    }


}
