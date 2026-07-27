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

    </div>

</section>