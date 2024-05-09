<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('type', 'Donut')->get();
        
        $user = Auth::user();

        // Assuming your user model has an 'email' attribute
        
        return view('donuts.index', [
            'user' => $user,
            'products' => $products,    
        ]);
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
        $otherProducts = DB::table('products')->inRandomOrder()->limit(3)->get();

        $user = Auth::user();


        $product = Product::where('id', $id)->first();
        $details = $product ? json_decode($product->details, true) : null;
        return view('donuts.detail', [
            'user' => $user,
            'product' => $product,
            'details' => $details,
            'otherProducts' => $otherProducts,
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
}
