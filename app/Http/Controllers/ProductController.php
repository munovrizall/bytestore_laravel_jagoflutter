<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = \App\Models\Product::paginate(5);
        return view('pages.product.index', compact('products'));
    }
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('pages.product.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);
        // $data = $request->all();

        $product = new \App\Models\Product;
        $product->name = $request->name;
        $product->price = (int) $request->price;
        $product->stock = (int) $request->stock;
        $product->category_id = $request->category_id;
        $product->image = $filename;
        $product->save();

        return redirect()->route('product.index');
    }
    public function show($id)
    {
        return view('pages.dashboard');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Ambil semua kategori
        return view('pages.product.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = Product::findOrFail($id);

        $product->update($data);

        // Jika category_id ada di data yang dikirimkan, kita dapat menyimpannya
        if (isset($data['category_id'])) {
            $category = Category::findOrFail($data['category_id']);
            $product->category()->associate($category);
        } else {
            // Jika category_id tidak ada, maka kita bisa melepaskan relasi (jika diperlukan)
            $product->category()->dissociate();
        }

        $product->save();

        return redirect()->route('product.index');
    }
    public function destroy($id)
    {
        $user = Product::findOrFail($id);
        $user->delete();
        return redirect()->route('product.index');
    }
}
