
@extends('admin.admin')

@section('title', $tag->exists ? 'Éditer un tag' : 'Créer un tag')

@section('content')
<div class="py-10">
    <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">

        <div class="overflow-hidden bg-white shadow-sm rounded-xl dark:bg-gray-800">

            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    @yield('title')
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ $tag->exists ? 'Modifiez les informations du tag.' : 'Créez un nouveau tag.' }}
                </p>
            </div>

            <form
                action="{{ route($tag->exists ? 'admin.tag.update' : 'admin.tag.store', $tag) }}"
                method="POST"
                class="space-y-6 p-6">

                @csrf
                @method($tag->exists ? 'PUT' : 'POST')

                <div>
                    <label
                        for="name"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nom
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $tag->name) }}"
                        placeholder="Ex : Laravel, Flutter..."

                        class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                               focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500
                               dark:border-gray-600 dark:bg-gray-700 dark:text-white
                               dark:focus:border-indigo-500
                               @error('name') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">

                    <a
                        href="{{ route('admin.tag.index') }}"
                        class="rounded-lg border border-gray-300 px-5 py-2.5 text-gray-700 transition hover:bg-gray-100
                               dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                        Annuler
                    </a>

                    <button
                        type="submit"
                        class="rounded-lg bg-indigo-600 px-6 py-2.5 font-semibold text-white shadow
                               transition hover:bg-indigo-700 focus:outline-none focus:ring-2
                               focus:ring-indigo-500 focus:ring-offset-2">

                        {{ $tag->exists ? 'Mettre à jour' : 'Créer le tag' }}
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>
@endsection
