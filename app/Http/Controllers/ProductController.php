<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            return view('products.index', [
                'user' => $user
            ]);
        }

        return view('products.index', [
            'user' => null,
        ]);
    }

    public function filter(Request $request)
    {

        $categories = Category::pluck('id')->toArray(); 
        
        // dd($request);
        $request->validate([
            'priceFrom' => 'nullable|numeric|min:0',
            'priceTo' => 'nullable|numeric|min:0',
            'sortBy' => 'nullable|string|in:Od najlacnejšieho,Od najdrahšieho',
            'categories.*' => 'nullable|string',
            'categories' => ['array','nullable', Rule::in($categories)],
        ]);

        $priceFrom = $request->input('priceFrom');
        $priceTo = $request->input('priceTo');
        $sortBy = $request->input('sortBy');

        $filteredProducts = Product::query();

        if (!empty($priceFrom)) {
            $filteredProducts->where('price', '>=', $priceFrom);
        }

        if (!empty($priceTo)) {
            $filteredProducts->where('price', '<=', $priceTo);
        }

        if($request->categories){
            foreach ($request->categories as $categoryId) {
                $filteredProducts->whereHas('categories', function($query) use ($categoryId) {
                    $query->where('categories.id', $categoryId);
                });
            }
        }
        
        

        if ($sortBy === 'Od najlacnejšieho') {
            $filteredProducts->orderBy('price', 'asc');
        } elseif ($sortBy === 'Od najdrahšieho') {
            $filteredProducts->orderBy('price', 'desc');
        }
        
        $products = $filteredProducts->simplePaginate(2);

        $user = Auth::user();
        $categoriesAll = Category::all();

        if($user){
            $shoppingCart = $user->shoppingCart;
            if (!$shoppingCart) {
                // If the user doesn't have a shopping cart yet, create a new one
                $shoppingCart = new ShoppingCart();
                $shoppingCart->id = Str::uuid();
                $shoppingCart->userId = $user->id;
                $shoppingCart->save();
            }
        } else{
            $shoppingCart = session()->get('cartItems', []);
        }

        // return view('search-results', compact('products'))->with('user', $user)->with('categories', $categoriesAll);
        return view('donuts.index', [
            'user' => $user,
            'products' => $products,
            'categories' => $categoriesAll,
            'categoriesChecked' => $request->categories,
            'shoppingCart' => $shoppingCart,
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
