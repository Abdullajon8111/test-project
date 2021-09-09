<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $query = Post::with('category');

        if ($title = \request()->query('title')) {
            $query->where('title', 'like', "%$title%");
        }

        if ($category_id = \request()->query('category_id')) {
            $query->where('category_id', $category_id);
        }

        return view('post.index', [
            'posts' => $query->paginate(10),
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('post.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(PostRequest $request)
    {
        Post::create($request->validated());

        return redirect()
            ->route('post.index')
            ->with('success', 'Item has been created!');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post, PostRequest $request)
    {
        if (!$post->update($request->validated())) {
            return redirect()
                ->route('post.index')
                ->with('error', __('Item not updated!'));
        }

        return redirect()->route('post.index')->with('success', __('Item updated!'));
    }

    public function destroy(Post $post)
    {
        if (!$post->delete()) {
            return back()->with('error', __('Item not deleted!'));
        }

        return back()->with('success', __('Item has been deleted!'));
    }
}
