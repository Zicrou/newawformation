<section class="relative isolate flex min-h-screen items-center overflow-hidden">

    <!-- Background -->
    <img
    src="{{ asset('elearning-banner-design-man-working-260nw-2431834665.webp') }}"
    class="absolute inset-0 h-full w-full object-cover"
    alt="">
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Gradient -->
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-950/80 via-indigo-900/50 to-purple-700/30"></div>
    
    <div class="absolute inset-0 bg-black/70"></div>

    <div class="absolute inset-0 bg-gradient-to-r from-indigo-950/80 via-indigo-900/50 to-purple-700/30"></div>


   <!-- CONTENT -->
<div class="relative z-10 mx-auto flex min-h-screen max-w-7xl items-center px-6">

    <div class="max-w-3xl">

        <!-- Badge -->
        <span class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-5 py-2 text-sm font-semibold text-yellow-300 backdrop-blur-md">
            🚀 Plus de 200 formations disponibles
        </span>

        <!-- Title -->
        <h1 class="mt-8 text-5xl font-extrabold leading-tight text-white md:text-7xl">
            Apprenez les compétences
            <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">
                qui feront votre avenir
            </span>
        </h1>

        <!-- Description -->
        <p class="mt-6 max-w-2xl text-lg leading-8 text-gray-200">
            Développez vos compétences grâce à des centaines de cours vidéo,
            des projets pratiques et des formateurs expérimentés.
        </p>

        <!-- Search -->
        <form action="{{ route('cour.index') }}" method="GET" class="mt-10">
            <div class="flex flex-col gap-3 rounded-2xl bg-white/10 p-3 backdrop-blur-xl md:flex-row">

                <input
                    type="text"
                    name="title"
                    placeholder="Rechercher une formation..."
                    class="flex-1 rounded-xl border-0 bg-white px-6 py-4 text-gray-800 focus:ring-2 focus:ring-yellow-400">

                <button
                    class="rounded-xl bg-yellow-400 px-8 py-4 font-semibold text-gray-900 transition hover:bg-yellow-300">
                    🔍 Rechercher
                </button>

            </div>
        </form>

        <!-- Buttons -->
        <div class="mt-8 flex flex-wrap gap-4">

            <a
                href="{{ route('cour.index') }}"
                class="rounded-xl bg-indigo-600 px-8 py-4 font-semibold text-white transition hover:bg-indigo-700">
                Explorer les cours
            </a>

            @guest
                <a
                    href="{{ route('register') }}"
                    class="rounded-xl border border-white/30 bg-white/10 px-8 py-4 font-semibold text-white backdrop-blur-md transition hover:bg-white hover:text-indigo-700">
                    Créer un compte
                </a>
            @endguest

        </div>

        <!-- Stats -->
        <div class="mt-16 grid grid-cols-2 gap-6 md:grid-cols-4">

            <div>
                <h2 class="text-4xl font-bold text-yellow-300">200+</h2>
                <p class="text-gray-300">Cours</p>
            </div>

            <div>
                <h2 class="text-4xl font-bold text-yellow-300">15K+</h2>
                <p class="text-gray-300">Étudiants</p>
            </div>

            <div>
                <h2 class="text-4xl font-bold text-yellow-300">98%</h2>
                <p class="text-gray-300">Satisfaction</p>
            </div>

            <div>
                <h2 class="text-4xl font-bold text-yellow-300">40+</h2>
                <p class="text-gray-300">Formateurs</p>
            </div>

        </div>

    </div>

</div>

</section>