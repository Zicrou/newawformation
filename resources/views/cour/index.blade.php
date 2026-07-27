@extends('base')

@section('title', 'Tous nos cours')

@section('content')

@include('shared.flash')

<x-course-search-hero />

<section class="mx-auto max-w-7xl px-6 py-16">

    <div class="mb-8 flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">

                Nos formations

            </h2>

            <p class="mt-2 text-gray-500">

                {{ $cours->total() }} formations trouvées

            </p>

        </div>

    </div>

    {{-- Les cartes arriveront ici --}}
    <section class="mx-auto max-w-7xl px-6 py-20">

        <div class="mb-10 flex items-center justify-between">

            <div>

                <h2 class="text-4xl font-bold">

                    Nos formations

                </h2>

                <p class="mt-2 text-gray-500">

                    {{ $cours->total() }} formations disponibles

                </p>

            </div>

        </div>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            @forelse($cours as $cour)

                <x-course-card :cour="$cour" />

            @empty

                <div class="col-span-full rounded-3xl border border-dashed border-gray-300 bg-gray-50 p-20 text-center">

                    <div class="text-6xl">

                        🔍

                    </div>

                    <h3 class="mt-6 text-3xl font-bold">

                        Aucun résultat

                    </h3>

                    <p class="mt-3 text-gray-500">

                        Essayez un autre mot-clé ou augmentez votre budget.

                    </p>

                </div>

            @endforelse

        </div>

        <div class="mt-16 flex justify-center">

            {{ $cours->links() }}

        </div>

    </section>
</section>

@endsection