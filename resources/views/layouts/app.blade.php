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

    <title>Admin | 
        {{ Auth::user()->name }}

    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>

<body>
    <div class="" id="app">
        <nav class="bg-gray-800 border-b shadow-sm">
            <div class="container mx-auto px-4 flex justify-between items-center py-4  text-white">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="text-2xl uppercase font-bold text-gray-100">
                    {{-- {{ config('app.name', 'Laravel') }} --}} dinamikaindomedia
                </a>
                <!-- Toggle button for mobile -->
                <button class="block lg:hidden text-gray-800 focus:outline-none" id="nav-toggle">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <!-- Navbar links -->
                <div class="hidden lg:flex lg:items-center lg:space-x-6" id="nav-content">
                    <ul class="flex items-center space-x-4">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="text-gray-600 hover:text-gray-900">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="text-gray-600 hover:text-gray-900">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li x-data="{ open: false }" class="relative group">
                                <button @click="open = ! open"
                                    class="flex items-center text-gray-100 hover:text-gray-500 focus:outline-none">
                                    {{ Auth::user()->name }}
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div x-show="open"
                                    class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg group-hover:block">
                                    <form method="POST" action="/logout/Auth">
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-gray-600 hover:bg-gray-100">
                                            {{ __('Logout') }}
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
