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

    <!-- elements in this div are gonna be in the toggled navbar -->
    <div class="container-fluid collapse navbar-collapse hidden-md-up" id="navbarSupportedContent">
        
        <a href="../src/pages/login/login.html"><button class="col-12 btn btn-primary mb-2 justify-content-center">Login</button></a>
        
        <form class="col d-flex" role="search">
            <input class="form-control me-2 mb-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success mb-2" type="submit">Search</button>
        </form>

    </div>


    <div class="container-fluid products">
        <div class="product-category">
            <h2 class="row justify-content-center">Kategórie produktov</h2>
            <div class="row img-scroller justify-content-between products-spacing">
                <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                    <img src="./images/cake.jpg" alt="Kolace" class="img-fluid" width="199" height="150">
                    <p class="text-center">Koláče</p>
                </div>
                <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                    <img src="./images/zakusok.jpg" alt="Zakusky" class="img-fluid" width="199" height="150">
                    <p class="text-center">Zákusky</p>
                </div>
                <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                    <img src="./images/bonbons.jpg" alt="Bonboniery" class="img-fluid" width="199" height="150">
                    <p class="text-center">Bonboniery</p>
                </div>
                <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                    <a href="{{ route('donuts') }}">
                        <img src="./images/donuts.jpg" alt="Donuty" class="img-fluid" width="199" height="150">
                        <p class="text-center">Donuty</p>
                    </a>
                </div>
            </div>
        </div>


        <div class="product-category mt-10">
            <h2 class="row justify-content-center">Najnovšie produkty</h2>
            <div class="row img-scroller justify-content-evenly products-spacing">
                <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                    <img src="./images/makronky.jpg" alt="Makrony" class="img-fluid" width="199" height="150">
                    <p class="text-center">Makróny</p>
                </div>
                <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                    <img src="./images/kosicky.jpg" alt="Kosicky" class="img-fluid" width="199" height="150">
                    <p class="text-center">Košíčky</p>
                </div>
                <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                    <img src="./images/ranajky.jpg" alt="Ranajkovy catering" class="img-fluid" width="199" height="150">
                    <p class="text-center">Raňajkový catering</p>
                </div>
                <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                    <img src="./images/torta.jpg" alt="Torty" class="img-fluid" width="199" height="150">
                    <p class="text-center">Torty</p>
                </div>
            </div>
        </div>
    </div>

    
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>


</html>