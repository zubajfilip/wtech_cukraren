@extends('app')

@section('content')
    <main class="container-fluid">
        <div class="container-fluid product">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Domov</a></li>
                    <li class="breadcrumb-item"><a href="/donuts">Donuty</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                </ol>
            </nav>

            <div class="container-fluid text-center donut-product-outline">
                <div class="description">
                    <h1>{{$product->name}}</h1>
                    <p>{{$product->description}}</p>
                </div>
                <div>
                    <img src="{{ asset('storage/' . $product->imagePath) }}" alt="{{ $product->name }}"
                        class="img-fluid" width="190" height="150">
                </div>
                <div class="price">
                    <p>{{$product->price}}€/ks</p>
                </div>


                <div class="row buy-section d-flex justify-content-center">
                    @csrf
                    <div class="col-md-6 col-12 counter d-flex justify-content-center align-items-center">


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

                        <button type="button" class="btn btn-outline-secondary decrement-button button-plus-minus">-</button>
                        <span class="quantity-value me-4 ms-4" style="font-size: 24px">{{$quantity}}</span>
                        <button type="button" class="btn btn-outline-secondary increment-button button-plus-minus">+</button>
                    </div>
                    <div class="col-md-6 col-12">
                        <form action="{{ route('purchase') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input id="quantity" type="hidden" name="quantity" value="{{$quantity}}">

                            <button type="submit" class="btn btn-secondary buy-button text">
                                Pridať do Košíka
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-4 mb-4">
                    <div class="container-fluid details text-left donut-product-outline">

                        <h3 class="text-left">Detaily</h3>
                        <ul>
                            <li>hmotnosť {{ $product->weight }}</li>
                            @foreach ($categories as $category)
                            <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid mt-4">
            <div class="Suggestions text-center">
                <h3>Ostatní tiež objednávajú</h3>
                <!-- pridat sem ostatne produkty -->
                <div class="row d-flex justify-content-center">
                    @foreach ($otherProducts as $otherProduct)
                    <div
                        class="col-md-4 col-sm-6 col-12 d-flex flex-column align-items-center justify-content-end product text-center">
                        <a href="{{ route('donuts.show', $otherProduct->id) }}">
                            <img src="{{ asset('storage/' . $otherProduct->imagePath) }}"
                                alt="{{ $otherProduct->name }}" width="150" class="img-fluid">
                        </a>
                        <div class="name-price">
                            <p>{{ $otherProduct->name }}</p>
                            <p class="price">{{ $otherProduct->price }}€/ks</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/detail_donuts.js') }}"></script>
@endsection