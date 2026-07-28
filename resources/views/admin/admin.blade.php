<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Administration</title>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
</head>

<body class="min-h-screen bg-gray-100">
    
    @php
        $route = request()->route()->getName();
    
         $cart = auth()->user()
            ->cart()
            ->with('items.cours')
            ->first();
            $cartCount = $cart?->items->count() ?? 0;

    @endphp


@include('shared.nav')

<!-- Main -->
<main class="mx-auto mt-8 max-w-7xl px-6">
    
    @include('shared.flash')
    
    @yield('content')
    
</main>

<x-footer />
</body>

</html>