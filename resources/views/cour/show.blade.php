@extends('base')

@section('title', Str::limit($cour->title, 20))

@section('content')

<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    {{-- Errors --}}
    @if ($errors->any())
        <div class="mb-8 rounded-lg border border-red-300 bg-red-50 p-4">
            <h3 class="mb-2 font-semibold text-red-700">
                Des erreurs sont survenues :
            </h3>

            <ul class="list-inside list-disc text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Main Content --}}
    <div class="grid gap-8 lg:grid-cols-3">

        {{-- Course --}}
        <div class="lg:col-span-2">

            <div class="overflow-hidden rounded-2xl bg-white shadow">

                <video
                    controls
                    class="aspect-video w-full">
                    <source src="{{ asset($cour->video) }}">
                </video>

                <div class="p-8">

                    <h1 class="mb-6 text-4xl font-bold text-indigo-600">
                        {{ $cour->title }}
                    </h1>

                    <div class="prose max-w-none">
                        {!! $cour->description !!}
                    </div>

                </div>

            </div>

        </div>

        {{-- Sidebar --}}
        <aside>

            {{-- Purchase Card --}}
            <div class="sticky top-6 rounded-2xl bg-white p-6 shadow">

                <div class="mb-6 text-center">

                    <p class="text-4xl font-bold text-indigo-600">
                        {{ number_format($cour->price, thousands_separator: ' ') }} £
                    </p>

                </div>

                <a
                    href="{{ route('stripe.checkout', ['cour' => $cour]) }}"
                    class="block w-full rounded-lg bg-indigo-600 py-3 text-center font-semibold text-white transition hover:bg-indigo-700">

                    Commander

                </a>

                <hr class="my-6">

                <div class="space-y-3 text-sm text-gray-600">

                    <div class="flex justify-between">
                        <span>Disponibilité</span>
                        <span class="font-semibold text-green-600">
                            Disponible
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Ajouté</span>
                        <span>{{ $cour->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Mis à jour</span>
                        <span>{{ $cour->updated_at->diffForHumans() }}</span>
                    </div>

                </div>

            </div>

        </aside>

    </div>

    {{-- Bottom Section --}}
    <div class="mt-12 grid gap-8 lg:grid-cols-3">

        {{-- Statistics --}}
        <div class="lg:col-span-2">

            <div class="rounded-2xl bg-white p-6 shadow">

                <h2 class="mb-6 text-2xl font-bold">
                    Informations du cours
                </h2>

                <table class="min-w-full">

                    <tbody class="divide-y divide-gray-200">

                        <tr>
                            <td class="py-3 font-medium text-gray-600">
                                Prix
                            </td>

                            <td class="py-3 text-right">
                                {{ number_format($cour->price, thousands_separator: ' ') }} £
                            </td>
                        </tr>

                        <tr>
                            <td class="py-3 font-medium text-gray-600">
                                Dernière mise à jour
                            </td>

                            <td class="py-3 text-right">
                                {{ $cour->updated_at->format('d/m/Y') }}
                            </td>
                        </tr>

                        <tr>
                            <td class="py-3 font-medium text-gray-600">
                                Disponibilité
                            </td>

                            <td class="py-3 text-right">
                                {{ $cour->disponible ? 'Oui' : 'Non' }}
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Tags --}}
        <div>

            <div class="rounded-2xl bg-white p-6 shadow">

                <h2 class="mb-5 text-2xl font-bold">
                    Tags
                </h2>

                <div class="flex flex-wrap gap-2">

                    @forelse($cour->tags as $tag)

                        <span
                            class="rounded-full bg-indigo-100 px-4 py-2 text-sm font-medium text-indigo-700">

                            {{ $tag->name }}

                        </span>

                    @empty

                        <p class="text-gray-500">
                            Aucun tag.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

@endsection