<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\News;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\ReportRequestValidate;
use Illuminate\Support\Facades\Auth;

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
        $postCount = \Cache::tags(['posts'])->remember('postCount', 3600, function(){
            return Post::count();
        });
        $newsCount = \Cache::tags(['news|list'])->remember('newsCount', 3600, function(){
            return News::count();
        });
        $longestPost = \Cache::tags(['posts'])->remember('longestPost', 3600, function(){
            return Post::orderByraw('CHAR_LENGTH(content) DESC')->first();
        });
        $longestPostContentLength = mb_strlen($longestPost->content);
        $shortestPost = \Cache::tags(['posts'])->remember('shortestPost', 3600, function(){
            return Post::orderByraw('CHAR_LENGTH(content) ASC')->first();
        });
        $shortestPostContentLength = mb_strlen($shortestPost->content);
        $maxPostUser = \Cache::tags(['userReport', 'posts'])->remember('maxPostUser', 3600, function(){
            return User::withCount('posts')->orderByDesc('posts_count')->first(['id', 'name', 'posts_count']);
        });
        $activeUsers = \Cache::tags(['userReport', 'posts'])->remember('activeUsers', 3600, function(){
            return User::withCount('posts')->having('posts_count', '>', 1)->get(['id', 'name', 'posts_count']);
        });
        $middlePostCount = $activeUsers->sum('posts_count')/$activeUsers->count();
        $mostEditedPost = \Cache::tags(['posts', 'comments'])->remember('mostEditedPost', 3600, function(){
            return Post::withCount('history')->orderByDesc('history_count')->first(['id', 'title', 'slug', 'history_count']);
        });
        $mostCommentedPost = \Cache::tags(['posts', 'comments'])->remember('mostCommentedPost', 3600, function(){
            return Post::withCount('comments')->orderByDesc('comments_count')->first(['id', 'title', 'slug', 'comments_count']);
        });
        return view ('admin.main', [
            'postcount' => $postCount,
            'newscount' => $newsCount,
            'longestpost' => $longestPost,
            'shortestPost' => $shortestPost,
            'longestPostContentLength' => $longestPostContentLength,
            'shortestPostContentLength' => $shortestPostContentLength,
            'maxPostUser' => $maxPostUser->name,
            'middlePostCount' => $middlePostCount,
            'mostEditedPost' => $mostEditedPost,
            'mostCommentedPost' => $mostCommentedPost,
        ]);
    }

    public function postlist()
    {
        $posts = \Cache::tags(['posts'])->remember('admin_post_list', 3600, function(){
            return Post::latest()->paginate(20);
        });
        return view ('admin.postlist', compact('posts'));
    }
    public function newslist()
    {
        $news = \Cache::tags(['news|list'])->remember('admin_news_list', 3600, function(){
            return News::latest()->paginate(20);
        });
        return view ('admin.newslist', compact('news'));
    }
    public function userlist()
    {
        $users = \Cache::tags(['adminUsersList'])->remember('admin_users_list', 3600, function(){
            return User::orderBy('name', 'DESC')->get();
        });
        return view ('admin.userlist', compact('users'));
    }
    public function rolelist()
    {
        $roles = \Cache::tags(['adminRolesList'])->remember('admin_roles_list', 3600, function(){
            return Role::orderBy('name', 'DESC')->get();
        });
        return view ('admin.rolelist', compact('roles'));
    }
    public function reportall()
    {
        return view ('admin.reportAllForm');
    }
    public function reportlist()
    {
        return view ('admin.reportlist');
    }
    public function sendReportAll(ReportRequestValidate $request)
    {
        if (!$request->posts && !$request->users && !$request->news && !$request->tags && !$request->comments) {
            flash('Не выбран ни один элемент. Отчёт не создан!', 'warning');
            return view ('admin.reportlist');
        }
        \App\Jobs\PostsReport::dispatch(Auth::user()->email, $request->posts, $request->users, $request->news, $request->tags, $request->comments);
        flash('Отчёт в процессе формирования и будет отправлен на почту.');
        return view ('admin.reportAllForm');
    }

}
