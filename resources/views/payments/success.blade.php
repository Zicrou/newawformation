@extends('base')

@section('title', 'Paiement')

@section('content')

<div class="mx-auto max-w-2xl py-20">

    <div class="rounded-3xl bg-white p-12 text-center shadow-xl">

        <div id="loading">

            <div class="mb-6 text-7xl">
                ⏳
            </div>

            <h1 class="text-3xl font-bold">
                Vérification du paiement...
            </h1>

            <p class="mt-4 text-gray-500">
                Nous confirmons votre paiement auprès de Stripe.
            </p>

        </div>


        <div id="success" class="hidden">

            <div class="mb-6 text-7xl">
                🎉
            </div>

            <h1 class="text-3xl font-bold text-green-600">
                Paiement confirmé !
            </h1>

            <p class="mt-4 text-gray-500">
                Vos formations sont maintenant disponibles.
            </p>


            <a
                href="{{ route('dashboard') }}"
                class="mt-8 inline-block rounded-xl bg-indigo-600 px-8 py-4 text-white">

                Accéder à mes formations

            </a>

        </div>


    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', () => {

    const interval = setInterval(async () => {

        const response = await fetch(
            "{{ route('orders.status', $order) }}"
        );

        const data = await response.json();


        console.log(data);


        if(data.status === 'paid') {

            clearInterval(interval);


            document
                .getElementById('loading')
                .classList.add('hidden');


            document
                .getElementById('success')
                .classList.remove('hidden');

        }


    }, 2000);


});

</script>

@endsection