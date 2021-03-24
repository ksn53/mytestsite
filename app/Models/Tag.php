<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $fillable = ['name'];
    protected static function boot()
    {
        parent::boot();
        static::created(function(){
            \Cache::tags(['tags'])->flush();
        });
        static::updated(function(){
            \Cache::tags(['tags'])->flush();
        });
        static::deleted(function(){
            \Cache::tags(['tags'])->flush();
        });
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'tagable')->where('published', 1);;
    }
    public function news()
    {
        return $this->morphedByMany(News::class, 'tagable')->where('published', 1);;
    }
    public static function tagsCloud()
    {
        $tagsCloud = \Cache::tags(['tags'])->remember('tagsCloud', 3600, function(){
            $postTags = (new static)->has('posts')->get();
            $newsTags = (new static)->has('news')->get();
            return $postTags->merge($newsTags);
        });
        return $tagsCloud;
    }
}
