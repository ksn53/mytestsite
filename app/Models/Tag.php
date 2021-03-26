<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FlushCacheTrait;

class Tag extends Model
{
    use HasFactory;
    use FlushCacheTrait;
    public $fillable = ['name'];
    protected $cacheTags = ['tags'];

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
        $tagsCloud = \Cache::tags(['tags'])->remember('tagsCloud', 3600, function() {
            $postTags = (new static())->has('posts')->get();
            $newsTags = (new static())->has('news')->get();
            return $postTags->merge($newsTags);
        });
        return $tagsCloud;
    }
}
