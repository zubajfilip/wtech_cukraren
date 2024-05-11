<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{

    

    // public function getCartData()
    // {
    //     // Check if user is authenticated
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //         // Retrieve cart items from the database
    //         $cartItems = CartItem::join('shoppingCarts', 'cartItems.shoppingCartId', '=', 'shoppingCarts.id')
    //             ->join('products', 'cartItems.productId', '=', 'products.id')
    //             ->where('shoppingCarts.userId', '=', $user->id)
    //             ->select('cartItems.*', 'products.*')
    //             ->get();
    //     } else {
    //         // Retrieve cart items from session storage or elsewhere
    //         // $cartItems = // Retrieve cart items from session storage or elsewhere
    //     }

    //     // Return cart data as JSON response
    //     return response()->json(['cartItems' => $cartItems]);
    // }


    public function purchase(Request $request)
    {   
        // Validate the incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if (Auth::check()) {
            // Handle the case when the user is authenticated
            $user = Auth::user();

            // // qunatity field is not filled the buy button was pressed
            // if (!$request->filled('quantity')){
            //     $request->quantity = 1;
            // }

            // Check if the user already has a shopping cart
            $shoppingCart = $user->shoppingCart;
        
            if (!$shoppingCart) {
                // If the user does not have a shopping cart, create a new one
                $shoppingCart = $user->shoppingCart()->create([
                    'id' => Str::uuid(),
                    'userId' => $user->id,
                ]);
            }
    
            // Get the UUID of the shopping cart
            $shoppingCartUuid = $shoppingCart->id;
    
            // Update cart item (logic remains the same)
            $cartItem = $shoppingCart->items()->where('productId', $request->product_id)->first();

            // dd($cartItem);

            // Create a new cart item and associate it with the shopping cart if it doesnt exist
            if(!$cartItem){
                $cartItem = $shoppingCart->items()->create([
                    'id' => Str::uuid(),
                    'shoppingCartId' => $shoppingCartUuid,
                    'productId' => $request->product_id,
                    'quantity' => $request->quantity,
                ]);
            }
            // Update the qunatity
            else{
                $cartItem->quantity = $request->quantity;
                $cartItem->save();
            }
            
        } else {
            // Handle the case when the user is not authenticated

            $cartItems = session()->get('cartItems', []);

            $quantity = isset($cartItems[$request->product_id]) ? $cartItems[$request->product_id] : 0;
            
            $cartItems[$request->product_id] = $quantity + $request->quantity;
        
            session()->put('cartItems', $cartItems);

            $user = null;
        }
    
        // Retrieve products
        $products = Product::where('type', 'Donut')->get();
    
        // Return back to the previous page with products and user ID
        return back()->with('products', $products)->with('user', $user);
    }

    // Method to increase product quantity
    public function increaseProductQuantity(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Retrieve the shopping cart for the authenticated user
            $shoppingCart = $user->shoppingCart;

            // dd($shoppingCart);

            if ($shoppingCart) {
                // Retrieve the product ID from the request
                $productId = $request->input('product_id');
                
                // Retrieve the cart item for the given product ID in the user's shopping cart
                $cartItem = $shoppingCart->items()->where('productId', $productId)->first();
                
                if ($cartItem) {
                    // Increase the quantity by 1
                    $cartItem->quantity += 1;
                    $cartItem->save();
                    
                    // Retrieve products
                    
                    // Return back to the previous page with products and user ID
                }
            }
        } else {
            
            $cartItems = session()->get('cartItems', []);
            
            $quantity = isset($cartItems[$request->product_id]) ? $cartItems[$request->product_id] : 0;
            
            $cartItems[$request->product_id] = $quantity + 1;
            
            session()->put('cartItems', $cartItems);
            
            $user = null;
        }
        
        // Handle the case when the user is not authenticated or the product is not found
        $products = Product::where('type', 'Donut')->get();
        return back()->with('products', $products)->with('user', $user);
        // return back()->with('error', 'Failed to increase product quantity.');
    }

    // Method to decrease product quantity
    public function decreaseProductQuantity(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Retrieve the shopping cart for the authenticated user
            $shoppingCart = $user->shoppingCart;

            if ($shoppingCart) {
                // Retrieve the product ID from the request
                $productId = $request->input('product_id');
                
                // Retrieve the cart item for the given product ID in the user's shopping cart
                $cartItem = $shoppingCart->items()->where('productId', $productId)->first();
                
                if ($cartItem) {
                    $cartItem->quantity -= 1;
                    $cartItem->save();

                    // Check if quantity becomes zero after decreasing
                    if ($cartItem->quantity == 0) {
                        // Call the removeItem() method
                        $this->removeItem($productId);
                    }
                }
                
                // Retrieve products
                
                // Return back to the previous page with products and user ID
            }
        } else {
            $cartItems = session()->get('cartItems', []);
            
            $quantity = isset($cartItems[$request->product_id]) ? $cartItems[$request->product_id] : 0;
            
            $cartItems[$request->product_id] = $quantity - 1;
            
            if($cartItems[$request->product_id] == 0){
                unset($cartItems[$request->product_id]);
            }
            
            session()->put('cartItems', $cartItems);
            
            
            $user = null;
            
            // return back()->with('products', $products);
        }
        
        $products = Product::where('type', 'Donut')->get();
        return back()->with('products', $products)->with('user', $user);
        // Handle the case when the user is not authenticated or the product is not found
        // return back()->with('error', 'Failed to decrease product quantity.');
    }

    // Method to remove item
    public function removeItem(string $productId)
    {
        if(Auth::check()){
            $user = Auth::user();
            $shoppingCartId = $user->shoppingCart->id;

            DB::delete('DELETE FROM "cartItems" WHERE "productId" = ? AND "shoppingCartId" = ?', [$productId, $shoppingCartId]);

        } else {
            $cartItems = session()->get('cartItems', []);
            unset($cartItems[$productId]);
            session()->put('cartItems', $cartItems);
            $user = null;
        }

        // Return back to the previous page with user
        return back()->with('user', $user);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Retrieve the shopping cart for the authenticated user
            $shoppingCart = $user->shoppingCart;

            

            // dd($shoppingCart->items()->get());

            if (!$shoppingCart) {

                // If the user doesn't have a shopping cart yet, create a new one
                $shoppingCart = new ShoppingCart();
                $shoppingCart->id = Str::uuid();
                $shoppingCart->userId = $user->id;
                $shoppingCart->save();
            }

            $cartItemsProducts = DB::select('
                SELECT "cartItems".*, products.*
                FROM "cartItems"
                JOIN products ON "cartItems"."productId" = products.id
                WHERE "cartItems"."shoppingCartId" = ?
            ', [$shoppingCart->id]);
            
        } else {
            $cartItems = session()->get('cartItems', []);

            // Fetch product details for each cart item
            $cartItemsProducts = [];

            foreach ($cartItems as $productId => $quantity) {
                $product = Product::find($productId);
                
                if ($product) {

                    $cartItemsProducts[] = (object) [
                        'productId' => $productId,
                        'quantity' => $quantity,
                        'name' => $product->name,
                        'price' => $product->price,
                        'imagePath' => $product->imagePath,
                    ];
                }
            }
            $user = null;
        }
        // Handle the case when the user is not authenticated or the shopping cart is not found
        return view('carts.cart1', [
            'user' => $user,
            'cartItemsProducts' => $cartItemsProducts,
        ]);
        // return back()->with('error', 'Failed to load shopping cart items.');
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