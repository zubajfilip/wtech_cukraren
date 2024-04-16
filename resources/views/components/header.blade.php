<header class="header">
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('home') }}"><img class="img-fluid"
                    src="images/logo.png" width="140" height="100"></a>
            <div class="d-flex">

                <a class="nav-link ms-2 md-text hidden-md-up">🛒</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            



            <div class="col-8 collapse navbar-collapse justify-content-end">

                <form class="col d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success me-2" type="submit">Search</button>
                </form>
                <a> <button class="btn btn-primary">Login</button></a>

                <a class="nav-link ms-2 md-text">🛒</a>

            </div>
        </div>
    </nav>

    <!-- elements in this div are gonna be in the toggled navbar -->
    <div class="container-fluid collapse navbar-collapse hidden-md-up" id="navbarSupportedContent">
        
        <a><button class="col-12 btn btn-primary mb-2 justify-content-center">Login</button></a>
        
        <form class="col d-flex" role="search">
            <input class="form-control me-2 mb-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success mb-2" type="submit">Search</button>
        </form>
    </div>

</header>

 <!-- TODO: pridat href na kosiky a loginy ked budu endpointy rdy -->