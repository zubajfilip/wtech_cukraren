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
        
        //dd($products);
        // Return the search results to the view
        return view('search-results', [
            'products' => $products,
            'user' => $user,
        ]);
    }
}
