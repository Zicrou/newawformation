@extends('admin.admin')

@section('title', 'Tous les cours')

@section('content')
<div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="overflow-hidden rounded-xl bg-white shadow-sm dark:bg-gray-800">

            <!-- Header -->
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        @yield('title')
                    </h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Gérez les tags de vos cours.
                    </p>
                </div>

                <a
                    href="{{ route('admin.cours.create') }}"
                    class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow transition hover:bg-indigo-700">
                    + Ajouter un tag
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Cover
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Video
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Nom
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Prix
                            </th>

                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">

                        @forelse($cours as $cour)

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">

                                <td class="px-4 py-3">
                                    <img
                                        src="{{ asset($cour->thumbnail) }}"
                                        alt="{{ $cour->title }}"
                                        class="h-44 w-50 rounded-lg object-cover">
                                </td>

                                
                                <td class="px-4 py-3">
                                    <video
                                        controls
                                        class="h-44 w-50 rounded-lg"
                                        src="{{ asset($cour->video) }}">
                                    </video>
                                </td>
                                

                                <td class="px-4 py-3 text-sm font-medium text-gray-900">
                                    {{ $cour->title }}
                                </td>

                                <td class="px-4 py-3 font-semibold text-gray-700">
                                    {{ number_format($cour->price, 0, ',', ' ') }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">

                                        <a
                                            href="{{ route('admin.cours.edit', $cour) }}"
                                            class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-indigo-700">
                                            Éditer
                                        </a>

                                        <form
                                            action="{{ route('admin.tag.destroy', $cour) }}"
                                            method="POST"
                                            onsubmit="return confirm('Supprimer ce tag ?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                                                Supprimer
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="2" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Aucun tag trouvé.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-700">
                {{ $cours->links() }}
            </div>

        </div>

    </div>
</div>
@endsection