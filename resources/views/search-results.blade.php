<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
</head>

<body>
    @include('components.nav')
    <div class="container">
        <h1>Search Results</h1>

        @if (count($products) > 0)
            <ul>
                @foreach ($products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No products found for your search.</p>
        @endif

    </div>
    @include('components.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="donuts.js"></script>
</body>
</html>