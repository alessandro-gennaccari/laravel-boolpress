<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {

        return view('guest.post.index', [ 'allPost' => Post::all() ]);

    }

    public function show() {

        return view('guest.post.show');

    }
}
