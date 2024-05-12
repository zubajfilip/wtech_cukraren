@extends('app')
@section('content')
    <main>
        <div class="container-fluid products">
            <div class="row d-flex justify-content-center">
                @if (count($products) > 0)
                @foreach ($products as $product)
                <div
                    class="col-md-4 col-sm-6 d-flex flex-column align-items-center justify-content-end product text-center">
                    <a href="{{ route('donuts.show', $product->id) }}">
                        <img src="{{ asset('storage/' . $product->imagePath) }}" alt="{{ $product->name }}" width="190"
                            height="150" class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>{{ $product->name }}</p>
                        <p class="price">{{ $product->price }}€/ks</p>
                    </div>

                    @php
                        if (isset($user)) {
                        // User is authenticated, access items directly
                        $cartItem = $shoppingCart->items->firstWhere('productId', $product->id);
                        $quantity = $cartItem ? $cartItem->quantity : 0;
                        } else{
                        // User is not authenticated
                        $cartItems = session()->get('cartItems', []);
                        $quantity = isset($cartItems[$product->id]) ? $cartItems[$product->id] : 0;
                    }
                    @endphp

                    @if ($user && $quantity > 0)
                    <div class="d-flex counter-container align-items-center">
                        <form action="{{ route('decrease_product_quantity') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" name="decrease_button" class="btn btn-secondary">-</button>
                        </form>
                        <span style="margin-right: 10px; margin-left: 10px;">{{ $quantity }}</span>
                        <form action="{{ route('increase_product_quantity') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" name="increase_button" class="btn btn-secondary">+</button>
                        </form>
                    </div>
                    @else
                    <form action="{{ route('purchase') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input id="quantity" type="hidden" name="quantity" value="1">
                        <button type="submit" name="buy_button" class="btn btn-secondary buy-button">Objednať</button>
                    </form>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="container text-center mt-3 mb-3">
                <h2>Takéto produkty nemáme 🥺</h2>
            </div>
            @endif
        </div>
    </main>
@endsection