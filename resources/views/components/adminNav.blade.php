<header>

    <nav class="navbar navbar-expand-md bg-body-tertiary">
        <div class="container-fluid">

            <a class="navbar-brand" href="/admins"><img class="img-fluid" src="../storage/images/logo.png" width="140"
                    height="100"></a>
            <div class="d-flex">

                <a class="nav-link ms-2 md-text hidden-md-up" href="#">👑</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>




            <div class="col-8 collapse navbar-collapse justify-content-end">

                <form class="col d-flex" action="{{ route('searchadmin') }}" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search">
                    <button class="btn btn-outline-success me-2" type="submit">Search</button>
                </form>
                <!-- <a href="{{ url('/profile') }}">  -->
                    <button class="btn btn-primary">Admin Rozhranie 👑</button>
                <!-- </a> -->


            </div>
        </div>
    </nav>

    <!-- elements in this div are gonna be in the toggled navbar -->
    <div class="container-fluid collapse navbar-collapse hidden-md-up" id="navbarSupportedContent">

        <a href="/admins"><button class="col-12 btn btn-primary mb-2 justify-content-center">Admin
                Rozhranie 👑</button></a>

        <form class="col d-flex" role="search">
            <input class="form-control me-2 mb-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success mb-2" type="submit">Search</button>
        </form>

    </div>

</header>