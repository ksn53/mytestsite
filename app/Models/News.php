<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Interfaces\HasTags;
use App\Http\Interfaces\HasComments;

class News extends Model implements HasTags, HasComments
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'brief', 'content', 'published', 'owner_id'];

    protected static function boot()
    {
        parent::boot();
        static::created(function(){
            \Cache::tags(['adminNewsList'])->flush();
            \Cache::tags(['news|list'])->flush();
            \Cache::tags(['newsReport'])->flush();
        });
        static::updated(function(News $news){
            \Cache::tags(['adminNewsList'])->flush();
            \Cache::tags(['news|' . $news->slug])->flush();
            \Cache::tags(['news|list'])->flush();
        });
        static::deleted(function(News $news){
            \Cache::tags(['adminNewsList'])->flush();
            \Cache::tags(['news|' . $news->slug])->flush();
            \Cache::tags(['news|list'])->flush();
            \Cache::tags(['newsReport'])->flush();
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'tagable');
    }
    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
