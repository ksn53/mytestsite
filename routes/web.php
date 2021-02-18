<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\About;
use App\Http\Controllers\Feedbacks;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Contacts;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Comments;

Route::get('/tags/{tag}', [TagsController::class, 'index'])->name('tags');
Route::resource('/posts', Posts::class);
Route::post('/posts/{post}/comment', [Comments::class, 'store'])->name('commentpage');
Route::get('/', [MainController::class, 'index'])->name('mainpage');
Route::get('about', [About::class, 'index'])->name('about');
Route::get('contacts', [Contacts::class, 'index'])->name('contacts');
Route::post('contacts', [Contacts::class, 'store'])->name('contactsStore');
Route::get('/admin', [AdminController::class, 'index'])->name('adminpanel');
Route::get('/admin/feedbacks', [Feedbacks::class, 'index'])->name('feedbacks');
Route::get('/admin/postlist', [AdminController::class, 'postlist'])->name('admin.post.list');
Route::get('/admin/userlist', [AdminController::class, 'userlist'])->name('admin.user.list');
Route::get('/admin/rolelist', [AdminController::class, 'rolelist'])->name('admin.role.list');
Auth::routes();
