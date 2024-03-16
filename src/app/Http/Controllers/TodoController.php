<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }
    
    public function create(TodoRequest $request){
        $todos = $request->only(['content', 'category_id']);
        Todo::create($todos);
        return redirect('/')->with('message', 'Todoを作成しました');
    }
    
    public function update(Request $request){
        $todos = $request->only(['content']);
        Todo::find($request->id)->update($todos);
        return redirect('/')->with('message', 'Todoを変更しました');
    }
    
    public function delete(Request $request){
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }

    public function search(Request $request){
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }
}
