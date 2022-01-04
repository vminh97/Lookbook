<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title_news','description_news','content_news','deadline_date','user_id','status','news_Date','news_image','category_id'];
}
