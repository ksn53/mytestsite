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
        $postCount = Post::count();
        $newsCount = News::count();

        $longestPost = Post::orderByraw('CHAR_LENGTH(content) DESC')->first();
        $longestPostContentLength = mb_strlen($longestPost->content);
        $shortestPost = Post::orderByraw('CHAR_LENGTH(content) ASC')->first();
        $shortestPostContentLength = mb_strlen($shortestPost->content);

        $maxPostUser = User::withCount('posts')->orderByDesc('posts_count')->first(['id', 'name', 'posts_count']);
        $activeUsers = User::withCount('posts')->having('posts_count', '>', 1)->get(['id', 'name', 'posts_count']);
        $middlePostCount = $activeUsers->sum('posts_count')/$activeUsers->count();
        $mostEditedPost = Post::withCount('history')->orderByDesc('history_count')->first(['id', 'title', 'slug', 'history_count']);
        $mostCommentedPost = Post::withCount('comments')->orderByDesc('comments_count')->first(['id', 'title', 'slug', 'comments_count']);

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
    public function reportall()
    {
        return view ('admin.reportAllForm');
    }
    public function reportlist()
    {
        return view ('admin.reportlist');
    }
    public function sendReportAll(Request $request)
    {
        $showPostsCount = null;
        $showUsersCount = null;
        $showNewsCount = null;
        $showTagsCount = null;
        if ($request->posts == 'on') {
            $showPostsCount = 1;
        }
        if ($request->news == 'on') {
            $showNewsCount = 1;
        }
        if ($request->tags == 'on') {
            $showTagsCount = 1;
        }
        if ($request->users == 'on') {
            $showUsersCount = 1;
        }
        \App\Jobs\PostsReport::dispatchNow($showPostsCount, $showUsersCount, $showNewsCount, $showTagsCount);
        return view ('admin.reportlist');
    }

}
