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
</body>


</html>