<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $Request)
    {
        $user = Auth::user();
        $searchTerm = $Request->input('search');

        DB::statement('CREATE EXTENSION IF NOT EXISTS unaccent');

        $sql = "SELECT * 
        FROM products 
        WHERE unaccent(name) ILIKE unaccent('%' || ? || '%')";
        
        $products = DB::select($sql, [$searchTerm]);
        
        if ($user) {
            // User is logged in, fetch their shopping cart
            $shoppingCart = $user->shoppingCart;
            // dd($shoppingCart);
            if (!$shoppingCart) {
                // If the user doesn't have a shopping cart yet, create a new one
                $shoppingCart = new ShoppingCart();
                $shoppingCart->id = Str::uuid();
                $shoppingCart->userId = $user->id;
                $shoppingCart->save();
            }
        } else {
            $shoppingCart = session()->get('cartItems', []);
        }
        
        // Return the search results to the view
        return view('products.search-results', [
            'products' => $products,
            'user' => $user,
            'shoppingCart' => $shoppingCart,
        ]);
    }
}
