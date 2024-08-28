@extends('layout.main')
<style>
    html {
        scroll-behavior: smooth;
        overflow: auto;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* Internet Explorer 10+ */
    }

    .carousel-item {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transition: opacity 1s ease-in-out;
    }

    .carousel-item.active {
        opacity: 1;
        position: relative;
    }
</style>

@section('container')
    <div id="beranda"
        class="container w-screen scroll-smooth mx-auto md:block bg-gray-900 text-white md:px-4 py-0 sm:px-6 lg:px-0">
        <header class="flex flex-col justify-center item-center">
            <div id="carouselExample" class="relative xl:max-w-full h-4/6">
                <!-- Carousel wrapper -->
                <div class="relative w-full h-full overflow-hidden rounded-lg">
                    <!-- Item 1 -->
                    <div id="carouselExample" class="carousel slide relative" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                // Filter sliders yang sudah dipublish
                                $publishedSliders = $sliders->filter(function ($slider) {
                                    return $slider->is_publish;
                                });

                                // Reset index untuk active slide
                                $activeIndex = 0;
                            @endphp

                            @foreach ($publishedSliders as $index => $slider)
                                <div class="carousel-item {{ $index == $activeIndex ? 'active' : '' }}">
                                    <img src="{{ asset('uploads/' . $slider->img) }}" class="w-full h-full object-cover"
                                        alt="Slide {{ $index + 1 }}">
                                    <div
                                        class="carousel-caption hidden lg:block absolute bottom-4 lg:bottom-14 left-5 lg:left-10">
                                        <div class="flex flex-row gap-1 lg:gap-3">
                                            <a href="#Shopee"
                                                class="cursor-pointer z-30 text-gray-700 flex gap-1 lg:gap-3 ease-in-out duration-300 rounded-md lg:rounded-xl flex-row border-orange-600 bg-orange-600 hover:bg-transparent items-center px-3 h-7 lg:h-14 lg:px-7 ">
                                                <img src="https://www.freepnglogos.com/uploads/shopee-logo-png/shopee-logo-shop-with-the-gentlemen-collection-and-win-the-shopee-0.png"
                                                    class="lg:w-7 w-3 object-fit bg-white rounded-xl" alt="Shopee">
                                                <p class="text-white text-xs sm:text-sm lg:text-base">Shopee</p>
                                            </a>
                                            <a href="#Tokopedia"
                                                class="cursor-pointer text-gray-700 flex  gap-1 lg:gap-3 ease-in-out duration-300  z-30 rounded-md lg:rounded-xl flex-row border-green-500 bg-green-500 py-3 hover:bg-transparent items-center px-3 h-7 lg:h-14 lg:px-7">
                                                <img src="img/tokopedia-icon.png"
                                                    class="lg:w-7 w-4 p-1 bg-white  object-fill rounded-xl" alt="Tokopedia">
                                                <p class="text-white text-xs sm:text-sm lg:text-base">Tokopedia</p>
                                            </a>
                                            <a href="#Tiktok"
                                                class=" cursor-pointer text-gray-700 flex  gap-1 lg:gap-3 ease-in-out duration-300  z-30 rounded-md lg:rounded-xl flex-row border-black bg-black py-3 hover:bg-transparent items-center px-3 h-7 lg:h-14 lg:px-7">
                                                <img src="https://seeklogo.com/images/T/tiktok-logo-B9AC5FE794-seeklogo.com.png"
                                                    class="lg:w-7 w-4 p-1 bg-white object-fit rounded-xl" alt="Tiktok">
                                                <p class="text-white text-xs sm:text-sm lg:text-base">Tiktok</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Item 2 -->
                    </div>
                    {{-- mobile menu slider --}}

                    <!-- Slider controls -->
                    <div class="hidden md:block">

                        <button type="button"
                            class="absolute top-1/2 -translate-y-1/2 left-4 z-30 flex items-center justify-center h-12 w-12 rounded-full bg-black/60 group-hover:bg-black/80 group-focus:ring-4 group-focus:ring-white shadow-lg"
                            onclick="prevSlide()">
                            <svg class="w-6 h-6 text-white rtl:rotate-180 xs:hidden " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button type="button"
                            class="absolute top-1/2 -translate-y-1/2 right-4 z-30 flex items-center justify-center h-12 w-12 rounded-full bg-black/60 group-hover:bg-black/80 group-focus:ring-4 group-focus:ring-white shadow-lg"
                            onclick="nextSlide()">
                            <svg class="w-6 h-6 text-white rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>

                </div>

                <div>
                    <h1 id="profil"
                        class="bg-gradient-to-r  from-green-300 via-blue-500 to-purple-600 flex justify-center bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl">
                        Dinamika Indo Media

                    </h1>
                    <div class="w-full  justify-center flex">
                        <p class="w-full max-w-2xl text-center font-thin text-gray-500 text-sm">PT. DINAMIKA INDO MEDIA
                            berdiri
                            pada hari Kamis tanggal 10 Februari 2011 di Kabupaten Bekasi, saat ini kami bergerak dibidang
                            pengadaan barang untuk pemenuhan kebutuhan instansi, Lembaga, dan satuan kerja pemerintahan yang
                            bertempat di Kota Surabaya.</p>
                    </div>
                </div>
                <div class=" w-full flex justify-center crusor-pointer">
                    <a href="">
                        <img src="img/PT_DINAMIKA_INDO_MEDIA_.png" class="xl:max-w-7xl" alt="Banner">
                    </a>
                </div>
                <section class=" text-white ">
                    <div class="mx-auto max-w-screen-2xl  px-4 py-10 lg:flex lg:h-2/4 ">
                        <div class="mx-auto max-w-3xl text-center ">
                            <div class="delay-[300ms] duration-[600ms] taos:translate-x-[-200px] ease-in-out duration-300 taos:opacity-0"
                                data-taos-offset="400 ">

                                <h1
                                    class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl">
                                    Cari mitra tepercaya?
                                    <span class="sm:block">Butuh partner bisnis?</span>
                                </h1>
                            </div>

                            <p class="mx-auto mt-4 max-w-xl text-xs sm:text-sm lg:text-base sm:text-xl/relaxed ease-in-out duration-300 delay-[300ms] duration-[600ms] taos:translate-x-[200px] taos:opacity-0"
                                data-taos-offset="400">
                                Percayakan proyek Anda kepada PT. Dinamika Indo Media dan nikmati
                                layanan terbaik dari mitra yang berpengalaman dan berdedikasi.
                                Hubungi kami sekarang untuk konsultasi lebih lanjut dan temukan bagaimana
                                kami dapat membantu Anda mencapai kesuksesan bisnis.
                            </p>

                            <div class="mt-8 flex flex-wrap justify-center gap-4">
                                <a class="block w-36 lg:w-full rounded border border-blue-600  ease-in-out duration-300  bg-blue-600 lg:px-12 px-8 py-3 text-sm text-center font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
                                    href="https://e-katalog.lkpp.go.id/user/login">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
        </header>

        <body>
            <div class="flex flex-col gap-8">
                <section class="gap-10 flex flex-col">
                    <div>
                        <h1 class="lg:text-4xl text-2xl flex justify-center">Unit Bisnis</h1>
                        <div class="w-full  justify-center flex">
                            <p class="w-full lg:max-w-2xl text-center font-thin text-sm">Perusahaan kami bergerak di dua
                                unit
                                bisnis:</p>
                        </div>
                        <div class="flex gap-4 ease-in-out duration-300  justify-evenly items-center flex-wrap">
                            <div class="max-w-sm items-center flex flex-col h-24 lg:h-44 ">
                                <div class='top border-b-2 w-56 text-white lg:text-2xl text-xl py-1 text-center'>
                                    Retail
                                </div>
                                <p class=" lg:px-10 px-5 text-center text-xs sm:text-sm lg:text-base">
                                    PT. Dinamika Indo Media adalah penyedia jasa terkemuka di bidang konstruksi dan bangunan
                                    yang bertujuan untuk membantu Anda mewujudkan proyek-proyek impian Anda.
                                </p>
                            </div>
                            <div class="w-96 max-w-sm items-center flex flex-col h-24 lg:h-44">
                                <div class='top border-b-2 w-56 text-white lg:text-2xl text-xl py-1 text-center'>Penyedia
                                    Jasa</div>
                                <p class="lg:px-10 px-5 text-center text-xs sm:text-sm lg:text-base">
                                    PT. Dinamika Indo Media adalah penyedia solusi retail yang berkomitmen untuk memberikan
                                    layanan dan teknologi inovatif kepada pelanggan kami. Kami hadir untuk membantu bisnis
                                    Anda.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="gap-7 flex flex-col">
                        <h1 class="lg:text-4xl text-xl flex justify-center ">Support Brand</h1>
                        <div class="w-full  justify-center flex ">

                            <div class="gap-5 flex-wrap mx-10 item-center justify-center w-full flex">
                                @forelse ($brands as $item)
                                    @if ($item->is_publish)
                                        <img
                                            class="lg:w-20  w-10 object-contain bg-white rounded-md lg:rounded-xl lg:py-1 lg:px-1"
                                            src="{{ asset('uploads/' . $item->img) }}" alt="{{ $item->name }}">
                                    @endif
                                @empty
                                    <p class="text-center text-sm text-gray-500">No Data</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>

                <section class="overflow-hidden text sm:grid sm:grid-cols-2 sm:items-center">
                    <div class="p-8 md:p-12 lg:px-16 lg:py-24">
                        <div class="mx-auto max-w-xl text-center ltr:sm:text-left rtl:sm:text-right xl:row-end-2">
                            <h2 class="lg:text-2xl text-xl font-bold text-white md:text-3xl">
                                Penyedia Jasa
                            </h2>

                            <p class="text-center text-xs sm:text-sm lg:text-base text-gray-500 md:mt-4 md:block">
                                Kami melayani pembangunan berbagai jenis bangunan, termasuk sekolah,
                                kantor atau instansi, dan gudang, dengan dedikasi untuk memberikan hasil
                                terbaik sesuai kebutuhan dan standar Anda.
                            </p>
                        </div>
                    </div>
                    <img alt=""
                        src="https://dinamikaindomedia.co.id/sliders/ggnkdjEPgomtyu0QvyaiiAYAq9uQ5p6IeyxKqMF8.png"
                        class="max-h-96 w-full object-cover md:rounded-br-full xl:rounded-br-full md:row-start-1 xl:row-start-1" />


                </section>
            </div>
            <div>
                <section class="overflow-hidden text sm:grid sm:grid-cols-2 sm:items-center">
                    <div class="p-8 md:p-6 lg:px-16 lg:py-24">
                        <div class="mx-auto max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                            <h2 class="lg:text-2xl text-xl font-bold text-white md:text-3xl">
                                Retail
                            </h2>

                            <p class="text-center text-xs sm:text-sm lg:text-base text-gray-500 md:mt-4 md:block">
                                Kami menyediakan berbagai produk dan layanan, termasuk moco, multimedia, meubelair, alat
                                praktik,
                                alat permainan edukatif (APE), alat kesehatan, alat tulis kantor, serta berbagai
                                jenis pupuk seperti Pupuk Hens, Hibaflor, Pupuk Grand Tomiks, dan traktor.
                            </p>
                        </div>
                    </div>

                    <img alt=""
                        src="https://dinamikaindomedia.co.id/sliders/heFECnIjhvwBigISarzDj2lt9xIqddC6CGq9C8m8.png"
                        class="w-full max-h-96 object-cover md:rounded-tl-full xl:rounded-tl-full" />
                </section>
            </div>


            </section>

            <section class="">
                <div id="produkKami" class="text-center my-10">
                    <h3 class="lg:text-2xl text-lg font-semibold">Produk Kami</h3>
                    <p class="sm:text-sm text-xs text-gray-400 lg:text-base">Kami telah meningkatkan kinerja perusahaan
                        dengan menjalin kerja sama bersama beberapa klien.</p>
                </div>
                <div class="flex flex-wrap gap-4 justify-center">
                    @foreach ($products->take(6) as $product)
                        <a href="/product/{{ $product->slug }}"
                            class="group rounded-xl md:grow max-w-xs w-48 object-contain px-1 block overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1599481238640-4c1288750d7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2664&q=80"
                                alt=""
                                class="h-52 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-64" />

                            <div class="relative border border-gray-100 bg-white flex py-2 justify-center">

                                <h3 class="text-lg font-medium text-gray-900"> {{ $product->name_product }} </h3>

                            </div>
                        </a>
                    @endforeach
                </div>
                <div class=" flex justify-center text-gray-50 py-5">
                    <a href="/products"
                        class=" lg:py-3 py-1 px-1 lg:px-3 block  rounded border border-blue-600  ease-in-out duration-300  bg-blue-600  text-sm font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto">
                        show all
                    </a>
                </div>
            </section>


            <section id="customer" class="pb-5">
                <div class="gap-7 flex flex-col">
                    <h1 class="lg:text-4xl text-2xl flex justify-center">Customer Kami</h1>
                    <div class="flex justify-center text-center">
                        <p class="max-w-md text-center text-xs sm:text-sm lg:text-base">Kami besar dengan kepercayaan
                            pelanggan dan kami memiliki visi untuk
                            mengembangan produk kami hingga ke luar negeri.</p>
                    </div>
                    <div class="w-full  justify-center flex ">
                        <div class="gap-5 flex-wrap mx-10 item-center justify-center w-full flex">
                            @forelse ($customers as $item)
                                @if ($item->is_publish)
                                    <img
                                        class="lg:w-20  w-10 object-contain bg-white rounded-md lg:rounded-xl lg:py-1 lg:px-1"
                                        src="{{ asset('uploads/' . $item->img) }}" alt="{{ $item->name }}">
                                @endif
                            @empty
                                <p class="text-center text-sm text-gray-500">No Data</p>
                            @endforelse
                        </div>
                    </div>
            </section>

    </div>
    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        // Pindah slide secara otomatis setiap 5 detik
        setInterval(nextSlide, 5000);
    </script>
    <script src="js/slider"></script>
    </body>
    </div>
@endsection
