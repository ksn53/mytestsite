<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Models\News;
use App\Traits\FlushCacheTrait;

class Comment extends Model
{
    use HasFactory;
    use FlushCacheTrait;
    public $fillable = ['title', 'content', 'owner_id'];
    protected $cacheTags = ['postReport'];
    public function commentable()
    {
        return $this->morphTo();
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
