@extends('base')

@section('title', 'Mon Panier')
@section('content')

    <div class="mx-10 {{ ($cart?->items->count() ?? 0) == 0 ? 'hidden' : ''}}" id="card-container" data-cartcount = "{{ $cart->items->count() ?? 0 }}">
        @foreach($cart->items as $item)
            <div class="flex items-center gap-6 rounded-2xl bg-white p-6 shadow" id="cart-item-{{ $item->id }}">

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
                    <button type="button" class="remove-cart-item rounded-lg bg-red-600 px-3 py-2 text-white hover:bg-red-700" data-id="{{ $item->id }}" data-url="{{ route('cart.item.destroy', $item) }}">

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
    
    <div id="empty-cart" class="{{ ($cart?->items->count() ?? 0) > 0 ? 'hidden' : '' }} rounded-3xl bg-white p-16 text-center shadow-xl">

        <div class="mb-5 text-8xl">🛒</div>

        <h2 class="text-3xl font-bold">
            Votre panier est vide
        </h2>

        <p class="mt-3 text-gray-500">
            Ajoutez des formations pour commencer votre apprentissage.
        </p>

        <a
            href="{{ route('cour.index') }}"
            class="mt-8 inline-block rounded-xl bg-indigo-600 px-8 py-4 font-semibold text-white hover:bg-indigo-700">

            Explorer les formations

        </a>

    </div>

@endsection