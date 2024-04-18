<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cukraren_test</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    @include('components.header')

    <div class="container-fluid shipping-phase d-flex col-12 mt-4 ">
        <div class="row">
            <div class="col-12 col-sm-auto cart d-flex align-items-center me-4 hidden-md-down">
                <div class="circle circle-active">
                    <b>1</b>
                </div>
                <div class="text ms-2"><b>Kosik</b></div>
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
            <div class="hidden-md-down mb-4">
                <div class="row product-donut-choco_glaze d-flex align-items-center">
                    <div class="product-name-img col-lg-4 col-md-4 col-sm-3 d-flex align-items-center">
                        <img class="img-fluid" src="./images/classic_sugar.jpg" alt="Choco glazed donut" width="90">
                        <div><b>Cukrový Donut</b></div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-3 ">
                        <div class="counter d-flex justify-content-center">
                            <button class="btn btn-outline-secondary">-</button>
                            <span class=" me-4 ms-4 " style="font-size: 24px">5</span>
                            <button class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 d-flex total-donut-price justify-content-end">
                        <b>3,69/4,45€</b>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger " id="delete-product"><b>X</b></button>

                    </div>
                </div>
            </div>

            <!-- div will appear on md-down-scaling -->
            <div class="hidden-md-up mb-4">
                <div class="row">
                    <div class="product-name-img col-12 d-flex align-items-center">
                        <img class="" src="./images/classic_sugar.jpg" alt="Choco glazed donut" width="" height="70">
                        <span><b>Cukrový Donut</b></span>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-4 counter d-flex justify-content-start">
                        <button class="btn btn-outline-secondary ">-</button>
                        <span class="ms-2 me-2" style="font-size: 24px">5</span>
                        <button class="btn btn-outline-secondary">+</button>
                    </div>

                    <span
                        class="col-4 total-donut-price d-flex justify-content-center align-items-center"><b>3,69/4,45€</b></span>
                    <div class="col-2 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger fluid" id="delete-product"><b>X</b></button>
                    </div>
                </div>
            </div>

            <div class=" hidden-md-down last-product">
                <div class="row product-donut-choco_glaze d-flex align-items-center">
                    <div class="product-name-img col-lg-4 col-md-4 col-sm-3 d-flex align-items-center">
                        <img class="img-fluid" src="./images/choco_glaze.jpg" alt="Choco glazed donut" width="90">
                        <div><b>Čokoládový Donut</b></div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-3 ">
                        <div class="counter d-flex justify-content-center">
                            <button class="btn btn-outline-secondary">-</button>
                            <span class=" me-4 ms-4 " style="font-size: 24px">1</span>
                            <button class="btn btn-outline-secondary">+</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 d-flex total-donut-price justify-content-end">
                        <b>0,74/0,89€</b>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger " id="delete-product"><b>X</b></button>

                    </div>
                </div>
            </div>

            <!-- div will appear on md-down-scaling -->
            <div class="hidden-md-up last-product">
                <div class="row">

                    <div class="product-name-img col-12 d-flex align-items-center">
                        <img class="" src="./images/choco_glaze.jpg" alt="Choco glazed donut" width="" height="70">
                        <span><b>Čokoládový Donut</b></span>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-4 counter d-flex justify-content-start">
                        <button class="btn btn-outline-secondary ">-</button>
                        <span class="ms-2 me-2" style="font-size: 24px">1</span>
                        <button class="btn btn-outline-secondary">+</button>
                    </div>

                    <span
                        class="col-4 total-donut-price d-flex justify-content-center align-items-center"><b>0,74/0,89€</b></span>
                    <div class="col-2 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger fluid" id="delete-product"><b>X</b></button>
                    </div>
                </div>
            </div>
            <div class="hidden-md-down mt-4 mb-2">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                    <span class="col-3 text-end">4,43/5,34€</span>
                </div>
            </div>

            <div class="hidden-md-up mt-4 mb-2">
                <div class="row d-flex justify-content-between">
                    <div class="col-4"></div>
                    <span class="col-4 text-center">4,43/5,34€</span>
                    <div class="col-2"></div>
                </div>
            </div>

        </div>


        <!-- <div class="price-sum">0,86€</div> -->

    </main>
    <div class="container-fluid d-flex mb-4">
        <div class="col-6 d-flex justify-content-left">
            <a href="{{ route('home') }}"><button type="button" class="btn btn-secondary">Spät</button></a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="{{ route('cart2') }}"><button type="button" class="btn btn-success">Pokračovať</button></a>
        </div>
    </div>

    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>