<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\News;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.main');
    }

    public function postlist()
    {
        $posts = Post::latest()->get();
        return view ('admin.postlist', compact('posts'));
    }
    public function newslist()
    {
        $news = News::latest()->get();
        return view ('admin.newslist', compact('news'));
    }
    public function userlist()
    {
        $users = User::orderBy('name', 'DESC')->get();
        return view ('admin.userlist', compact('users'));
    }

    public function rolelist()
    {
        $roles = Role::orderBy('name', 'DESC')->get();
        return view ('admin.rolelist', compact('roles'));
    }

}
