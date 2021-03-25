<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        return view('guest.post.index');

    }

    public function show() {

        return view('guest.post.show');

    }
}
