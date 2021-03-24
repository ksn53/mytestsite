<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\HistoryPivot;
use App\Events\PostCreated;
use App\Events\PostUpdated;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\HasTags;
use App\Http\Interfaces\HasComments;

class Post extends Model implements HasTags, HasComments
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'brief', 'content', 'published', 'owner_id'];

    protected $dispatchesEvents = ['created' => PostCreated::class, 'updated' => PostUpdated::class];

    protected static function boot()
    {
        parent::boot();

        static::updating(function(Post $post) {
            $after = $post->getDirty();
            $post->history()->attach(auth()->id(), ['before' => Arr::only($post->fresh()->toArray(), array_keys($after)), 'after' => $after]);
        });

        static::created(function(){
            \Cache::tags(['posts'])->flush();
        });
        static::updated(function(){
            \Cache::tags(['posts'])->flush();
        });
        static::deleted(function(){
            \Cache::tags(['posts'])->flush();
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'tagable');
    }
    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'post_histories')->using(HistoryPivot::class)->withPivot(['before', 'after'])->withTimestamps();
    }
}
