<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Products; 
use App\Http\Resources\ProductResource;
/* use Dotenv\Validator; */
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexs()
    {
        /* $products = Products::paginate(10); */
        $products = Products::all();
        // $products = Products::all();
        // $products = DB::table('product')->select('id','title')->get();

      /*   return response()->json(['products' => $products], 200); */
        // return view('content.dashboard.dashboards-analytics', ['products' => $products]);

        return view('content.dashboard.dashboards-analytics', compact('products'));
        // return view('content.dashboard.dashboards-analytics', [
        //     'products' => $products
        // ]);
        
    }
    public function index()
    {
        /* $products = Products::paginate(10); */
        $products = Products::get();
        if ($products->count() > 0) {
            // Return a collection of products using the ProductResource
            return ProductResource::collection($products);
        } 
        else
        {
            // Return a 404 response if no products are found
            return response()->json(['message' => 'No products found'], 404);
        }
     
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.dashboard.create');
    }

    public function insert(Request $request)
    {
       $product = new Products();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move(public_path('assets/uploads/products'), $filename);

            $product->image = $filename;
        }
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category = $request->input('category');

        /* Products::create($request->all()); */

        $product->save();
        $product = Products::create($request->all());
        return redirect()->route('products')
            ->with('success', 'Product created successfully.');
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        
     /*    $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'required|url',
        ]);
 */

        $products = Products::create([
            'title' => $request->title, 
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => new ProductResource($products)
        ], 200);

       /*  Products::create($request->all());  */

        /* return redirect()->route('content.dashboard.dashboards-analytics') 
            ->with('success', 'Product created successfully.'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return new ProductResource($product);
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
    public function update(Request $request , Products $products)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

         $products = Products::create([
            'title' => $request->title, 
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => new ProductResource($products)
        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
