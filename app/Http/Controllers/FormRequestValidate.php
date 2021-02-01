<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormRequestValidate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validated = request()->validate(['title' => 'required|min:5|max:100', 'slug' => 'required|alpha_dash','brief' => 'required|max:512', 'content' => 'required']);
        $validated['published'] = null;
        if (request()->published == "on") {
            $validated['published'] = 1;
        }
        return $validated;
    }
}
