<section class="relative overflow-hidden py-24">

    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-700 via-purple-700 to-indigo-900"></div>

    <!-- Blur -->
    <div class="absolute -left-24 top-0 h-80 w-80 rounded-full bg-pink-500/30 blur-3xl"></div>

    <div class="absolute right-0 bottom-0 h-96 w-96 rounded-full bg-indigo-400/20 blur-3xl"></div>

    <div class="relative mx-auto max-w-6xl px-6">

        <div
            class="rounded-[40px] border border-white/20 bg-white/10 p-12 text-center shadow-2xl backdrop-blur-xl">

            <span
                class="rounded-full bg-white/20 px-4 py-2 text-sm font-semibold text-yellow-300">

                🚀 Rejoignez plus de 15 000 étudiants

            </span>

            <h2
                class="mx-auto mt-8 max-w-4xl text-5xl font-extrabold leading-tight text-white">

                Commencez votre apprentissage dès aujourd'hui

            </h2>

            <p
                class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-indigo-100">

                Accédez immédiatement à des centaines de formations,
                obtenez des certificats professionnels et développez
                les compétences qui feront évoluer votre carrière.

            </p>

            <div
                class="mt-12 flex flex-col justify-center gap-5 md:flex-row">

                <a
                    href="{{ route('register') }}"
                    class="rounded-xl bg-yellow-400 px-8 py-4 font-bold text-gray-900 transition duration-300 hover:scale-105 hover:bg-yellow-300">

                    Commencer gratuitement

                </a>

                <a
                    href="{{ route('cour.index') }}"
                    class="rounded-xl border border-white/30 bg-white/10 px-8 py-4 font-semibold text-white backdrop-blur-xl transition hover:bg-white hover:text-indigo-700">

                    Voir les formations

                </a>

            </div>

            <div
                class="mt-12 flex flex-wrap justify-center gap-10 text-sm text-indigo-100">

                <div>

                    ✅ Accès immédiat

                </div>

                <div>

                    🎓 Certificat

                </div>

                <div>

                    💻 Accessible sur mobile

                </div>

                <div>

                    🔒 Paiement sécurisé

                </div>

            </div>

        </div>

    </div>

</section>