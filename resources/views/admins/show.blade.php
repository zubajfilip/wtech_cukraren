<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.adminNav')

    <h1>Detail Produktu: {{ $product->name }}</h1>
    <div class="jumbotron">
        <div class="h5">Názov</div>
        <p>
            {{ $product->name }} 
        </p>
        <div class="h5">Opis</div>
        <p>
            {{ $product->description }}
        </p>
        <div class="h5">Opis</div>
        <p>
            {{ $product->description }}
        </p>
    </div>

        

    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>


</html>