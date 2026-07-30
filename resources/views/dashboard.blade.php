<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="container mx-auto px-6 py-8">

            <!-- Titre -->
            <div class="flex justify-center mb-10">

                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                    Mes formations
                </h2>

            </div>

            <!-- Liste des cours -->
            <div class="flex gap-5 overflow-x-auto pb-4">

                @foreach($coursAcheter as $enrollment)

                    @php
                        $cours = $enrollment->cours;
                    @endphp

                    @if($cours)

                        <div class="min-w-[280px] shrink-0 rounded-xl bg-white dark:bg-gray-700 shadow">

                            <img
                                src="{{ asset($cours->thumbnail) }}"
                                class="h-40 w-full object-cover rounded-t-xl">

                            <div class="p-4">

                                <h4 class="font-bold text-lg">
                                    {{ $cours->title }}
                                </h4>

                                <p class="mt-2 text-sm text-gray-500">
                                    {{ number_format($cours->price, 2, ',', ' ') }} €
                                </p>

                                <a
                                    href="{{ route('cour.show', [
                                            'slug' => $cours->getSlug(),
                                            'cour' => $cours
                                        ]) }}"
                                    class="mt-4 inline-block rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">

                                    Voir le cours

                                </a>

                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        </div>

        <div class="container mx-auto px-6 py-8">

            <!-- Titre -->
            <div class="flex justify-center mb-10">

                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                    Mes favoris
                </h2>

            </div>

            <!-- Liste des cours -->
            <div class="flex gap-5 overflow-x-auto pb-4">

                @foreach($likes as $like)

                    @if($like)

                        <div class="min-w-[280px] shrink-0 rounded-xl bg-white dark:bg-gray-700 shadow">

                            <img
                                src="{{ asset($like->   cours->thumbnail) }}"
                                class="h-40 w-full object-cover rounded-t-xl">

                            <div class="p-4">

                                <h4 class="font-bold text-lg">
                                    {{ $like->  cours->title }}
                                </h4>

                                <p class="mt-2 text-sm text-gray-500">
                                    {{ number_format($like->    cours->price, 2, ',', ' ') }} €
                                </p>

                                <a
                                    href="{{ route('cour.show', [
                                            'slug' => $like->   cours->getSlug(),
                                            'cour' => $cours
                                        ]) }}"
                                    class="mt-4 inline-block rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">

                                    Voir le cours

                                </a>

                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        </div>

    </x-slot>

    

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{ __("Vous êtes connecté!") }}
                
                </div>
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <x-nav-link

                        :href="route('admin.cours.index')"
                        :active="request()->routeIs('dashboard')">
                        {{ __('Admin') }}
                    
                    </x-nav-link>
                    
                </div>

            </div>

        </div>

    </div>

    
</x-app-layout>
