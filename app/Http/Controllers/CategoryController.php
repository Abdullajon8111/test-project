<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'categories' => Category::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()
            ->route('category.index')
            ->with('success', 'Item has been created!');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request): RedirectResponse
    {
        if (!$category->update($request->validated())) {
            return redirect()
                ->route('category.index')
                ->with('error', __('Item not updated!'));
        }

        return redirect()->route('category.index')->with('success', __('Item updated!'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        if (!$category->delete()) {
            return back()->with('error', __('Item not deleted!'));
        }

        return back()->with('success', __('Item has been deleted!'));
    }
}
