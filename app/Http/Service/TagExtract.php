<?php

namespace App\Http\Service;

use App\Models\Tag;
use App\Http\Interfaces\HasTags;

class TagExtract
{
    public function extractTagsId($tags, HasTags $item = null)
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