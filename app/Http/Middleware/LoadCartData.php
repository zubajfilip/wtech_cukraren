<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class LoadCartData
{
    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
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
            // Pass cart items to the view
            view()->share('cartItems', $cartItems);
        } else {
            // Handle non-authenticated user (e.g., retrieve cart data from session)
            // You can still pass empty cart data or handle it differently
            view()->share('cartItems', []);
        }

        return $next($request);
    }
}
