<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        // Get all products
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}
