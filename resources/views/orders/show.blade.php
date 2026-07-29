@extends('base')

@section('title','Résumé commande')


@section('content')

<div class="mx-10">

    <div class="rounded-3xl bg-white p-8 shadow">


        <h1 class="text-3xl font-bold">
            Résumé de votre commande
        </h1>


        <div class="mt-8 space-y-5">


            @foreach($order->items as $item)

            <div class="flex items-center gap-5 border-b pb-5">


                <img
                src="{{ asset($item->cours->thumbnail) }}"
                class="h-20 w-32 rounded-xl object-cover">


                <div class="flex-1">

                    <h3 class="font-bold text-xl">

                        {{ $item->cours->title }}

                    </h3>


                </div>


                <div class="font-bold">

                    {{ number_format($item->price,2,',',' ') }}
                    €

                </div>


            </div>


            @endforeach


        </div>

        <div class="mt-8 flex items-end justify-between">

            <form method="POST" action="{{ route('orders.store') }}">
                @csrf

                <button
                    type="submit"
                    class="rounded-xl bg-indigo-600 px-8 py-4 text-white hover:bg-indigo-700">
                    Procéder au paiement
                </button>
            </form>

            <a
                href="{{ route('orders.annulation', ['order' => $order]) }}"
                class="rounded-xl bg-gray-500 px-8 py-4 text-white hover:bg-gray-600">
                Annuler
            </a>

        </div>

    </div>

</div>


@endsection