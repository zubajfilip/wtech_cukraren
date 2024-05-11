<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DonutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('type', 'Donut')->get();
        $categories = Category::all();
        
        $user = Auth::user();
        
        if ($user) {
            // User is logged in, fetch their shopping cart
            $shoppingCart = $user->shoppingCart;
        } else {
            $shoppingCart = session()->get('cartItems', []);
            // User is not logged in, create a shopping cart in session storage
            // Check if a shopping cart already exists in session
            // if (!Session::has('cartItems')) {
            //     // If no shopping cart exists, create a new one
            //     Session::put('cartItems', []);
            // }
            // // Retrieve the shopping cart from session
            // $shoppingCart = Session::get('cartItems');
        }

        // dd($shoppingCart);

        return view('donuts.index', [
            'user' => $user,
            'products' => $products,
            'categories' => $categories,
            'shoppingCart' => $shoppingCart,
        ]);

        // return view('donuts.index', [
        //     'user' => $user,
        //     'products' => $products,
        //     'categories' => $categories, 
        // ]);
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


        // $product = Product::where('id', $id)->first();
        // $details = $product ? json_decode($product->details, true) : null;
        
        $product = Product::find($id);

        if ($product) {
            $categories = $product->categories()->get();
        } else {
            $categories = [];
        }

        return view('donuts.detail', [
            'user' => $user,
            'product' => $product,
            'categories' => $categories,
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
