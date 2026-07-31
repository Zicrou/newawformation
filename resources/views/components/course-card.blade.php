@props(['cour'])

<div class="group overflow-hidden min-w-[280px] shrink-0 rounded-3xl bg-white shadow-lg ring-1 ring-gray-100 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">

    <!-- Image -->
    <div class="relative overflow-hidden">

        <img
            src="{{ asset('storage/' .$cour->thumbnail) }}"
            alt="{{ $cour->title }}"
            class="h-56 w-full object-cover transition duration-500 group-hover:scale-110">

        <!-- Badge -->
        @if($cour->disponible)
            <span class="absolute left-4 top-4 rounded-full bg-green-500 px-3 py-1 text-xs font-bold text-white shadow">
                Disponible
            </span>
        @endif

        <!-- Like -->
        <button
            type="button"
            class="like-btn absolute right-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-white/90 shadow-lg backdrop-blur transition hover:scale-110"
            data-course="{{ $cour->id }}"
            data-url="{{ route('like.cour', ['courId' => $cour->id]) }}">

            <svg
                class="heart h-6 w-6 transition {{ $cour->likedByUser() ? 'text-red-500' : 'text-gray-500' }}"
                fill="currentColor"
                viewBox="0 0 20 20">

                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>

            </svg>

        </button>

        <!-- Price -->
        <div class="absolute bottom-4 right-4 rounded-full bg-white px-4 py-2 text-lg font-bold text-indigo-700 shadow">
            {{ number_format($cour->price, '2', thousands_separator: ' ') }} FCFA
        </div>

    </div>

    <!-- Content -->

    <div class="p-6">

        <div class="mb-3 flex items-center justify-between">

            <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">

                Formation

            </span>

            <span class="text-sm text-gray-500">

                {{ $cour->updated_at->diffForHumans() }}

            </span>

        </div>

        <h3 class="line-clamp-2 text-xl font-bold text-gray-900">

            {{ $cour->title }}

        </h3>

        <p class="mt-3 line-clamp-3 text-sm leading-7 text-gray-600">

            {!! strip_tags($cour->description) !!}

        </p>

        <!-- Tags -->

        <div class="mt-5 flex flex-wrap gap-2">

            @foreach($cour->tags->take(3) as $tag)

                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs text-gray-700">

                    {{ $tag->name }}

                </span>

            @endforeach

        </div>
        <div class="mt-4 flex items-center justify-between text-sm text-gray-500">

            <div class="flex items-center gap-2">

                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                </svg>

                <span class="likes-count" id="likes-count">

                    {{ $cour->likes()->count() }}

                </span>

            </div>

            <span>{{ $cour->updated_at->diffForHumans() }}</span>

        </div>

        <!-- Footer -->

        <div class="mt-6 flex items-center justify-between">

            <a
                href="{{ route('cour.show', [
                    'slug' => $cour->getSlug(),
                    'cour' => $cour
                ]) }}"
                class="rounded-xl bg-indigo-600 px-5 py-3 font-semibold text-white transition hover:bg-indigo-700">

                Voir le cours

            </a>
            
            <div>

                <input type="hidden" name="courId" value="{{ $cour->id }}">

                <button type="button" class="add-to-cart rounded-xl px-5 py-3 font-semibold text-white transition bg-white hover:bg-indigo-700" data-url="{{ route('cart.store') }}" data-course="{{ $cour->id }}" data-authenticated="{{ auth()->check() }}">

                    🛒 

                </button>

            </div>
        
        </div>

    </div>

</div>
