<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Market APP' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <x-menu />

    {{-- - Content - --}}
    <main id="app">
        <div class="container mt-5 ">
            <x-alerts />
        </div>
        {{ $slot }}
    </main>
</body>

<hr/>
<footer class="text-center text-light">
    <!-- Grid container -->
    <div class="container pt-2">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.facebook.com/Brandonpalacioalvarez791/" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

            <!-- Google -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://myaccount.google.com/" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

            <!-- Instagram -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/brandonpalacioa01/" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

            <!-- Github -->
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://github.com/Brandddd" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-dark" href="https://www.accedotechnologies.com/">Accedo Technologies</a>
    </div>
    <!-- Copyright -->
</footer>

</html>
