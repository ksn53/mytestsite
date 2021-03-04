<?php

namespace App\Http\Service;

use App\Models\Post;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Interfaces\Tagable;

class TagExtract implements Tagable
{

    public function extractTagsId($tags, $item = null)
    {
        $syncIds = null;
        if (!is_null($item)) {
            $itemTags = $item->tags->keyBy('name');
            $syncIds = $itemTags->intersectByKeys($tags)->pluck('id')->toArray();
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