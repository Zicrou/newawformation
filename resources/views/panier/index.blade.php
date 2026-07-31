@extends('base')

@section('title', 'Mon Panier')

@section('content')
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <div 
            class="mx-10 {{ ($cart?->items->count() ?? 0) == 0 ? 'hidden' : '' }}" 
            id="card-container"
            data-cartcount="{{ $cart?->items->count() ?? 0 }}">

        <div class="overflow-hidden rounded-2xl bg-white shadow">

            <table class="w-full text-left">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-4">
                            <input 
                                type="checkbox" 
                                id="select-all"
                                class="h-5 w-5 rounded">
                        </th>
                        

                        <th class="px-6 py-4">
                            Cours
                        </th>

                        <th class="px-6 py-4">
                            Prix
                        </th>

                        <th class="px-6 py-4 text-center">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($cart->items as $item)

                    <tr 
                        class="border-b"
                        id="cart-item-{{ $item->id }}"
                    >

                        {{-- Checkbox sélection --}}
                        <td class="px-6 py-4">

                            <input
                                type="checkbox"
                                class="item-checkbox cart-item-checkbox h-5 w-5 rounded"
                                data-id="{{ $item->id }}"
                                data-price="{{ $item->cours->price }}"
                                data-title="{{ $item->cours->title }}"
                                value="{{ $item->id }}"
                                name="items[]"
                            >

                            @error('items')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </td>


                        {{-- Informations cours --}}
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-4">

                                <img
                                    src="{{ asset('storage/' .$item->cours->thumbnail) }}"
                                    class="h-20 w-32 rounded-xl object-cover"
                                >

                                <div>

                                    <h3 class="font-bold text-lg">
                                        {{ $item->cours->title }}
                                    </h3>


                                    <p class="text-gray-500 text-sm">

                                        {{ Str::words(strip_tags($item->cours->description),15) }}

                                    </p>

                                </div>

                            </div>

                        </td>


                        {{-- Prix --}}
                        <td class="px-6 py-4">

                            <span class="font-bold text-indigo-700">

                                {{ number_format($item->cours->price, 2, ',', ' ') }}
                                €

                            </span>

                        </td>


                        {{-- Action --}}
                        <td class="px-6 py-4 text-center">

                            <button
                                type="button"
                                class="remove-cart-item rounded-lg bg-red-600 px-3 py-2 text-white hover:bg-red-700"
                                data-id="{{ $item->id }}"
                                data-url="{{ route('cart.item.destroy', $item) }}"
                            >

                                🗑 Supprimer

                            </button>

                        </td>


                    </tr>

                    @endforeach


                </tbody>

            </table>


        </div>


        {{-- Total --}}
        <div class="mt-6 flex justify-end">

            <div class="rounded-xl bg-white p-6 shadow">
                    
                    <div id="selected-items" name="items[]"></div>
                    @error('items')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <button 
                        type="submit"
                        class="mt-6 rounded-xl bg-indigo-600 px-6 py-3 text-white">
                        Continuer la commande
                    </button>

                    
                    
                </div>
                
            </div>
        </form>


    </div>



    {{-- Panier vide --}}

    <div 
        id="empty-cart" 
        class="{{ ($cart?->items->count() ?? 0) > 0 ? 'hidden' : '' }} rounded-3xl bg-white p-16 text-center shadow-xl"
    >

        <div class="mb-5 text-8xl">
            🛒
        </div>


        <h2 class="text-3xl font-bold">
            Votre panier est vide
        </h2>


        <p class="mt-3 text-gray-500">
            Ajoutez des formations pour commencer votre apprentissage.
        </p>


        <a
            href="{{ route('cour.index') }}"
            class="mt-8 inline-block rounded-xl bg-indigo-600 px-8 py-4 font-semibold text-white hover:bg-indigo-700"
        >

            Explorer les formations

        </a>


    </div>


@endsection