
<header x-data="{ open: false }" class="bg-indigo-600 shadow">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-white">
            Formation
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden md:block">
            <ul class="flex items-center gap-8">

                <li>
                    <a href="/"
                        class="{{ request()->routeIs('home') ? 'text-yellow-300' : 'text-white hover:text-yellow-300' }} font-medium transition">
                        Accueil
                    </a>
                </li>

                <li>
                    <a href="{{ route('cour.index') }}"
                        class="{{ request()->routeIs('cour.*') ? 'text-yellow-300' : 'text-white hover:text-yellow-300' }} font-medium transition">
                        Cours
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="text-white hover:text-yellow-300 transition">
                        Nos Services
                    </a>
                </li>

                @auth

                    <li>
                        <a href="{{ route('cart.index') }}"
                            class="{{ request()->routeIs('cart.*') ? 'text-yellow-300' : 'text-white hover:text-yellow-300' }}">
                            Panier
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="{{ request()->routeIs('dashboard') ? 'text-yellow-300' : 'text-white hover:text-yellow-300' }}">
                            Dashboard
                        </a>
                    </li>

                @else

                    <li>
                        <a href="{{ route('login') }}"
                            class="rounded-lg bg-white px-4 py-2 font-semibold text-indigo-600 hover:bg-gray-100">
                            Se connecter
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}"
                            class="rounded-lg border border-white px-4 py-2 font-semibold text-white hover:bg-white hover:text-indigo-600">
                            S'inscrire
                        </a>
                    </li>

                @endauth

            </ul>
        </nav>

        <!-- Mobile Button -->
        <button
            @click="open = !open"
            class="rounded-lg p-2 text-white hover:bg-indigo-700 md:hidden">

            <svg
                x-show="!open"
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>

            <svg
                x-show="open"
                x-cloak
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>
            </svg>

        </button>

    </div>

    <!-- Mobile Menu -->
    <div
        x-show="open"
        x-transition
        x-cloak
        class="border-t border-indigo-500 bg-indigo-700 md:hidden">

        <nav class="space-y-1 px-6 py-4">

            <a href="/"
                class="block rounded-lg px-3 py-2 text-white hover:bg-indigo-600"
                @click="open = false">
                Accueil
            </a>

            <a href="{{ route('cour.index') }}"
                class="block rounded-lg px-3 py-2 text-white hover:bg-indigo-600"
                @click="open = false">
                Cours
            </a>

            <a href="#"
                class="block rounded-lg px-3 py-2 text-white hover:bg-indigo-600"
                @click="open = false">
                Nos Services
            </a>

            @auth

                <a href="{{ route('cart.index') }}"
                    class="block rounded-lg px-3 py-2 text-white hover:bg-indigo-600"
                    @click="open = false">
                    Panier
                </a>

                <a href="{{ route('dashboard') }}"
                    class="block rounded-lg px-3 py-2 text-white hover:bg-indigo-600"
                    @click="open = false">
                    Dashboard
                </a>

            @else

                <a href="{{ route('login') }}"
                    class="block rounded-lg bg-white px-3 py-2 text-center font-semibold text-indigo-600"
                    @click="open = false">
                    Se connecter
                </a>

                <a href="{{ route('register') }}"
                    class="block rounded-lg border border-white px-3 py-2 text-center text-white"
                    @click="open = false">
                    S'inscrire
                </a>

            @endauth

        </nav>

    </div>

</header>
