<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\About;
use App\Http\Controllers\Feedbacks;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Contacts;

Route::resource('/posts', Posts::class);//->except(['show', 'edit']);
Route::get('/', [MainController::class, 'index'])->name('mainpage');
Route::get('about', [About::class, 'index'])->name('about');
Route::get('contacts', [Contacts::class, 'index'])->name('contacts');
Route::post('contacts', [Contacts::class, 'store'])->name('contactsStore');
Route::get('/admin/feedbacks', [Feedbacks::class, 'index'])->name('feedbacks');
/*Route::get('posts/create', [Posts::class, 'create'])->name('createPost');
Route::post('/posts', [Posts::class, 'store'])->name('posts');*/

//Route::get('posts/{post:slug}', [Posts::class, 'show'])->name('posts.show');
//Route::get('posts/{post:slug}/edit', [Posts::class, 'edit'])->name('posts.edit');

//Route::delete('posts/{post:slug}', [Posts::class, 'destroy'])->name('posts.destroy');





