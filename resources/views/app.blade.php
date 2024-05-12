<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.nav')
    
    @yield('content')

    @include('components.footer')
</body>

</html>