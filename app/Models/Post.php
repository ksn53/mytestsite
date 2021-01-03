<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Events\PostCreated;

class Post extends Model
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'brief', 'content', 'published', 'owner_id'];

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
