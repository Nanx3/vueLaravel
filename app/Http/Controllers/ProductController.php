<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect()->route('product.index');
    }
}
