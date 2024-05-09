<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function addProduct(Request $request)
    {
        // Check if a user is logged in and if its admin
        if (!Auth::check() || !Admin::where('userId', $user->id)->exists()) {
            $user = Auth::user();
            return view('admins.noAuth')->with($user);
        }

        // user if logged in and is admin

        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:Donut,Cake',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'imagePath' => 'required|string',
            'weight' => 'required|string',
        ]);

        $product = new Product();
        $product->id = Str::uuid();
        $product->name = $request->name;
        $product->type = $request->type;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->imagePath = $request->imagePath;
        $product->weight = $request->weight;
        
        $product->save();

        return response()->json(['message' => 'Product added successfully']);
    }



    public function addProductCategory(Request $request)
    {

        // Check if a user is logged in and if its admin
        if (!Auth::check() || !Admin::where('userId', $user->id)->exists()) {
            $user = Auth::user();
            return view('admins.noAuth')->with($user);
        }

        // user if logged in and is admin

        $user = Auth::user();


        $request->validate([
            'product_id' => 'required|exists:products,id',
            'category_name' => 'required|string',
        ]);

        $product = Product::findOrFail($request->product_id);
        $category = Category::where('name', $request->category_name)->firstOrFail();

        $joinTable = new CategoryProduct();
        $joinTable->productId = $product->id;
        $joinTable->categoryId = $category->id;
        
        $product->save();

        return response()->json(['message' => 'Category added to product successfully']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
