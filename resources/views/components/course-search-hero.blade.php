@php
@endphp
<section class="relative overflow-hidden bg-gradient-to-br from-indigo-950 via-indigo-900 to-purple-900">

    <!-- Background -->
    <img
        src="{{ asset('elearning-banner-design-man-working-260nw-2431834665.webp') }}"
        alt="Cours"
        class="absolute inset-0 h-full w-full object-cover opacity-20">

    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Blur -->
    <div class="absolute -left-20 top-0 h-72 w-72 rounded-full bg-indigo-500/30 blur-3xl"></div>
    <div class="absolute right-0 bottom-0 h-96 w-96 rounded-full bg-purple-500/20 blur-3xl"></div>

    <!-- Content -->
    <div class="relative mx-auto flex min-h-[500px] max-w-7xl items-center px-6 py-24">

        <div class="w-full">

            <div class="mx-auto max-w-4xl text-center">

                <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-5 py-2 text-sm font-semibold text-yellow-300 backdrop-blur-xl">
                    📚 Plus de 200 formations disponibles
                </span>

                <h1 class="mt-8 text-5xl font-black leading-tight text-white md:text-6xl">
                    Trouvez la formation
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">
                        idéale
                    </span>
                    pour développer votre carrière
                </h1>

                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-200">
                    Explorez nos formations professionnelles en Laravel,
                    Flutter, DevOps, UI/UX, Intelligence Artificielle
                    et bien d'autres domaines.
                </p>

            </div>

            <!-- Search Card -->

            <div class="mx-auto mt-12 max-w-5xl rounded-3xl border border-white/10 bg-white/10 p-6 shadow-2xl backdrop-blur-xl">

                <form method="GET" class="grid gap-5 md:grid-cols-3">

                    <!-- Keyword -->

                    <div>

                        <label class="mb-2 block text-sm font-medium text-white">
                            Rechercher
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ request('title') }}"
                            placeholder="Laravel, Flutter..."

                            class="w-full rounded-xl border-0 bg-white px-5 py-4 text-gray-900 placeholder-gray-500 focus:ring-4 focus:ring-yellow-400">

                    </div>

                    <!-- Price -->

                    <div>

                        <label class="mb-2 block text-sm font-medium text-white">
                            Budget maximum
                        </label>

                        <input
                            type="number"
                            name="price"
                            value="{{ request('price') }}"
                            placeholder="Ex : 50000"

                            class="w-full rounded-xl border-0 bg-white px-5 py-4 text-gray-900 placeholder-gray-500 focus:ring-4 focus:ring-yellow-400">

                    </div>

                    <!-- Button -->

                    <div class="flex items-end">

                        <button
                            class="w-full rounded-xl bg-yellow-400 px-6 py-4 font-bold text-gray-900 transition duration-300 hover:scale-[1.02] hover:bg-yellow-300">

                            🔍 Rechercher

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>