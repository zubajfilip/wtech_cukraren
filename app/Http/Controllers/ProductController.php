<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if a user is logged in
        if (Auth::check()) {
            // Fetch the currently logged-in user
            $user = Auth::user();

            // Pass the user's email and ID to the view
            return view('index', [
                'user' => $user
            ]);
        }

        // If no user is logged in, pass null values to the view
        return view('index', [
            'user' => null,
        ]);
    }


    public function filter(Request $request)

    {

        $priceFrom = $request->input('priceFrom');
        $priceTo = $request->input('priceTo');
        $sortBy = $request->input('sortBy');
        $withToppings = $request->filled('withToppings');
        $withoutToppings = $request->filled('withoutToppings');
        $stuffed = $request->filled('stuffed');
        $unstuffed = $request->filled('unstuffed');

        // Query builder for products
        $filteredProducts = Product::query();

        if (!empty($priceFrom)) {
            $filteredProducts->where('price', '>=', $priceFrom);
        }

        if (!empty($priceTo)) {
            $filteredProducts->where('price', '<=', $priceTo);
        }

        if ($withToppings) {
            $filteredProducts->whereHas('categories', function($query){
                $query->where('name', 'posýpaný');
            });
        }

        if ($withoutToppings) {
            $filteredProducts->whereHas('categories', function($query){
                $query->where('name', 'neposýpaný');
            });
        }

        if ($stuffed) {
            $filteredProducts->whereHas('categories', function($query){
                $query->where('name', 'plnený');
            });
        }

        if ($unstuffed) {
            $filteredProducts->whereHas('categories', function($query){
                $query->where('name', 'neplnený');
            });
        }

        if ($sortBy === 'Od najlacnejšieho') {
            $filteredProducts->orderBy('price', 'asc');
        } elseif ($sortBy === 'Od najdrahšieho') {
            $filteredProducts->orderBy('price', 'desc');
        }
        
        $filteredProducts = $filteredProducts->get();

        $user = Auth::user();

        return view('donuts.index')->with('products', $filteredProducts)->with('user', $user);
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
