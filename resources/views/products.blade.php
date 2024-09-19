@extends('layout.main')
@section('container')
    <div id="beranda" class="container scroll-smooth mx-auto md:block bg-gray-200 text-white md:px-4 py-0 sm:px-6 lg:px-0">

        <body>
            <div>

                <form class="max-w-screen-sm mx-auto pt-5">
                    @if (request('kategori'))
                        <input type="hidden" id="search" name="kategori" value="{{ request('kategori') }}">
                    @endif
                    <div class="flex items-stretch justify-center">
                        <label for="search-dropdown" class="sr-only">Search</label>
                        <!-- Search Input -->
                        <div class="relative w-1/2 lg:w-full">
                            <input type="search" name="search" id="search-dropdown" placeholder="Search..."
                                class="block p-2 lg:w-full w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-full  border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
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
                <div class=" text-gray-700 w-full mx-auto pt-5 flex justify-center">
                    <div>
                        Sortired by: {{ $selectedCategory }}
                    </div>
                </div>
                {{-- produk --}}
                <div class="flex pb-6 flex-wrap">

                    <div class="pt-10 xl:w-10/12 w-full h-full overflow-hidden flex justify-center">
                        <div class="gap-4 grid grid-cols-2 md:grid-col-3 lg:grid-cols-4 xl:grid-cols-5 ">

                            @forelse ($products as $product)
                                @if ($product->is_publish)
                                    <div
                                        class="lg:w-48 w-52 max-w-xs h-72 lg:h-72 overflow-hidden transform transition-transform border-4 bg-gray-500 shadow-xl rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                                        <a href="/product/{{ $product->slug }}">
                                            <div class="h-4/5 ">
                                                @if (!empty($product->img))
                                                    <img src="{{ asset('uploads/' . $product->img) }}"
                                                        alt="{{ $product->name }}"
                                                        class="h-5/6 object-cover w-full rounded-t-xl bg-slate-300">
                                                @else
                                                    <img src="https://p7.hiclipart.com/preview/696/451/637/computer-icons-inventory-business-management-warehouse-warehouse.jpg"
                                                        alt="Default Image" class="w-full  h-auto">
                                                @endif
                                            </div>
                                            <div class="h-1/5 text-center flex flex-col-reverse items-center">
                                                @foreach ($product->kategori_product->take(2) as $kategori)
                                                    @if ($kategori->is_publish)
                                                        <p
                                                            class="text-gray-400 w-full justify-center flex flex-wrap flex-row text-xs">
                                                            {{ Str::limit($kategori->name) }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                                <p
                                                    class="text-md lg:text-lg font-bold text-gray-100 truncate block capitalize  text-wrap w-full">
                                                    {{ Str::limit($product->name, 20) }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @empty
                                <div class="h-96 ">
                                    <p class="font-semibold text-xl overflow-hidden w-11/12 flex justify-center">Product Not
                                        Found</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="hidden md:block py-10 w-2/12  sticky text-gray-400 ">
                        <div id="" class="flex gap-1 flex-col">
                            <button id="dropdownButton"
                                class="inline-flex justify-center items-center w-2/3 px-2 py-2 text-gray-900">
                                <h1 id="dropdownButton" class="text-lg flex flex-row font-bold">Show Kategori
                                    <div class="my-auto">
                                        <svg id="dropdownButton" class="w-4 h-4 ml-1 " fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </h1>
                            </button>

                            <div id="dropdownMenu"
                                class="hidden opacity-0 transition-opacity animation-display duration-300 transform scale-95 flex-col">
                                @foreach ($kategoris as $kategori)
                                    @if ($kategori->is_publish)
                                        <a href="/products/kategories/{{ $kategori->name }}" id="kategori" name="kategori"
                                            class="bg-slate-800 m-2 hover:bg-slate-900 ease-in-out duration-300 border w-8/12 border-gray-300 text-gray-300 text-sm rounded-lg flex gap-3 focus:ring-blue-500 focus:border-blue-500 p-2.5">
                                            <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m9 5 7 7-7 7" />
                                            </svg>
                                            <div>{{ $kategori->name }}</div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="py-4 flex justify-center">
                    @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $products->links() }}
                    @endif
                </div>
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


        document.getElementById('dropdownButton').addEventListener('click', function() {
            var dropdown = document.getElementById('dropdownMenu');
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                setTimeout(function() {
                    dropdown.classList.remove('opacity-0', 'scale-95');
                    dropdown.classList.add('opacity-100', 'scale-100');
                }, 10); // Small delay to allow the class removal to trigger transition
            } else {
                dropdown.classList.add('opacity-0', 'scale-95');
                dropdown.classList.remove('opacity-100', 'scale-100');
                setTimeout(function() {
                    dropdown.classList.add('hidden');
                }, 300); // Matches the duration of the transition
            }
        });

        window.onclick = function(event) {
            if (!event.target.matches('#dropdownButton') && !event.target.closest('#dropdownMenu')) {
                var dropdown = document.getElementById('dropdownMenu');
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('opacity-0', 'scale-95');
                    dropdown.classList.remove('opacity-100', 'scale-100');
                    setTimeout(function() {
                        dropdown.classList.add('hidden');
                    }, 300);
                }
            }
        };
    </script>
@endsection
