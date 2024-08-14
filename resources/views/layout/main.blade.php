<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.documentElement.classList.add('js')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>


    {{-- <style>
        html {
            scroll-behavior: smooth;
            overflow: auto;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* Internet Explorer 10+ */
        }

        /* .carousel-item {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-item.active {
            opacity: 1;
            position: relative;
        } */
    </style> --}}

    <title>Jp Books | Home </title>
</head>

<body class="h-full ">
    <div class="min-h-full bg-gray-900 ">
        <nav class="sticky bg-gray-900 top-0 z-50" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center  justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 ">
                            <a href="/">
                                <img class="w-40" src="https://jpbooks.co.id/files/upload/logo-utama.png"
                                    alt="Jp Books">
                            </a>
                        </div>
                        <div class="hidden md:block">
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4  flex items-center md:ml-6">
                            <div class="ml-10 flex items-baseline text-white space-x-4 border-b-2">
                                <a href="/beranda" id="beranda"
                                    class=" rounded-md px-3 py-2 text-sm font-medium  hover:text-gray-900"
                                    aria-current="page">
                                    Beranda
                                </a>
                                <a href="/profil"
                                    class="rounded-md px-3 py-2 text-sm font-medium  hover:text-gray-900 ">
                                    profil
                                </a>
                                <a href="/produkKami" id="tentangKami"
                                    class="rounded-md px-3 py-2 text-sm font-medium  hover:text-gray-900 ">
                                    Produk Kami
                                </a>
                                <a href="/customer" id="kontak"
                                    class="rounded-md px-3 py-2 text-sm font-medium  hover:text-gray-900">
                                    Customer
                                </a>
                                <a href="/customer" id="kontak"
                                    class="rounded-md px-3 py-2 text-sm font-medium  hover:text-gray-900">
                                    Kontak
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button @click="isOpen = !isOpen" type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-blue-500 p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/katalog"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700  hover:text-gray-500">Beranda</a>
                    <a href="/katalog"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700  hover:text-gray-500">Katalog</a>
                    <a href="/tentang-kami"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700  hover:text-gray-500">Tentang
                        Kami</a>
                    <a href="/kontak"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700  hover:text-gray-500">Kontak</a>
                </div>
            </div>
        </nav>

        <header class="  shadow">
            <div class="">
                @yield('container')
            </div>
        </header>
    </div>
    <script>
        document.querySelectorAll('nav a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah perilaku default
                const targetID = this.getAttribute('href').substring(1); // Ambil ID target
                const targetElement = document.getElementById(targetID);

                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth' // Scrolling smooth
                });
            });
        });
    </script>
</body>

</html>
