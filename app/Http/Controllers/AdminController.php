<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('can:update,post')->except(['show', 'store', 'create']);
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
        //$posts = Post::orderBy('id', 'DESC')->get();
        //dd($posts);
        return view ('admin.postlist', compact('posts'));
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
