<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'brief', 'content', 'published', 'owner_id'];

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    protected static function boot()
    {
        parent::boot();
        static::updating(function($post) {
            $post->history()->attach(auth()->id());
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function history()
    {
        return $this->belongsToMany(User::class, 'post_histories');
    }
}
