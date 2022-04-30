<?php

namespace App\Traits;

trait FlushCacheTrait
{
    public static function bootFlushCacheTrait()
    {
        static::created(function($item){
            \Cache::tags($item->cacheTags)->flush();
        });
        static::saved(function($item){
            \Cache::tags($item->cacheTags)->flush();
        });
        static::updated(function($item){
            if ($item->singleCacheTag) {
                \Cache::tags([$item->singleCacheTag . $item->slug])->flush();
            }
            \Cache::tags($item->cacheTags)->flush();
        });
        static::deleted(function($item){
            if ($item->singleCacheTag) {
                \Cache::tags([$item->singleCacheTag . $item->slug])->flush();
            }
            \Cache::tags($item->cacheTags)->flush();
        });
    }
}