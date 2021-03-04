<?php

namespace App\Http\Interfaces;

interface Tagable
{
    public function extractTagsId($tags, $item = null);
}