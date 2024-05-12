
@extends('app')

@section('content')
    <main>
        <div class="container-fluid products">
            <div class="product-category">
                <h2 class="row justify-content-center">Kategórie produktov</h2>
                <div class="row img-scroller justify-content-between products-spacing">
                    <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                        <img src="./storage/images/cake.jpg" alt="Kolace" class="img-fluid" width="199" height="150">
                        <p class="text-center">Koláče</p>
                    </div>
                    <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                        <img src="./storage/images/zakusok.jpg" alt="Zakusky" class="img-fluid" width="199"
                            height="150">
                        <p class="text-center">Zákusky</p>
                    </div>
                    <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                        <img src="./storage/images/bonbons.jpg" alt="Bonboniery" class="img-fluid" width="199"
                            height="150">
                        <p class="text-center">Bonboniery</p>
                    </div>
                    <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                        <a href="/donuts">
                            <img src="./storage/images/donuts.jpg" alt="Donuty" class="img-fluid" width="199"
                                height="150">
                            <p class="text-center">Donuty</p>
                        </a>
                    </div>
                </div>
            </div>


            <div class="product-category mt-10">
                <h2 class="row justify-content-center">Najnovšie produkty</h2>
                <div class="row img-scroller justify-content-evenly products-spacing">
                    <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                        <img src="./storage/images/makronky.jpg" alt="Makrony" class="img-fluid" width="199"
                            height="150">
                        <p class="text-center">Makróny</p>
                    </div>
                    <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                        <img src="./storage/images/kosicky.jpg" alt="Kosicky" class="img-fluid" width="199"
                            height="150">
                        <p class="text-center">Košíčky</p>
                    </div>
                    <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                        <img src="./storage/images/ranajky.jpg" alt="Ranajkovy catering" class="img-fluid" width="199"
                            height="150">
                        <p class="text-center">Raňajkový catering</p>
                    </div>
                    <div class="col-md-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product">
                        <img src="./storage/images/torta.jpg" alt="Torty" class="img-fluid" width="199" height="150">
                        <p class="text-center">Torty</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
