@extends('layout.main')

@section('container')
    <div class="mx-auto md:block max-w-9xl py-6 mb-3">
        <section class="bg-gray-900 md:pt-16 dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl pb-10 gap-8 flex flex-col px-4 text-white mx-auto 2xl:px-0">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="shrink-0 items-start justify-center flex max-w-md lg:max-w-lg mx-auto">
                        @if (!empty($product->img))
                            <img src="{{ asset('uploads/' . $product->img) }}" alt="{{ $product->name }}"
                                class="max-w-sm h-auto">
                        @else
                            <img src="https://p7.hiclipart.com/preview/696/451/637/computer-icons-inventory-business-management-warehouse-warehouse.jpg"
                                alt="Default Image" class="max-w-xs">
                        @endif

                    </div>

                    <div class="mt-6 w-full sm:mt-8 lg:mt-0">
                        <div class="">
                            <a href="/katalog?kategori={{ $product->slug }}">
                                <h1 class="text-2xl font-extrabold sm:text-3xl dark:text-white">
                                    {{ $product->name }}
                                </h1>
                            </a>
                            <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                                <p class="text-xl font-semibold sm:text-2xldark:text-white">
                                    @foreach ($product->kategori_product as $kategori)
                                        <a href="/kategories/{{ $kategori->name }}">
                                            <li class="flex hover:underline">{{ $kategori->name }}</li>
                                        </a>
                                    @endforeach
                                </p>
                            </div>

                            <div class="mt-6 sm:gap-4 sm:items-center sm:flex flex gap-4 sm:mt-8">
                                <!-- Links to external platforms -->
                                <a href="#Shopee"
                                    class="cursor-pointer z-30 text-gray-700 flex gap-3 ease-in-out duration-300 rounded-xl flex-row border-orange-600 bg-orange-600 py-3 hover:bg-transparent items-center px-4 ">
                                    <img src="https://www.freepnglogos.com/uploads/shopee-logo-png/shopee-logo-shop-with-the-gentlemen-collection-and-win-the-shopee-0.png"
                                        class="w-7 p-1 object-fit bg-white rounded-xl" alt="">
                                    <p class="text-white">Shopee</p>
                                </a>
                                <a href="#Tiktok"
                                    class="cursor-pointer text-gray-700 flex gap-3 ease-in-out duration-300 z-30 rounded-xl flex-row border-black bg-black py-3 hover:bg-transparent items-center px-4 ">
                                    <img src="https://seeklogo.com/images/T/tiktok-logo-B9AC5FE794-seeklogo.com.png"
                                        class="w-7 p-1 bg-white object-contain rounded-xl" alt="">
                                    <p class="text-white">Tiktok</p>
                                </a>
                                <a href="#Tokopedia"
                                    class="cursor-pointer text-gray-700 flex gap-3 ease-in-out duration-300 z-30 rounded-xl flex-row border-green-500 bg-green-500 py-3 hover:bg-transparent items-center px-4 ">
                                    <img src="https://www.freepnglogos.com/uploads/logo-tokopedia-png/berita-tokopedia-info-berita-terbaru-tokopedia-6.png"
                                        class="w-7 p-1 bg-white object-contain rounded-xl" alt="">
                                    <p class="text-white">Tokopedia</p>
                                </a>
                            </div>

                            <br class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                            <!-- Description -->
                            <div id="description-container" x-data="{ isModalOpen: false }">
                                <!-- Truncated Description (using line-clamp for multi-line truncation) -->
                                <p id="description" class="mb-6 overflow-hidden line-clamp-3">
                                   {!! Str::limit($product->name, 1000) !!}
                                </p>

                                <!-- Button to open modal -->
                                <button @click="isModalOpen = true" class="text-blue-500 hover:underline">
                                    Lihat Selengkapnya
                                </button>

                                <!-- Modal for full description -->
                                <div x-show="isModalOpen" x-cloak
                                    class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
                                    <div class="h-full overflow-scroll w-screen my-3 rounded-lg  max-w-5xl mx-auto">
                                        <div class="bg-white p-6 ">
                                            <h2 class="text-xl font-bold mb-4">Deskripsi Lengkap</h2>
                                        <p class="mb-6 h-full">
                                            {!! $product->description !!} 
                                        </p>

                                        <!-- Close button -->
                                        <button @click="isModalOpen = false"
                                            class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">
                                            Tutup
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-1 flex flex-col font-semibold text-xl gap-4 text-white">
                    <p class="pl-10 py-10">Pilihan Lain</p>
                    <div class="px-2 flex flex-row flex-wrap justify-center items-center gap-2 mx-auto ">
                        @foreach ($products->take(6) as $product)
                            <a href="/product/{{ $product->slug }}"
                                class="group rounded-xl max-w-xs w-48 object-contain block overflow-hidden">
                                <img src="{{ asset('uploads/' . $product->img) }}" alt=""
                                    class="h-60  rounded-lg border-4 object-cover transition duration-500 group-hover:scale-105 sm:h-64" />
                                <div class="relative flex py-2 justify-center">
                                    <h3 class="text-lg font-medium text-center">{{ Str::limit($product->name, 10) }}</h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Add script to handle description toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const descriptionElement = document.getElementById('description');
            const toggleButton = document.getElementById('toggle-description');
            const charLimit = 400; // Limit characters
            let originalText = descriptionElement.innerHTML;

            // Check if description exceeds the character limit
            if (originalText.length > charLimit) {
                // Truncate text and show '...'
                descriptionElement.innerHTML = originalText.slice(0, charLimit) + '...';
                toggleButton.style.display = 'block';
            } else {
                toggleButton.style.display = 'none';
            }

            // Toggle full description
            toggleButton.addEventListener('click', function() {
                if (descriptionElement.innerHTML.length > charLimit) {
                    descriptionElement.innerHTML = originalText;
                    toggleButton.innerHTML = 'Tutup';
                } else {
                    descriptionElement.innerHTML = originalText.slice(0, charLimit) + '...';
                    toggleButton.innerHTML = 'Lihat Selengkapnya';
                }
            });
        });
    </script>
@endsection
