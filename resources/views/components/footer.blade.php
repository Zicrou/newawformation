<footer class="relative overflow-hidden bg-slate-950 text-gray-300">

    <!-- Blur Background -->
    <div class="absolute -top-24 left-0 h-72 w-72 rounded-full bg-indigo-600/20 blur-3xl"></div>

    <div class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-purple-700/20 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 py-20">

        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-5">

            <!-- Logo -->

            <div class="lg:col-span-2">

                <a href="/" class="text-3xl font-black text-white">

                    Formation

                </a>

                <p class="mt-6 max-w-md leading-8 text-gray-400">

                    Développez vos compétences grâce à des centaines de
                    formations professionnelles en ligne.
                    Progressez à votre rythme avec des vidéos,
                    des exercices pratiques et des certificats.

                </p>

                <div class="mt-8 flex gap-4">

                    <a href="#"
                       class="flex h-11 w-11 items-center justify-center rounded-full bg-white/10 transition hover:bg-indigo-600">

                        📘

                    </a>

                    <a href="#"
                       class="flex h-11 w-11 items-center justify-center rounded-full bg-white/10 transition hover:bg-sky-500">

                        🐦

                    </a>

                    <a href="#"
                       class="flex h-11 w-11 items-center justify-center rounded-full bg-white/10 transition hover:bg-pink-600">

                        📸

                    </a>

                    <a href="#"
                       class="flex h-11 w-11 items-center justify-center rounded-full bg-white/10 transition hover:bg-blue-700">

                        💼

                    </a>

                </div>

            </div>

            <!-- Liens -->

            <div>

                <h3 class="mb-6 text-lg font-bold text-white">

                    Plateforme

                </h3>

                <ul class="space-y-4">

                    <li><a href="/" class="hover:text-white">Accueil</a></li>

                    <li><a href="{{ route('cour.index') }}" class="hover:text-white">Cours</a></li>

                    <li><a href="#" class="hover:text-white">Formateurs</a></li>

                    <li><a href="#" class="hover:text-white">Tarifs</a></li>

                </ul>

            </div>

            <!-- Catégories -->

            <div>

                <h3 class="mb-6 text-lg font-bold text-white">

                    Catégories

                </h3>

                <ul class="space-y-4">

                    <li><a href="#" class="hover:text-white">Laravel</a></li>

                    <li><a href="#" class="hover:text-white">Flutter</a></li>

                    <li><a href="#" class="hover:text-white">DevOps</a></li>

                    <li><a href="#" class="hover:text-white">UI/UX</a></li>

                </ul>

            </div>

            <!-- Contact -->

            <div>

                <h3 class="mb-6 text-lg font-bold text-white">

                    Contact

                </h3>

                <ul class="space-y-4">

                    <li>📍 Dakar, Sénégal</li>

                    <li>📞 +221 77 000 00 00</li>

                    <li>✉ contact@formation.com</li>

                </ul>

            </div>

        </div>

        <!-- Newsletter -->

        <div class="mt-20 rounded-3xl border border-white/10 bg-white/5 p-10 backdrop-blur-xl">

            <div class="flex flex-col items-center justify-between gap-6 lg:flex-row">

                <div>

                    <h3 class="text-3xl font-bold text-white">

                        Recevez nos nouveautés

                    </h3>

                    <p class="mt-3 text-gray-400">

                        Un email par semaine avec les nouvelles formations.

                    </p>

                </div>

                <form class="flex w-full max-w-xl gap-3">

                    <input
                        type="email"
                        placeholder="Votre adresse email"
                        class="flex-1 rounded-xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder-gray-400 focus:border-indigo-400 focus:outline-none">

                    <button
                        class="rounded-xl bg-indigo-600 px-8 py-4 font-semibold text-white transition hover:bg-indigo-500">

                        S'abonner

                    </button>

                </form>

            </div>

        </div>

        <!-- Bottom -->

        <div class="mt-16 border-t border-white/10 pt-8">

            <div class="flex flex-col items-center justify-between gap-4 md:flex-row">

                <p class="text-gray-500">

                    © {{ date('Y') }} Formation. Tous droits réservés.

                </p>

                <div class="flex gap-8 text-sm">

                    <a href="#" class="hover:text-white">

                        Confidentialité

                    </a>

                    <a href="#" class="hover:text-white">

                        Conditions

                    </a>

                    <a href="#" class="hover:text-white">

                        Cookies

                    </a>

                </div>

            </div>

        </div>

    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
        new TomSelect('select[multiple]', {
            plugins: {
                remove_button: {
                    title: 'Supprimer'
                }
            }
        });
    </script>
<script>
  // Script for Like button
</script>
<script>
  
</script>