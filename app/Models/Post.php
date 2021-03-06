<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\HasTags;
use App\Http\Interfaces\HasComments;

class Post extends Model implements HasTags, HasComments
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'brief', 'content', 'published', 'owner_id'];

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function(Post $post) {
            $after = $post->getDirty();
            $post->history()->attach(auth()->id(), ['before' => json_encode(Arr::only($post->fresh()->toArray(), array_keys($after))), 'after' => json_encode($after)]);
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
        return $this->belongsToMany(User::class, 'post_histories')->withPivot(['before', 'after'])->withTimestamps();
    }
}
