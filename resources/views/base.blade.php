<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    
    <title>@yield('title') | Cours </title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>

<body>
    @php
        $route = request()->route()->getName();
    @endphp

    @include('shared.nav')


    @yield('content')

 <div id="toast" class="fixed right-5 top-5 z-50 hidden translate-x-full rounded-xl bg-green-600 px-6 py-4 text-white shadow-xl transition duration-300">

    <div class="flex items-center gap-3">
        <span class="text-xl">✅</span>
        <span id="toast-message">
            Cours ajouté au panier
        </span>
    </div>

</div>
<x-footer />

</body>
</html>