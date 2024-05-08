<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart_item;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    

    public function getCartData()
    {
        // Check if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            // Retrieve cart items from the database
            $cartItems = CartItem::join('shoppingCarts', 'cartItems.shoppingCartId', '=', 'shoppingCarts.id')
                ->join('products', 'cartItems.productId', '=', 'products.id')
                ->where('shoppingCarts.userId', '=', $user->id)
                ->select('cartItems.*', 'products.*')
                ->get();
        } else {
            // Retrieve cart items from session storage or elsewhere
            // $cartItems = // Retrieve cart items from session storage or elsewhere
        }

        // Return cart data as JSON response
        return response()->json(['cartItems' => $cartItems]);
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
