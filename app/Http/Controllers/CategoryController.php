<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
       $categories = \App\Models\Category::paginate(5);
       return view('pages.category.index', compact('categories'));
    }
    public function create()
    {
        return view('pages.category.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Category::create($data);
        return redirect()->route('category.index');
    }
    public function show($id)
    {
        return view('pages.dashboard');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);

        $category->update($data);
        return redirect()->route('category.index');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
