<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'brief', 'content', 'published', 'owner_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
