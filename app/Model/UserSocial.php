<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    protected $table = 'usersocial';
    protected $fillable = ['name','email','avatar_url','social_provider','social_id','created_at','updated_at'];
}
