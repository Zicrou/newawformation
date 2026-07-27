@extends('base')

@section('title', 'Mon Panier')
@section('content')

    <div class="mx-10">
        
    @foreach($cart->items as $item)
        <div class="flex items-center gap-6 rounded-2xl bg-white p-6 shadow">

        <img
            src="{{ asset($item->cours->thumbnail) }}"
            class="h-28 w-40 rounded-xl object-cover">

        <div class="flex-1">

            <h3 class="text-xl font-bold">

                {{ $item->cours->title }}

            </h3>

            <p class="mt-2 text-gray-500">

                {{ Str::words(strip_tags($item->cours->description),15) }}


            </p>
            <button
            type="button"
            class="remove-cart-item rounded-lg bg-red-600 px-3 py-2 text-white transition hover:bg-red-700"
            data-id="{{ $item->id }}"
            data-url="{{ route('cart.item.destroy', $item) }}">

            🗑 Supprimer

        </button>

        </div>

        <div class="text-right">

            <p class="text-2xl font-bold text-indigo-700">

                {{ number_format($item->cours->price, thousands_separator:' ') }} FCFA

            </p>

        </div>

    </div>
    @endforeach
    </div>
    

@endsection