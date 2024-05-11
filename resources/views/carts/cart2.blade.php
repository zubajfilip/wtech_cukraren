<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.nav')
    @if(empty($cartItemsProducts))

    <div class="container-fluid d-flex mb-4 justify-content-center">
        <div class="col-6 text-center">
            <h1>WOOP WOOP KOSIK JE PRAZDNY</h1>
            <a href="/"><button type="button" class="btn btn-secondary">Späť nakupovať</button></a>
        </div>
    </div>
    @else
    <div class="container-fluid shipping-phase d-flex col-12 mt-4">
        <div class="row">
            <div class="col-12 col-sm-auto cart d-flex align-items-center me-4 hidden-md-down">
                <div class="circle">
                    1
                </div>
                <div class="text ms-2">Kosik</div>
            </div>

            <div class=" col-12 col-sm-auto shipping-payment d-flex align-items-center me-4">
                <div class="line line-active hidden-md-down"></div>
                <div class="circle circle-active">
                    <b>2</b>
                </div>
                <div class="text ms-2"><b>Doprava a platba</b></div>
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


    <!-- TODO: ZMENIT ACTION NA ENDPOINT KTORY VRATI PAGE  -->
    <form action="{{ route('cart3') }}" method="post">
        @csrf
        <main class="container-fluid mb-4 mt-4">
            <div class="main-section">
                <div class="row main-indent mt-4">
                    <div class="col-sm-12 col-md-6 col-lg-6  delivery-pay-selection mb-4">
                        <div class="delivery-options">
                            <p><b>Doprava</b></p>
                            @foreach($deliveries as $delivery)
                            <div class="row justify-content-between">
                                <div class="col-9">
                                    <input type="radio" id="{{$delivery->id}}" value="{{$delivery->id}}" name="delivery" required>
                                    <label for="{{$delivery->id}}">{{$delivery->name}}</label>
                                </div>

                                <div class="col-3 priplatok text-end">
                                    <p>+{{$delivery->price}}€</p>
                                </div>
                            </div>
                            @endforeach

                            

                            <!-- <div>
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <input type="radio" id="kurier" value="courier" name="delivery">
                                        <label for="kurier">🚚Kurier</label>
                                    </div>
                                    <div class="col-3 priplatok text-end">
                                        <p>+1,30</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="payment-options">
                            <p><b>Platba</b></p>
                            @foreach($payments as $payment)
                            <div class="row justify-content-between">
                                <div class="col-9">
                                    <input type="radio" id="{{$payment->id}}" value="{{$payment->id}}" name="payment" required>
                                    <label for="{{$payment->id}}">{{$payment->name}}</label>
                                </div>
                                <div class="col-3 priplatok text-end">
                                    <p>+{{$payment->price}}€</p>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div>
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <input type="radio" id="karta" value="creditCard" name="payment">
                                        <label for="karta">💳Platobná Karta</label>
                                    </div>
                                    <div class="col-3 priplatok text-end">
                                        <p>+0,00</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <input type="radio" id="dobierka" value="cashOnDelivery" name="payment">
                                        <label for="dobierka">💰Na Dobierku</label>
                                    </div>
                                    <div class="col-3 priplatok text-end">
                                        <p>+0,00</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 shipping-cart-products">
                        @foreach($cartItemsProducts as $cartItemProduct)
                        <div class="mb-1 d-flex justify-content-between align-items-center product-donut-choco_glaze">
                            <img src="{{ asset('storage/' . $cartItemProduct->imagePath) }}" alt="{{ $cartItemProduct->name }}" width="67">
                            <span class="hidden-md-up">{{$cartItemProduct->name}}</span>
                            @php
                            $productPrice = $cartItemProduct->price * $cartItemProduct->quantity;
                            @endphp
                            <span class="ms-1 piece-price text-end">{{$cartItemProduct->quantity}} ks / {{ number_format($productPrice, 2) }}€</span>
                        </div>
                        @endforeach
                        <!-- <div
                            class="mb-1 last-product d-flex justify-content-between align-items-center product-donut-choco_glaze">
                            <img src="./images/choco_glaze.jpg" alt="Choco glazed donut" width="80">
                            <span class="hidden-md-up">Čokoládový Donut</span>
                            <span class="ms-1 piece-price text-end">1 ks / 0,89€</span>
                        </div> -->

                        <div class="selected-options">

                            <div class="col-12 d-flex selected-delivery mt-2">
                                <span class="col-4">Doprava</span>
                                <span class="col-8 text-end price-delivery"></span>
                            </div>

                            <div class="col-12 d-flex selected-payment last-product mt-2 mb">
                                <span class="col-4">Platba</span>
                                <span class="col-8 text-end price-payment"></span>
                            </div>
                        </div>

                        <div class="col-12 d-flex sum">
                            <span class="col-6">Spolu</span>
                            <span class="col-6 text-end">6,64€</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="container-fluid d-flex mb-4 mt-2">
            <div class="col-6 d-flex justify-content-left">
                <a href="/cart1"><button type="button" class="btn btn-secondary">Spät</button></a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Pokračovať</button>
            </div>
        </div>
    </form>
    @endif


    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/cart2_controller.js') }}"></script>
</body>

</html>