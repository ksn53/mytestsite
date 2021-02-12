<?php

namespace App\Http\Service;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagExtract
{

    public function extractTagsId($tags, Post $post = null)
    {
        if (!is_null($post)) {
            $postTags = $post->tags->keyBy('name');
            $syncIds = $postTags->intersectByKeys($tags)->pluck('id')->toArray();
        }
        foreach ($tags as $tag) {
            if ($tag) {
                $tag = Tag::firstOrCreate(['name' => $tag]);
                $syncIds[] = $tag->id;
            }
        }
        return $syncIds;
    }
}