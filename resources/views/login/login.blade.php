<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cukraren_test</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <main>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('home') }}">
                    <img class="img-fluid" src="../../../public/images/logo.png" width="150" height="190">
                </a>
            </div>

        </div>
        <div class="row mt-4">
            <div class="container col-md-7 col-sm-8 col-lg-6 col-10 justify-content-center">
                <form action="../../../public/index.html" method="post">
                    <div class="email mb-2">
                        <div class="label">
                            Email
                        </div>
                        <input class="form-control" required placeholder="example@gmail.com">
                    </div>
                    <div class="password mb-4">
                        <div class="label">
                            Heslo
                        </div>
                        <input type="password" class="form-control" id="password" name="password" required
                            placeholder="*********">
                        <div class="password-visibility">
                            <i class="fas fa-eye-slash" id="togglePassword"></i>
                        </div>
                    </div>


                    <div class="row d-flex">
                        <div class="col-6 regiter text-start">
                            <a href="{{ route('register') }}">
                                <p>Registrovať sa</p>
                            </a>
                        </div>
                        <div class="col-6 login text-end">
                            <button type="submit" class="btn btn-success">Prihlásiť sa</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </main>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>