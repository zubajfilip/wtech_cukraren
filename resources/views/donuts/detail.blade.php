<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')

</head>

<body>
    @include('components.nav')

    <main class="container-fluid">
        <div class="container-fluid product">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Domov</a></li>
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
                    <img src="{{ asset('storage/' . $product->imagePath) }}" alt="{{ $product->name }}" class="img-fluid" width="190"
                        height="150">
                </div>
                <div class="price">
                    <p>{{$product->price}}€/ks</p>
                </div>
                <div class="row buy-section d-flex justify-content-between">
                    <div class="col-md-6 col-12 counter d-flex justify-content-center align-items-center">
                        <button class="btn btn-outline-secondary decrement-button">-</button>
                        <span class=" me-4 ms-4 " style="font-size: 24px">0</span>
                        <button class="btn btn-outline-secondary increment-button">+</button>
                    </div>
                    <div class="col-md-6 col-12">
                        <button id="1" type="button" class="btn btn-secondary buy-button text">Pridať do Košíka</button>
                    </div>
                    <!-- <button id="product_id" type="button" class="btn btn-secondary">Objednať</button> -->
                </div>

                <div class="mt-4 mb-4">
                    <div class="container-fluid details text-center donut-product-outline">

                        <h3 class="text-center">Detaily</h3>
                        @foreach ($details as $detail)
                            <p>{{$detail}}</p>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </main>
    <div class="container-fluid mt-4">
        <div class="Suggestions text-center">
            <h3>Ostatní tiež objednávajú</h3>
            <!-- pridat sem ostatne produkty -->
            <div class="row d-flex justify-content-center ">
                <div
                    class="col-md-4 col-sm-6 col-12 d-flex flex-column align-items-center justify-content-end product text-center">
                    <a href="#">
                        <img src="./images/choco_sprinkle.jpg" alt="Chocolate sprinkled glazed donut" width="150"
                            class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>Čokoládový Posýpaný Donut</p>
                        <p class="price">0,89€/ks</p>
                    </div>
                </div>

                <div
                    class="col-md-4 col-sm-6 col-12 d-flex flex-column align-items-center justify-content-end product text-center">

                    <a href="#">
                        <img src="./images/classic_glazed.jpg" alt="Classic glazed donut" width="150" class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>Klasický Glazúrový Donut</p>
                        <p class="price">0,89€/ks</p>
                    </div>
                </div>

                <div
                    class="col-md-4 col-sm-6 col-12 d-flex flex-column align-items-center justify-content-end product text-center">

                    <a href="#">
                        <img src="./images/classic_sugar.jpg" alt="Classic sugar donut" width="150" class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>Cukrový Donut</p>
                        <p class="price">0,89€/ks</p>
                    </div>
                </div>



            </div>
        </div>
    </div>


    @include('components.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="detail_donuts.js"></script>
</body>

</html>