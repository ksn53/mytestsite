<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class Contacts extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('contacts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['email' => 'required|email:rfc', 'message' => 'required']);
        $message = Message::create($validated);
        $message->save();
        return redirect(route('mainpage'));
    }
}
