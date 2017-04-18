<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use Notifiable;

    protected $table = 'news';

    protected $fillable = [
        'news_cate_id', 'news_user_id', 'news_title', 'news_slug', 'news_description', 'news_content', 'news_view', 'news_is_hot', 'news_is_check', 'news_is_public', 'news_images', 'news_image_thumbnail',
    ];

    public function SubCategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Report()
    {
        return $this->hasMany('App\Models\Report');
    }

    public function Comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function getNewsInCategory()
    {
        $news = News::select('news.id AS news_id', 'news.news_title', 'news.news_description', 'news.news_images','categories.id', 'news.news_slug')
                    ->join('sub_categories', 'sub_categories.id', '=', 'news.news_cate_id')
                    ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
                    ->orderBy('news.created_at', 'DESC')
                    ->get();

        return $news;
    }
}
