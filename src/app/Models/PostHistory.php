<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Traits\FlushCacheTrait;

class PostHistory extends Model
{
    use HasFactory;
    use FlushCacheTrait;
    protected $cacheTags = ['postReport'];
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
