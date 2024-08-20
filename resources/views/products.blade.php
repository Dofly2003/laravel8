@extends('layout.main')
@section('container')
    <div id="beranda" class="container scroll-smooth mx-auto md:block bg-gray-900 text-white md:px-4 py-0 sm:px-6 lg:px-0">

        <body>
            <div>

                <form class="max-w-screen-sm mx-auto pt-5">
                    <div class="flex items-stretch">
                        <label for="search-dropdown" class="sr-only">Search</label>
                        <!-- Search Input -->
                        <div class="relative w-full">
                            <input type="search" name="search" id="search-dropdown" placeholder="Search..."
                                class="block p-2 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-full  border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                value="{{ request('search') }}" />

                            <!-- Search Button -->
                            <button type="submit"
                                class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full items-center justify-center text-white bg-blue-700 rounded-r-full border w-14 border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 flex" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class=" text-gray-900 w-full mx-auto pt-5 flex justify-center">
                    <div>
                        Sortired by: {{ $selectedCategory }}
                    </div>
                </div>
                {{-- produk --}}
                <div class="flex pb-6 flex-wrap">

                    <div class="pt-10 xl:w-10/12 w-full flex justify-center ">
                        <div class="gap-5 px-3 flex justify-center flex-wrap">

                            @foreach ($products as $product)
                                <div
                                    class="h-64 w-48 bg-gray-500 shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                                    <a href="/product/{{ $product->slug }}">
                                        <img src="https://www.dinamikaindomedia.co.id/katalogs/Pi6sSSyIBPxXY5KzLcgFm5tsVV5y1QlJ8qRKIiHP.jpg"
                                            alt="Product" class="w-48 object-cover rounded-t-xl justify-center" />
                                        <div class=" text-center flex flex-col-reverse items-center">
                                            @foreach ($product->kategori_product->take(2) as $kategori)
                                                <p class="text-gray-400 w-full justify-center flex flex-wrap flex-row uppercase text-xs">
                                                    {{ Str::limit($kategori->name_kategori) }}</span>
                                            @endforeach
                                            <p class="text-lg font-bold text-gray-100 truncate block capitalize">
                                                {{ $product->name_product }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="hidden md:block py-10 w-2/12 text-gray-900 ">
                        <div class="flex gap-1 flex-col">
                        <h1 class="text-lg font-bold">Kategori :</h1>
                        @foreach ($kategoris as $kategori)
                            <a href="/products/kategories/{{ $kategori->name_kategori }}" id="kategori" name="kategori"
                                class="bg-purple-900 border w-8/12 border-gray-300 text-gray-300 text-sm rounded-lg flex gap-3 focus:ring-blue-500 focus:border-blue-500  p-2.5">
                                <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m9 5 7 7-7 7" />
                                </svg>
                                <div>{{ $kategori->name_kategori }}</div>
                            </a>
                        @endforeach
                    </div>

                    </div>
                </div>

                <section id="kontak" class="flex flex-wrap flex-row py-20 justify-evenly gap-4 bg-indigo-700 text-left">
                    <div class="px-2 max-w-1/4 gap-3 items-center flex flex-col">
                        <img src="https://dinamikaindomedia.co.id/tests/wUeRvwqCPJpADXYoiPBsJ3u0cCzuUvE1f2TbYZbF.png"
                            class="w-36" alt="">
                        <p class="max-w-xs">PT. DINAMIKA INDO MEDIA
                            berdiri pada hari Kamis tanggal 10 Februari 2011 di Kabupaten Bekasi,
                            saat ini kami bergerak dibidang pengadaan barang untuk pemenuhan kebutuhan instansi,
                            Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya</p>
                    </div>
                    <div class=" px-2 max-w-1/4  flex flex-col items-center gap-3">
                        <h1 class="text-4xl ">Office</h1>
                        <p class="max-w-xs">JL. Karah Agung Surabaya,Jawa Timur</p>
                        <img src="https://dinamikaindomedia.co.id/images/PT.DIM.png" class="w-64 rounded-lg" alt="">
                    </div>
                    <div class=" px-2 max-w-xs w-full items-center gap-5  sm:text-center  flex flex-col">
                        <h1 class="text-4xl">links</h1>
                        <div class=" w-40 xl:text-left flex flex-col">
                            <a class="text-xs hover:underline" href="https://siplah.temprina.co.id/">SIPLah
                                Temprina</a>
                            <a class="text-xs hover:underline" href="https://www.jpbooks.id/">JPBooks Store</a>
                            <a class="text-xs hover:underline" href="https://cahayaquran.com/">Cahaya Quran</a>
                            <a class="text-xs hover:underline" href="https://temprina.com/main/index#">TemaTrade</a>
                            <a class="text-xs hover:underline" href="https://www.temapack.co.id/">TemaPack</a>
                            <a class="text-xs hover:underline" href="https://temprina.com/main/index#">Bela
                                Pengadaan</a>
                        </div>
                    </div>

                    <div class=" px-2 max-w-1/4">
                        <h1 class="text-4xl">Contact</h1>
                        <p class="max-w-xs"> info.dinamikaindomedia@gmail.com</p>
                        <form class="max-w-sm mx-auto">
                            <div class="mb-5">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    email</label>
                                <input type="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com" required />
                            </div>
                            <div class="mb-5">
                                <label for="numberPhone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number
                                    Phone</label>
                                <input type="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                message</label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Leave a comment..."></textarea>
                            <button type="submit"
                                class="text-white bg-blue-800 mt-5 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>

                    </div>
                </section>
        </body>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownMenu = document.getElementById('dropdown');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            // Tutup dropdown jika user mengklik di luar dropdown
            window.addEventListener('click', function(e) {
                if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
