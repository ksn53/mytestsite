<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\About;
use App\Http\Controllers\Feedbacks;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Contacts;

Route::get('/', [MainController::class, 'index']);
Route::get('about', [About::class, 'index']);
Route::get('contacts', [Contacts::class, 'index']);
Route::post('contacts', [Contacts::class, 'store']);
Route::get('/admin/feedbacks', [Feedbacks::class, 'index']);
Route::get('posts/create', [Posts::class, 'create']);
Route::post('/posts', [Posts::class, 'store']);
Route::get('posts/{slug}', [Posts::class, 'show']);





