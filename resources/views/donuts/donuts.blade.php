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


    <main>

        <div class="container-fluid products">
            <nav class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('home') }}">Domov</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Donuty</li>
                </ol>
            </nav>
            
                <div class="col d-flex justify-content-end md-text me-4">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                        aria-expanded="false" aria-label="Toggle navigation">
                        🔧
                    </button>
                </div>
                <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                    <form>
                        <div class="form-group">
                            <label for="priceFrom">Cena od (€)</label>
                            
                            <input type="number" class="form-control" id="priceFrom" placeholder="Zadajte minimálnu cenu">
                        </div>
                        <div class="form-group">
                            <label for="priceTo">Cena do (€)</label>
                            <input type="number" class="form-control" id="priceTo" placeholder="Zadajte maximálnu cenu">
                        </div>
                        <div class="form-group">
                            <label for="sortBy">Zoradenie</label>
                            <select class="form-control" id="sortBy">
                                <option>Od najlacnejšieho</option>
                                <option>Od najdrahšieho</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="withToppings">
                            <label class="form-check-label" for="withToppings">S posypkou</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="withoutToppings">
                            <label class="form-check-label" for="withToppings">Bez posypkou</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="stuffed">
                            <label class="form-check-label" for="stuffed">Plnené</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="unstuffed">
                            <label class="form-check-label" for="unstuffed">Neplnené</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrovať</button>
                    </form>
                </div>
            </div>


            <div class="row ">
                <div
                    class="col-md-4 col-sm-6 d-flex flex-column align-items-center justify-content-end product text-center">
                    <a href="./detail_page_chocodonut.html">
                        <img src="./images/choco_glaze.jpg" alt="Chocolate glazed donut" width="190" height="150"
                            class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>Čokoládový Donut</p>
                        <p class="price">0,89€/ks</p>
                    </div>
                    <button id="1" type="button" class="btn btn-secondary buy-button">Objednať</button>
                </div>
                <div
                    class="col-md-4 col-sm-6 d-flex flex-column align-items-center justify-content-end product text-center">
                    <a href="#">
                        <img src="./images/choco_sprinkle.jpg" alt="Chocolate sprinkled glazed donut" width="190"
                            height="150" class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>Čokoládový Posýpaný Donut</p>
                        <p class="price">0,89€/ks</p>
                    </div>
                    <button id="2" type="button" class="btn btn-secondary buy-button">Objednať</button>
                </div>
                <div
                    class="col-md-4 col-sm-6 d-flex flex-column align-items-center justify-content-end product text-center">
                    <a href="#">
                        <img src="./images/classic_glazed.jpg" alt="Classic glazed donut" width="190" height="150"
                            class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>Klasický Glazúrový Donut</p>
                        <p class="price">0,89€/ks</p>
                    </div>
                    <button id="3" type="button" class="btn btn-secondary buy-button">Objednať</button>
                </div>
                <div
                    class="col-md-4 col-sm-6 d-flex flex-column align-items-center justify-content-end product text-center">
                    <a href="#">
                        <img src="./images/classic_sugar.jpg" alt="Classic sugar donut" width="190" height="150"
                            class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>Cukrový Donut</p>
                        <p class="price">0,89€/ks</p>
                    </div>
                    <button id="4" type="button" class="btn btn-secondary buy-button">Objednať</button>
                </div>
                <div
                    class="col-md-4 col-sm-6 d-flex flex-column align-items-center justify-content-end product text-center">
                    <a href="#">
                        <img src="./images/blue_sprinkle.jpg" alt="Donut with Blue toping and sprinlkes" width="190"
                            height="150" class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>Modrý Posýpaný Donut</p>
                        <p class="price">0,89€/ks</p>
                    </div>
                    <button id="5" type="button" class="btn btn-secondary buy-button">Objednať</button>
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="donuts.js"></script>
</body>

</html>