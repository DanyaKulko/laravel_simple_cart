<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function test($id) {
        return view('test', ['id' => $id]);
    }

    public function categories() {
        $categories = Category::all();

        return view('categories', compact('categories'));
    }

    public function category($category_name) {
        $category = Category::where('url', $category_name)->first();
        return view('category', compact('category'));
    }

    public function product_view($category_name, $productId) {
        $product = Product::where('id', $productId)->first();
        return view('product', compact('product'));

    }
}
