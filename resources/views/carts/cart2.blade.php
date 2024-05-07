<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')

</head>

<body>
    <!-- <style>
        .products-spacing {
            margin-bottom: 50px;
            /* Adjust the value for desired spacing */
        }

        @media (min-width: 767.5px) {
            .md-text {
                font-size: 40px;
            }

            .hidden-md-up {
                display: none;
            }

        }

        .last-product {
            /* padding: 20px; */
            padding-bottom: 5px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.4);
            /* border-radius: 10%; */
        }

        .delivery-pay-selection {
            /* padding-bottom: 5px; */
            border-right: 1px solid rgba(0, 0, 0, 0.4);
        }

        h2.row {
            margin-bottom: 60px;
            margin-top: 30px;
        }

        @media(max-width: 767.5px) {
            .md-margin-bot {
                margin-bottom: 10px;
            }

            .hidden-md-up {
                display: block;
            }

            .md-text {
                font-size: 40px;
            }
        }

        .footer {
            height: 200px;
        }

        .col-md-4.col-sm-6 {
            object-fit: cover;
        }

        .product {
            margin-bottom: 15px;
        }

        .price {
            font-weight: bold;
        }

        @media(max-width: 767.5px) {
            .hidden-md-down {
                display: none;
            }

            .delivery-pay-selection {
                /* padding-bottom: 5px; */
                border-right: none;
            }
        }

        @media(min-width: 767.5px) {
            .hidden-md-down {
                display: block;
            }
        }

        .circle {
            border: 1px solid black;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle-active {
            border: 2px solid black;
        }

        @media(max-width: 575.5px) {
            .circle {
                width: 30px;
                height: 30px;
            }

            .circle-active {
                width: 40px;
                height: 40px;
            }
        }

        .line {
            width: 60px;
            height: 4px;
            background-color: rgb(0, 0, 0, 0.5);
        }

        .line-active {
            background-color: black;
        }

        .main-section {
            padding-left: 5%;
            padding-right: 5%;
            border: 1px solid black;
            border-radius: 20px;
        }

        .contact-info {
            border-left: 1px solid rgb(100, 100, 100);

            padding-left: 15px;
        }

        .line-under {
            border-bottom: 1px solid rgb(100, 100, 100);
        }
    </style> -->


    @include('components.nav')


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
    <form action="./cart_3.html" method="post">
        <main class="container-fluid mb-4 mt-4">
            <div class="main-section">
                <div class="row main-indent mt-4">
                    <div class="col-sm-12 col-md-6 col-lg-6  delivery-pay-selection mb-4">
                        <div class="delivery-options">
                            <p><b>Doprava</b></p>
                            <div class="row justify-content-between">
                                <div class="col-9">
                                    <input type="radio" id="osobny" value="Osobny_Odber" name="delivery" disabled>
                                    <label for="osobny">🚶Osobný Odber</label>
                                </div>

                                <div class="col-3 priplatok text-end">
                                    <p>+0,00</p>
                                </div>
                            </div>
                            <div>
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <input type="radio" id="kurier" value="Kurier" name="delivery" checked>
                                        <label for="kurier">🚚Kurier</label>
                                    </div>
                                    <div class="col-3 priplatok text-end">
                                        <p>+1,30</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-options">
                            <p><b>Platba</b></p>
                            <div class="row justify-content-between">
                                <div class="col-9">
                                    <input type="radio" id="apple" value="apple_pay" name="payment" disabled>
                                    <label for="apple">🍎Apple pay</label>
                                </div>

                                <div class="col-3 priplatok text-end">
                                    <p>+0,00</p>
                                </div>
                            </div>
                            <div>
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <input type="radio" id="karta" value="debet_card" name="payment" checked>
                                        <label for="karta">💳Platobná Karta</label>
                                    </div>
                                    <div class="col-3 priplatok text-end">
                                        <p>+0,00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 shipping-cart-products">
                        <div class="mb-1 d-flex justify-content-between align-items-center product-donut-choco_glaze">
                            <img src="./images/classic_sugar.jpg" alt="Classic sugar donut" width="67">
                            <span class="hidden-md-up">Cukrový Donut</span>
                            <span class="ms-1 piece-price text-end">5 ks / 4,45€</span>
                        </div>
                        <div
                            class="mb-1 last-product d-flex justify-content-between align-items-center product-donut-choco_glaze">
                            <img src="./images/choco_glaze.jpg" alt="Choco glazed donut" width="80">
                            <span class="hidden-md-up">Čokoládový Donut</span>
                            <span class="ms-1 piece-price text-end">1 ks / 0,89€</span>
                        </div>

                        <div class="selected-options">

                            <div class="col-12 d-flex selected-delivery mt-2">
                                <span class="col-4">Doprava</span>
                                <span class="col-8 text-end price-delivery"> 🚚Kurier +1,30€ </span>
                            </div>

                            <div class="col-12 d-flex selected-payment last-product mt-2 mb">
                                <span class="col-4">Platba</span>
                                <span class="col-8 text-end price-payment">💳Platobná Karta +0,00€</span>
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


    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="cart2_controller.js"></script>
</body>

</html>