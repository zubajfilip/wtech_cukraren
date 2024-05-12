<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Address;
use App\Models\Delivery;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderItem;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user)
        
        if($user){
            $shoppingCart = $user->shoppingCart;
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
        } else{

            $cartItems = session()->get('cartItems', []);

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

        $deliveries = Delivery::all();
        $payments = Payment::all();

        return view('carts.cart2', [
            'user' => $user,
            'cartItemsProducts' => $cartItemsProducts,
            'payments' => $payments,
            'deliveries' => $deliveries,
        ]);
    }

    public function pay_and_delivery(Request $request)
    {
        $selectedDelivery = $request->all()['delivery'];
        $selectedPayment = $request->all()['payment'];

        $deliveries = Delivery::pluck('id')->toArray(); 
        $payments = Payment::pluck('id')->toArray(); 

        $request->validate([
            'delivery' => ['required', Rule::in($deliveries)],
            'payment' => ['required', Rule::in($payments)],
        ]);

        $user = Auth::user();
        
        if($user){
            $shoppingCart = $user->shoppingCart;
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
        } else{

            $cartItems = session()->get('cartItems', []);

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

        $delivery = Delivery::where('id', $selectedDelivery)->first();
        $payment = Payment::where('id', $selectedPayment)->first();

        // dd($request->all()['delivery']);
        return view('carts.cart3', [
            'user' => $user,
            'cartItemsProducts' => $cartItemsProducts,
            'payment' => $payment,
            'delivery' => $delivery,
        ]);
    }

    public function handle_order(Request $request)
    {
        // Final stage
        

        // Validation rules for request inputs
        $request->validate([
            'email' => 'required|email:rfc,dns', //https://laravel.com/docs/9.x/validation#rule-email
            'phone' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'psc' => 'required|string|size:6',
            'total' => 'required|numeric',
            'payment' => 'required|json',
            'delivery' => 'required|json',
        ]);

        $user = Auth::user();
        // dd($user)
        
        if($user){
            $shoppingCart = $user->shoppingCart;
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
        } else{

            $cartItems = session()->get('cartItems', []);

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

        $orderStatusPending = OrderStatus::where('name', 'pending')->first();


        $customer = Customer::where('email', $request->input('email'))->first();

        if(!$customer){
            $customer = Customer::create([
                'id' => Str::uuid(),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phone'),
            ]);
        }
        
        $address = Address::where('street', $request->input('street'))
            ->where('city', $request->input('city'))
            ->where('postalCode', $request->input('psc'))
            ->where('country', 'Slovensko')
            ->first();

        if (!$address) {
            $address = Address::create([
                'id' => Str::uuid(),
                'street' => $request->input('street'),
                'city' => $request->input('city'),
                'postalCode' => $request->input('psc'),
                'country' => 'Slovensko',
            ]);
        }

        $order = Order::create([
            'id' => Str::uuid(),
            'orderStatusId' => $orderStatusPending->id,
            'customerEmail' => $request->input('email'),
            'customerPhoneNumber' => $request->input('phone'),
            'paymentMethod' => json_decode($request->input('payment'), true)['id'],
            'deliveryMethod' =>json_decode($request->input('delivery'), true)['id'],
            'deliveryAddressId' => $address->id,            
            'price' => number_format($request->input('total'), 2),
        ]);

        foreach($cartItemsProducts as $cip){
            OrderItem::create([
                'id' => Str::uuid(),
                'orderId' => $order->id,
                'productId' => $cip->productId,
                'quantity' => $cip->quantity,
            ]);

            if($user){
                $shoppingCartId = $user->shoppingCart->id;

                DB::delete('DELETE FROM "cartItems" WHERE "productId" = ? AND "shoppingCartId" = ?', [$cip->productId, $shoppingCartId]);
            }
        }
        if(!$user){
            session()->forget('cartItems');
        }

        return view('carts.final', [
            'user' => $user,
        ]);
    }
}
