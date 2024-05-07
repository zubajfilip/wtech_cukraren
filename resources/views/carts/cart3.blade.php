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

        .delivery-data {
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


        }

        @media(min-width: 767.5px) {
            .hidden-md-down {
                display: block;
            }
        }



        .lable {
            margin-bottom: 3px;
            padding-left: 3px;
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

            .hidden-sm-up {
                display: block;
            }

            .delivery-data {
                /* padding-bottom: 5px; */
                border-right: none;
            }
        }

        @media(min-width: 575.5px) {
            .hidden-sm-up {
                display: none;
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

    <form action="#" method="post">

        <main class="container-fluid ">

            <div class="main-section">

                <div class="row main-indent mt-4">

                    <div class="col-12 col-sm-7 col-md-7 col-lg-7 delivery-data mb-4">
                        <div class="col-12">
                            <input type="radio" id="saved-info" value="saved-info" name="saved-info" disabled>
                            <label for="saved-info">Dodať na uloženú adresu</label>
                        </div>
                        <div class="col-12">
                            <input type="radio" id="add-info" value="add-info" name="saved-info" checked>
                            <label for="add-info">Zadať dodacie údaje</label>
                        </div>
                        <div class="state mb-3">
                            <div class="state lable ">
                                Štát
                            </div>
                            <input class="form-control" disabled placeholder="Slovensko">
                        </div>
                        <div class="city mb-3">
                            <div class="city lable">
                                Mesto
                            </div>
                            <input class="form-control" required placeholder="Mesto" maxlength="50">
                        </div>
                        <div class="adress mb-3">
                            <div class="adress lable">
                                Ulica a číslo domu
                            </div>
                            <input class="form-control" required placeholder="Ulica a číslo domu" maxlength="255">
                        </div>
                        <div class="PSC mb-3">
                            <div class="psc lable">
                                PSČ
                            </div>
                            <input class="form-control" required placeholder="972 45" maxlength="6">
                        </div>
                        <div class="email-adress mb-3">
                            <div class="email lable">
                                E-mail
                            </div>
                            <input class="form-control" required placeholder="mail@gmail.com" maxlength="255">
                        </div>
                        <div class="phone-number mb-3">
                            <div class="phone lable">
                                Telefónne číslo
                            </div>
                            <input class="form-control" required placeholder="+421 9xx xxx xxx" maxlength="13">
                        </div>
                    </div>


                    <div class="col-sm-5 col-md-5 col-lg-5 col-12 shipping-cart-products">
                        <div class="mb-1 d-flex justify-content-between align-items-center product-donut-choco_glaze">
                            <img src="./images/classic_sugar.jpg" alt="Choco glazed donut" width="60">

                            <span class="hidden-sm-up">Cukrový Donut</span>
                            <span class="piece-price text-end">5 ks / 4,45€</span>

                        </div>

                        <div
                            class="mb-1 last-product d-flex justify-content-between align-items-center product-donut-choco_glaze">
                            <img src="./images/choco_glaze.jpg" alt="Choco glazed donut" width="70">

                            <span class="hidden-sm-up">Čokoládový Donut</span>
                            <span class="piece-price text-end">1 ks / 0,89€</span>

                        </div>

                        <div class="selected-options ">
                            <div class="col-12 d-flex selected-delivery">
                                <div class="col-6">
                                    <p>Doprava</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>+1,30€</p>
                                </div>

                            </div>
                            <div class="col-12 d-flex selected-payment last-product">
                                <div class="col-6">
                                    <p>Platba</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>+0,00€</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex sum mt-auto">
                            <span class="col-6">Spolu</span>
                            <span class="col-6 text-end">6,64€</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <a href="cart_1.html"><button>Spät</button></a>
        <a href="cart_2.html"><button>Pokračovať</button></a> -->
        </main>
        <div class="container-fluid d-flex mb-4 mt-2">
            <div class="col-3 d-flex justify-content-left">
                <a href="/cart2"><button type="button" class="btn btn-secondary">Spät</button></a>
            </div>
            <div class="col d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Potvrdiť objednávku</button>
            </div>
        </div>
    </form>


    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>