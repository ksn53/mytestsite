<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\About;
use App\Http\Controllers\Feedbacks;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Contacts;
use App\Http\Controllers\TagsController;

Route::get('/tags/{tag}', [TagsController::class, 'index']);
Route::resource('/posts', Posts::class);
Route::get('/', [MainController::class, 'index'])->name('mainpage');
Route::get('about', [About::class, 'index'])->name('about');
Route::get('contacts', [Contacts::class, 'index'])->name('contacts');
Route::post('contacts', [Contacts::class, 'store'])->name('contactsStore');
Route::get('/admin/feedbacks', [Feedbacks::class, 'index'])->name('feedbacks');

Auth::routes();
