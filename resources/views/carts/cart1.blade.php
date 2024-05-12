@extends('app')
@section('content')
    @if(empty($cartItemsProducts))

    <div class="container-fluid d-flex mb-4 justify-content-center">
        <div class="col-6 text-center">
            <h1>Váš košík je prázdny</h1>
            <a href="/"><button type="button" class="btn btn-secondary">Vrátiť sa k nakupovaniu</button></a>
        </div>
    </div>
    @else
    <div class="container-fluid shipping-phase d-flex col-12 mt-4 ">
        <div class="row">
            <div class="col-12 col-sm-auto cart d-flex align-items-center me-4 hidden-md-down">
                <div class="circle circle-active">
                    <b>1</b>
                </div>
                <div class="text ms-2"><b>Košík</b></div>
            </div>

            <div class=" col-12 col-sm-auto shipping-payment d-flex align-items-center me-4">
                <div class="line  hidden-md-down"></div>
                <div class="circle ">
                    2
                </div>
                <div class="text ms-2">Doprava a platba</div>
            </div>
            <div class="col-12 col-sm-auto shipping-info d-flex align-items-center">
                <div class="line hidden-md-down"></div>
                <div class="circle">
                    3
                </div>
                <div class="text ms-2">Dodacie údaje</div>
            </div>
        </div>
    </div>

    <main class="container-fluid mb-4 mt-4">
        <div class="container-fluid shopping-cart-products">
            <div class="hidden-md-down last-product">
                <div class="row">
                    <span class="col-4 text-center">Produkt</span>
                    <span class="col-4 text-center">Množstvo</span>
                    <span class="col-3 text-end">Bez DPH / S DPH</span>
                </div>
            </div>
            @foreach ($cartItemsProducts as $cartItemProduct)
            <div class="hidden-md-down mb-4">
                <div class="row product-donut-choco_glaze d-flex align-items-center">
                    <div class="product-name-img col-lg-4 col-md-4 col-sm-3 d-flex align-items-center">
                        <img class="img-fluid" src="{{ asset('storage/' . $cartItemProduct->imagePath) }}"
                            alt="{{ $cartItemProduct->name }}" width="90">
                        <div><b>{{ $cartItemProduct->name }}</b></div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-3 ">
                        <div class="counter d-flex justify-content-center">
                            <form action="{{ route('decrease_product_quantity') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $cartItemProduct->productId  }}">
                                <button type="submit" name="decrease_button"
                                    class="btn btn-outline-secondary">-</button>
                            </form>
                            <span class=" me-4 ms-4 " style="font-size: 24px">{{ $cartItemProduct->quantity }}</span>
                            <form action="{{ route('increase_product_quantity') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $cartItemProduct->productId }}">
                                <button type="submit" name="increase_button"
                                    class="btn btn-outline-secondary">+</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 d-flex total-donut-price justify-content-end">
                        <b>
                            @php
                            $productPrice = $cartItemProduct->price * $cartItemProduct->quantity;
                            $woDPHPrice = $productPrice * 0.8
                            @endphp
                            {{ number_format($woDPHPrice, 2) }}/{{ number_format($productPrice, 2) }}€
                        </b>
                    </div>

                    <div class="col-lg-1 col-md-1 col-sm-3 d-flex justify-content-end">
                        <form action="{{ route('remove_item', ['productId' => $cartItemProduct->productId]) }}"
                            method="post">
                            @csrf
                            <button type="submit" name="remove_button" class="btn btn-danger">X</button>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach

            <!-- div will appear on md-down-scaling -->
            @foreach ($cartItemsProducts as $cartItemProduct)
            <div class="hidden-md-up mb-4">
                <div class="row">
                    <div class="product-name-img col-12 d-flex align-items-center">
                        <img class="" src="{{ asset('storage/' . $cartItemProduct->imagePath) }}"
                            alt="Choco glazed donut" width="" height="70">
                        <span><b>{{$cartItemProduct->name}}</b></span>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-4 counter d-flex justify-content-start">
                        <form action="{{ route('decrease_product_quantity') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $cartItemProduct->productId  }}">
                            <button type="submit" name="decrease_button" class="btn btn-outline-secondary">-</button>
                        </form>
                        <span class=" me-4 ms-4 " style="font-size: 24px">{{ $cartItemProduct->quantity }}</span>
                        <form action="{{ route('increase_product_quantity') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $cartItemProduct->productId }}">
                            <button type="submit" name="increase_button" class="btn btn-outline-secondary">+</button>
                        </form>
                    </div>

                    <span class="col-4 total-donut-price d-flex justify-content-center align-items-center">
                        <b>
                            @php
                            $productPrice = $cartItemProduct->price * $cartItemProduct->quantity;
                            $woDPHPrice = $productPrice * 0.8
                            @endphp
                            {{ number_format($woDPHPrice, 2) }}/{{ number_format($productPrice, 2) }}€
                        </b>
                    </span>
                    <div class="col-2 d-flex justify-content-end">
                        <form action="{{ route('remove_item', ['productId' => $cartItemProduct->productId]) }}"
                            method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger fluid" id="delete-product"><b>X</b></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="hidden-md-down mt-4 mb-2">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                    <span class="col-3 text-end">
                        @php
                        $totalPrice = 0;
                        @endphp
                        @foreach($cartItemsProducts as $cartItem)
                        @php
                        $totalPrice += $cartItem->price * $cartItem->quantity;
                        @endphp
                        @endforeach
                        @php
                        $woDPHtotal = $totalPrice * 0.8
                        @endphp
                        {{ number_format($woDPHtotal, 2) }}/{{ number_format($totalPrice, 2) }}€
                    </span>
                </div>
            </div>

            <div class="hidden-md-up mt-4 mb-2">
                <div class="row d-flex justify-content-between">
                    <div class="col-4"></div>
                    <span class="col-4 text-center">
                        {{ number_format($totalPrice, 2) }}€
                    </span>
                    <div class="col-2"></div>
                </div>
            </div>

        </div>


        <!-- <div class="price-sum">0,86€</div> -->

        <div class="container-fluid d-flex mb-4">
            <div class="col-6 d-flex justify-content-left">
                <a href="/home"><button type="button" class="btn btn-secondary">Späť</button></a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="{{ url('/cart2') }}"><button type="button" class="btn btn-success">Pokračovať</button></a>
            </div>
        </div>
    </main>
    @endif
@endsection