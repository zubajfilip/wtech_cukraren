<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $Request)
    {
        $user = Auth::user();
        $searchTerm = $Request->input('search'); // Get the search query from the request

        // Perform the search on the Product model
        $products = Product::where('name', 'ILIKE', "%$searchTerm%")->get();

        // Return the search results to the view (details in step 3)
        return view('search-results', compact('products'))->with('user', $user);
    }
}
