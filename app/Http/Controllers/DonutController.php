<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DonutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('type', 'Donut')->get();
        return view('donuts.index')->with('products', $products);
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
        $product = Product::findOrFail($id);
        $details = json_decode($product->details, true);
        return view('donuts.detail', [
            'product' => $product,
            'details' => $details,
        ]);
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

    /**
     * Handle search request.
     */
    public function search(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->input('search');

        // Perform the search in the products table
        $products = Product::where('name', 'like', "%$searchQuery%")->get();

        // Pass the search results to the view
        return view('search-results', ['products' => $products, 'searchQuery' => $searchQuery]);
    }
}
