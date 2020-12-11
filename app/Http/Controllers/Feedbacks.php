<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class Feedbacks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view ('feedbacks', compact('messages'));
    }
}
