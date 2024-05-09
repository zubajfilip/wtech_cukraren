<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.nav')

    <main>
        <div class="container-fluid products">
            <nav class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="/home">Domov</a></li>
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
                    <form action="{{ route('product_filter') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="priceFrom">Cena od (€)</label>

                            <input type="number" class="form-control" name="priceFrom"
                                placeholder="Zadajte minimálnu cenu">
                        </div>
                        <div class="form-group">
                            <label for="priceTo">Cena do (€)</label>
                            <input type="number" class="form-control" name="priceTo" placeholder="Zadajte maximálnu cenu">
                        </div>
                        <div class="form-group">
                            <label for="sortBy">Zoradenie</label>
                            <select class="form-control" id="sortBy" name="sortBy">
                                <option value="Od najlacnejšieho">Od najlacnejšieho</option>
                                <option value="Od najdrahšieho">Od najdrahšieho</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="withToppings" value="posýpaný">
                            <label class="form-check-label" for="withToppings">S posypkou</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="withoutToppings" value="neposýpaný">
                            <label class="form-check-label" for="withoutToppings">Bez posypkou</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="stuffed" value="plnený">
                            <label class="form-check-label" for="stuffed">Plnené</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="unstuffed" value="neplnený">
                            <label class="form-check-label" for="unstuffed">Neplnené</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrovať</button>
                    </form>
                </div>
            </div>


            <div class="row d-flex justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-4 col-sm-6 d-flex flex-column align-items-center justify-content-end product text-center">
                    <a href="{{ route('donuts.show', $product->id) }}">
                        <img src="{{ asset('storage/' . $product->imagePath) }}" alt="{{ $product->name }}" width="190" height="150" class="img-fluid">
                    </a>
                    <div class="name-price">
                        <p>{{ $product->name }}</p>
                        <p class="price">{{ $product->price }}€/ks</p>
                    </div>

                    @php
                        $shoppingCart = $user->shoppingCart;
                        $cartItem = $shoppingCart ? $shoppingCart->items->where('productId', $product->id)->first() : null;
                        $quantity = $cartItem ? $cartItem->quantity : 0;
                    @endphp

                    @if ($user && $quantity > 0)
                        <div class="d-flex counter-container align-items-center">
                            <form action="{{ route('decrease_product_quantity') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" name="decrease_button" class="btn btn-secondary">-</button>
                            </form>
                            <span style="margin-right: 10px; margin-left: 10px;">{{ $quantity }}</span>
                            <form action="{{ route('increase_product_quantity') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" name="increase_button" class="btn btn-secondary">+</button>
                            </form>
                        </div>
                    @else
                        <form action="{{ route('purchase') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input id="quantity" type="hidden" name="quantity" value="1">

                            <button type="submit" name="buy_button" class="btn btn-secondary buy-button">Objednať</button>
                        </form>
                    @endif
                </div>
            @endforeach
            </div>
        </div>
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>