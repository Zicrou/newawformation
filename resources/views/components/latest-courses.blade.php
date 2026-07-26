<section class="bg-gray-50 py-24">

    <div class="mx-auto max-w-7xl px-6">

        <div class="mb-14 text-center">

            <span class="rounded-full bg-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">
                Nos formations
            </span>

            <h2 class="mt-4 text-4xl font-bold text-gray-900">
                Derniers cours publiés
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-lg text-gray-600">
                Découvrez les formations les plus récentes créées par nos
                meilleurs formateurs.
            </p>

        </div>

        <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @foreach($cours as $cour)

                <article
                    class="group overflow-hidden rounded-3xl bg-white shadow-lg transition duration-500 hover:-translate-y-3 hover:shadow-2xl">

                    <div class="relative overflow-hidden">

                        <img
                            src="{{ asset($cour->thumbnail) }}"
                            class="h-60 w-full object-cover transition duration-700 group-hover:scale-110">

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                        </div>

                        <span
                            class="absolute left-4 top-4 rounded-full bg-yellow-400 px-3 py-1 text-xs font-bold text-gray-900">

                            Nouveau

                        </span>

                    </div>

                    <div class="space-y-5 p-7">

                        <h3
                            class="line-clamp-2 text-xl font-bold text-gray-900">

                            {{ $cour->title }}

                        </h3>

                        <p
                            class="line-clamp-3 text-gray-600">

                            {{ Str::words(strip_tags($cour->description),20) }}
                            
                        </p>
                        <div
                            class="flex items-center justify-between">

                            <div>

                                <p
                                    class="text-2xl font-bold text-indigo-600">

                                    {{ number_format($cour->price,0,' ',' ') }} £

                                </p>

                            </div>

                            <span
                                class="text-sm text-gray-500">

                                {{ $cour->updated_at->diffForHumans() }}

                            </span>

                        </div>

                        <div
                            class="flex items-center justify-between pt-4">

                            <button
                                data-course="{{ $cour->id }}"
                                class="like-btn flex h-12 w-12 items-center justify-center rounded-full border transition hover:bg-red-50">

                                <i class="bi bi-heart text-xl"></i>

                            </button>

                            <a
                                href="{{ route('cour.show',['slug'=>$cour->getSlug(),'cour'=>$cour]) }}"
                                class="rounded-xl bg-indigo-600 px-6 py-3 font-semibold text-white transition hover:bg-indigo-700">

                                Voir le cours

                            </a>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>