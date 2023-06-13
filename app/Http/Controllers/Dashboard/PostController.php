<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(2);
    /*     if (!Gate::allows('index', $posts[0])) {
            abort(403);
        } */
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        /* if (!Gate::allows('create', $post)) {
            abort(403);
        } */
        $task = 'create';
        return view('dashboard.post.create', compact('categories', 'post', 'task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $post = new Post($request->validated());
        $post->save();
        return to_route('post.index')->with('status', "Nuevo post creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        /* if (!Gate::allows('update', $post)) {
            abort(403);
        } */
        $task = 'edit';
        return view('dashboard.post.edit', compact('categories', 'post', 'task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if (isset($data['image'])) {
            $data['image'] = $filename = time() . "." . $data['image']->extension();
            $request->image->move(public_path('images/otro'), $filename);
        }
        $post->update($data);
        return redirect()->route('post.index')->with('status', 'Publicación actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        /* if (!Gate::allows('delete', $post)) {
            abort(403);
        } */
        $post->delete();
        return redirect()->route('post.index')->with('status', 'Publicación eliminada');
    }
}
