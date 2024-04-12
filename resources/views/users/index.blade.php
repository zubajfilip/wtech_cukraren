<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cukraren_test</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index_styles.css') }}">

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


    ZEC MI KOK
    
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>


</html>