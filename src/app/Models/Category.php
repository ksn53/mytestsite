<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class)->where('published', 1);
    }
    public static function categoryCloud()
    {
        $categoryCloud = \Cache::tags(['categorys'])->remember('categoryCloud', 3600, function() {
            $postCategorys = (new static())->has('posts')->get();
            return $postCategorys;
        });
        return $categoryCloud;
    }
}
