<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class News extends Model
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'brief', 'content', 'published', 'owner_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
