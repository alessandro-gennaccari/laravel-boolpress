<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index', [ 'posts' => Post::all() ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create', [ 'tags' => Tag::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:80',
            'content' => 'required'
        ]);

        $newPost = new Post();
        $newPost->fill($request->all());
        $newPost->user_id = Auth::id();
        $newPost->slug = Str::slug($request->title);
        $newPost->cover = Storage::put('post_covers', $request->image);
        $newPost->save();

        if(array_key_exists('tags', $request->all())){
            $newPost->tags()->sync($request->tags);
        }

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', [ 'post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', [ 'editPost' => $post, 'tags' => Tag::all() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => [
                'required',
                Rule::unique('posts')->ignore($post), //Aggiungere use...\Rule;
                'max:80' 
            ],
            'content' => 'required'
        ]);

        if($request->image != $post->image) {
            $post->cover = Storage::put('post_covers', $request->image);
        }

        if($request->title != $post->title) {
            $post->slug = Str::slug($request->title);
        }

        if(array_key_exists('tags', $request->all())){
            $post->tags()->sync($request->tags);
        }
        $post->update($request->all());

        return redirect()->route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('post.index');
    }
}
