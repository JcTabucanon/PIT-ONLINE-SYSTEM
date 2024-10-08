<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    // Handle form submission and store the product
    public function store(Request $request){
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        // Create a new product instance and save it to the database
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);

        // Redirect to a page with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Show the edit form for a product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Handle the update request
    public function update(Request $request, Product $product)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        // Update the product with the new data
        $product->update($request->only(['name', 'price', 'description']));

        // Redirect to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Handle the delete request
    public function destroy(Product $product)
    {
        // Delete the product from the database
        $product->delete();

        // Redirect to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }


    // product V2
    public function indexV2(){
        return view('productV2.index');
    }
    public function getProduct(){
        $products = Product::all();
        return response()->json(['data' => $products]); // return as array
    }
    public function createProduct(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return response()->json(['productName' => $product['name']]);
    }
    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        if($product){
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();
            return response()->json(['productName' => $product['name']]);
        }else{
            return response()->json(['error ' => 'Product not found!'], 404);
        }
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json(['productName' => $product['name']]);
        }else{
            return response()->json(['error' => 'Product not found!'], 404);
        }
    }

}
