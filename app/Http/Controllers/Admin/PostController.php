<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::all()]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'authors' => Author::all(),
            'images' => [
                'blog_1.jpg',
                'blog_2.jpg',
                'blog_3.jpg',
                'blog_4.jpg',
            ]]);
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->author_id = request('author_id');
        $post->image = request('image');
        $post->comments = 5;
        $post->date = date('Y-m-d H:i:s');

        $post->save();
        
        return redirect('/admin/posts')->with('success', 'Post has been created successfully.');
    }

    public function update($id)
    {
        return view('admin.posts.update', [
            'authors' => Author::all(),
            'images' => [
                'blog_1.jpg',
                'blog_2.jpg',
                'blog_3.jpg',
                'blog_4.jpg',
            ],
            'post' => Post::find($id)
        ]);
    }

    public function storeUpdate(UpdatePostRequest $request)
    {
        $post = Post::find(request('id'));
        $post->title = request('title');
        $post->content = request('content');
        $post->author_id = request('author_id');
        $post->image = request('image');
        $post->comments = 5;
        $post->date = date('Y-m-d H:i:s');

        $post->save();

        return redirect('/admin/posts')->with('success', 'Post has been updated successfully.');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('/admin/posts')->with('success', 'Post has been deleted successfully.');
    }
}
