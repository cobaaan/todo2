<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function create(CategoryRequest $request) {
        $categories = $request->only('name');
        Category::create($categories);
        return redirect('category')->with('message', 'カテゴリを作成しました');
    }

    public function update(Request $request) {
        $categories = $request->only('name');
        Category::find($request->id)->update($categories);
        return redirect('category')->with('message', 'カテゴリを更新しました');
    }

    public function delete(Request $request) {
        Category::find($request->id)->delete();
        return redirect('category')->with('message', 'カテゴリを削除しました');
    }
}
