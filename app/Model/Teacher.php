<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['teacher_name','gender','password','image_teacher','birthday','address','email','isactive','status','first_name','last_name','phone'];
    
    // protected $appends = [
    //     'avatar_path'
    // ];

    // public function getAvatarPathAttribute()
    // {
    //     if (empty($this->attributes['image_teacher'])) {
    //         return Avatar::create($this->attributes['name'])
    //             ->setDimension(30, 30)
    //             ->setFontSize(10)
    //             ->setShape('square')
    //             ->toBase64();
    //     }

    //     return $this->attributes['image_teacher']; 
    // }
}
