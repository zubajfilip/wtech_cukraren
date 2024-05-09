<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

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
        // Retrieve form inputs from the request
        $priceFrom = $request->input('priceFrom');
        $priceTo = $request->input('priceTo');
        $sortBy = $request->input('sortBy');
        $withToppings = $request->filled('withToppings');
        $withoutToppings = $request->filled('withoutToppings');
        $stuffed = $request->filled('stuffed');
        $unstuffed = $request->filled('unstuffed');

        // Query builder for products
        $query = Product::query();

        // Apply filters based on form inputs
        if (!empty($priceFrom)) {
            $query->where('price', '>=', $priceFrom);
        }

        if (!empty($priceTo)) {
            $query->where('price', '<=', $priceTo);
        }

        if ($withToppings) {
            $query->where('with_toppings', true);
        }

        if ($withoutToppings) {
            $query->where('with_toppings', false);
        }

        if ($stuffed) {
            $query->where('stuffed', true);
        }

        if ($unstuffed) {
            $query->where('stuffed', false);
        }

        // Apply sorting
        if ($sortBy === 'Od najlacnejšieho') {
            $query->orderBy('price', 'asc');
        } elseif ($sortBy === 'Od najdrahšieho') {
            $query->orderBy('price', 'desc');
        }

        dd($query);

        // Retrieve filtered products
        $filteredProducts = $query->get();

        $user = Auth::user();

        // Return the filtered products to the view
        return view('filtered-products', compact('filteredProducts'))->with('user');
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
