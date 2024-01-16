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
}
