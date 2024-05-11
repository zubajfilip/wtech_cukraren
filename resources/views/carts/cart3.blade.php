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
    <div class="container-fluid shipping-phase d-flex col-12 mt-4 mb-4">
        <div class="row">
            <div class="col-12 col-sm-auto cart d-flex align-items-center me-4 hidden-md-down">
                <div class="circle">
                    1
                </div>
                <div class="text ms-2">Kosik</div>
            </div>

            <div class=" col-12 col-sm-auto shipping-payment d-flex align-items-center me-4">
                <div class="line hidden-md-down"></div>
                <div class="circle ">
                    2
                </div>
                <div class="text ms-2">Doprava a platba</div>
            </div>
            <div class="col-12 col-sm-auto shipping-info d-flex align-items-center">
                <div class="line line-active hidden-md-down"></div>
                <div class="circle circle-active">
                    <b>3</b>
                </div>
                <div class="text ms-2"><b>Dodacie údaje</b></div>
            </div>
        </div>
    </div>

    <form action="{{ route('handle_order')}}" method="post">

        @csrf

        <main class="container-fluid ">

            <div class="main-section">

                <div class="row main-indent mt-4">

                    <div class="col-12 col-md-7 col-lg-7 delivery-data mb-4">
                        <!-- <div class="col-12">
                            <input type="radio" id="saved-info" value="saved-info" name="saved-info" disabled>
                            <label for="saved-info">Dodať na uloženú adresu</label>
                        </div>
                        <div class="col-12">
                            <input type="radio" id="add-info" value="add-info" name="saved-info" checked>
                            <label for="add-info">Zadať dodacie údaje</label>
                        </div> -->
                        <div class="state mb-3">
                            <!-- <div class="state lable ">
                                Štát
                            </div> -->
                            <label for="country">Štát</label>
                            <input id="country" name="country" value="Slovensko" class="form-control" disabled placeholder="Slovensko">
                        </div>
                        <div class="city mb-3">
                            <label for="city">Mesto</label>
                            <input id="city" name="city" class="form-control" required placeholder="Mesto" maxlength="50">
                        </div>
                        <div class="adress mb-3">
                            
                            <label for="street">Ulica a číslo domu</label>
                            <input id="street" name="street" class="form-control" required placeholder="Ulica a číslo domu" maxlength="255">
                        </div>
                        <div class="PSC mb-3">
                            <label for="psc">PSČ</label>
                            <input id="psc" name="psc" class="form-control" required placeholder="972 45" maxlength="6">
                        </div>
                        <div class="email-adress mb-3">
                            <label for="email">E-mail</label>
                            <input id="email" name="email" class="form-control" required placeholder="mail@gmail.com" maxlength="255">
                        </div>
                        <div class="phone-number mb-3">
                            <label for="phone">Telefónne číslo</label>
                            <input id="phone"  name="phone" class="form-control" placeholder="+421 9xx xxx xxx" maxlength="13">
                        </div>
                    </div>

                    @php
                        $total = 0
                    @endphp
                    <div class=" col-md-5 col-lg-5 col-12 shipping-cart-products">
                        @foreach ($cartItemsProducts as $cartItemProduct)
                        <div class="mb-1 d-flex justify-content-between align-items-center product-donut-choco_glaze">
                            <img src="{{ asset('storage/' . $cartItemProduct->imagePath) }}"
                                alt="{{ $cartItemProduct->name }}" width="60">

                            <span class="hidden-sm-up">{{ $cartItemProduct->name }}</span>
                            @php
                            $productPrice = $cartItemProduct->price * $cartItemProduct->quantity;
                            $total += $productPrice
                            @endphp

                            <span class="piece-price text-end">{{ $cartItemProduct->quantity }} ks /
                                {{ number_format($productPrice, 2) }}€</span>
                                
                            </div>
                            
                        @endforeach

                        <div class="selected-options ">
                            <div class="col-12 d-flex selected-delivery">
                                <div class="col-6">
                                    <p>Doprava</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>+{{$delivery->price}}€</p>
                                </div>

                            </div>
                            <div class="col-12 d-flex selected-payment last-product">
                                <div class="col-6">
                                    <p>Platba</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>+{{$payment->price}}€</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex sum mt-auto">
                            <span class="col-6">Spolu</span>
                            @php
                            $total += $payment->price + $delivery->price;
                            @endphp
                            <span class="col-6 text-end">{{ number_format($total, 2) }}€</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="container-fluid d-flex mb-4 mt-2">
            <div class="col-3 d-flex justify-content-left">
                <a href="/cart2"><button type="button" class="btn btn-secondary">Spät</button></a>
            </div>
            <div class="col d-flex justify-content-end">
                <input type="hidden" name="payment" value="{{ $payment }}">
                <input type="hidden" name="delivery" value="{{ $delivery }}">
                <input type="hidden" name="total" value="{{ $total }}">
                <button type="submit" class="btn btn-success">Potvrdiť objednávku</button>
            </div>
        </div>
    </form>
    @endif


    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>