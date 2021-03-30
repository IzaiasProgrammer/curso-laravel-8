<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StoreUpdatePost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        //$posts = Post::orderBy('id', 'DESC')->paginate();
        $posts = Post::latest()->paginate();

        //dd($posts);

    	return view('admin.posts.index', \compact('posts'));
    }

    public function create() {
        return \view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());

        return \redirect()
            ->route('posts.index')
            ->with('message', 'Post criado com Sucesso');
    }

    public function show($id)
    {
        //$post = Post::where('id', $id)->first();
        $post = Post::find($id);

        if (!$post) {
            return \redirect()->route('posts.index');
        }


        return \view('admin.posts.show', \compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return \redirect()->route('posts.index');
        }

        $post->delete();

        return \redirect()
        ->route('posts.index')
        ->with('message', 'Post Deletado com Sucesso');
    }

    public function edit($id)
    {
        if (!$post = Post::find($id)) {
            return \redirect()->back();
        }


        return \view('admin.posts.edit', \compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        if (!$post = Post::find($id)) {
            return \redirect()->back();
        }

        $post->update($request->all());

        return \redirect()
            ->route('posts.index')
            ->with('message', 'Post atualizado com Sucesso');
    }
}
