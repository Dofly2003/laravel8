<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- alphine js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="bg-white border-b shadow-sm">
            <div class="container mx-auto px-4 flex justify-between items-center py-4 bg-gray-800 text-white">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="text-2xl uppercase font-bold text-gray-100">
                    {{-- {{ config('app.name', 'Laravel') }} --}} dinamikaindomedia
                </a>
                <!-- Toggle button for mobile -->
                <button class="block lg:hidden text-gray-800 focus:outline-none" id="nav-toggle">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <!-- Navbar links -->
                <div class="hidden lg:flex lg:items-center lg:space-x-6" id="nav-content">
                    <ul class="flex items-center space-x-4">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li x-data="{ open: false }" class="relative group">
                                <button @click="open = ! open"   class="flex items-center text-gray-100 hover:text-gray-900 focus:outline-none">
                                    {{ Auth::user()->name }}
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg group-hover:block">
                                    <a href="{{ route('logout') }}"
                                       class="block px-4 py-2 text-gray-600 hover:bg-gray-100"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left text-lg hover:text-gray-300">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            <main class="flex flex-row w-full ">
                @include('layouts.sideBar')
                @yield('content')
            </main>
    </div>

    <!-- Toggle Script -->
    <script>
        const navToggle = document.getElementById('nav-toggle');
        const navContent = document.getElementById('nav-content');

        navToggle.addEventListener('click', () => {
            navContent.classList.toggle('hidden');
        });
    </script>
</body>
</html>
