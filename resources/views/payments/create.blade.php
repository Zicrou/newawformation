@extends('base')

@section('title','Résumé commande')


@section('content')

    <div class="mx-10">

        <div class="rounded-3xl bg-white p-8 shadow">

            <form method="POST"
            action="{{ route('payments.store',$order) }}">

                @csrf

                <button class="rounded-xl bg-indigo-600 px-8 py-4 text-white">

                    Payer avec Stripe

                </button>


            </form>

        </div>

    </div>
@endsection