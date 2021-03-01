<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\News;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

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
        $postCount = count(Post::all());
        $newsCount = count(Post::all());
        $longestPost = DB::table('posts')->orderByraw('CHAR_LENGTH(content) DESC')->first();
        $longestPostContentLength = mb_strlen($longestPost->content);
        $shortestPost = DB::table('posts')->orderByraw('CHAR_LENGTH(content) ASC')->first();
        $shortestPostContentLength = mb_strlen($shortestPost->content);
//SELECT `name` , (SELECT count(*) FROM `posts` WHERE `users`.`id` = `posts`.`owner_id`) AS `Count` FROM `users` ORDER BY `Count` DESC
        return view ('admin.main', [
            'postcount' => $postCount,
            'newscount' => $newsCount,
            'longestpost' => $longestPost,
            'shortestPost' => $shortestPost,
            'longestPostContentLength' => $longestPostContentLength,
            'shortestPostContentLength' => $shortestPostContentLength,
            '$userPostCount' => $$userPostCount,

        ]);
    }

    public function postlist()
    {
        $posts = Post::latest()->paginate(20);
        return view ('admin.postlist', compact('posts'));
    }
    public function newslist()
    {
        $news = News::latest()->paginate(20);
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
