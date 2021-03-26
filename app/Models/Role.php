<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();
        static::created(function(){
            \Cache::tags(['adminRolesList'])->flush();
        });
        static::updated(function(){
            \Cache::tags(['adminRolesList'])->flush();
        });
        static::deleted(function(){
            \Cache::tags(['adminRolesList'])->flush();
        });
    }
}
