<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\views\products\index;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Fetch all products from the database

        return view('content.dashboard.dashboards-analytics', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric|min:0', // Added validation for price
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|url', // Added validation for image URL
        ]);

        Product::create($request->all()); // Changed Post::create to Product::create

        return redirect()->route('products.index') // Changed posts.index to products.index
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'category' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|string',
        ]);

        $product->update($request->all());

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
