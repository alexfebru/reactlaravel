<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Products; 
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::paginate(10);
        // $products = DB::table('product')->select('id','title')->get();
        return view('content.dashboard.dashboards-analytics', [
            'products' => $products
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'required|url',
        ]);

        Products::create([
            'title' => $request->title, 
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $request->image,
        ]);

        Products::create($request->all()); // Changed Post::create to Product::create

        return redirect()->route('/') // Changed posts.index to products.index
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('content.dashboard.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('content.dashboard.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
