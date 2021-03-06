<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\CommentRequestValidate;
use App\Http\Interfaces\HasComments;

class CommentAdd //implements Commentable
{
    public static function storeComment(CommentRequestValidate $request, HasComments $item)
    {
        $validated = $request->validated();
        $validated['owner_id'] = Auth::id();
        $item->comments()->save(Comment::create($validated));
        flash('Комментарий добавлен.');
        return redirect(route('mainpage'));
    }
}