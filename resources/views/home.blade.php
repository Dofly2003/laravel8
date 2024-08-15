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
    <div id="beranda" class="container w-screen scroll-smooth mx-auto md:block bg-gray-900 text-white md:px-4 py-0 sm:px-6 lg:px-0">
        <header class="flex flex-col justify-center item-center">
            <div id="carouselExample" class="relative xl:max-w-full h-4/6">
                <!-- Carousel wrapper -->
                <div class="relative w-full h-full overflow-hidden rounded-lg">
                    <!-- Item 1 -->
                    <div class="carousel-item active">
                        <img src="https://dinamikaindomedia.co.id/sliders/GFc0ytKYo6BB4cWlZ7lh5dVxtVMOxZuLnhTYauve.png"
                            class="w-full h-full object-cover" alt="Slide 1">
                    </div>
                    <!-- Item 2 -->
                    <div class="carousel-item">
                        <img src="https://dinamikaindomedia.co.id/sliders/u2PFm2n2qRXBOMHyxmfLzrmqmxakLS8vlepkcOWS.png"
                            class="w-full h-full object-cover" alt="Slide 2">
                    </div>
                    <!-- Item 3 -->
                    <div class="carousel-item">
                        <img src="https://dinamikaindomedia.co.id/sliders/kQ6mLDnGCdpCnm1CkxxeIyJehj9Ymjop5pGsZDiu.png"
                            class="w-full h-full object-cover" alt="Slide 3">
                    </div>
                    <!-- Item 4 -->
                    <div class="carousel-item">
                        <img src="https://dinamikaindomedia.co.id/sliders/GCOk0ftAf02OWXzcTXoAZBvWNjho7Eqvo3Fvn53P.png"
                            class="w-full h-full object-cover" alt="Slide 4">
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-1/2 -translate-y-1/2 left-4 z-30 flex items-center justify-center h-12 w-12 rounded-full bg-black/60 group-hover:bg-black/80 group-focus:ring-4 group-focus:ring-white shadow-lg"
                    onclick="prevSlide()">
                    <svg class="w-6 h-6 text-white rtl:rotate-180 xs:hidden " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="absolute top-1/2 -translate-y-1/2 right-4 z-30 flex items-center justify-center h-12 w-12 rounded-full bg-black/60 group-hover:bg-black/80 group-focus:ring-4 group-focus:ring-white shadow-lg"
                    onclick="nextSlide()">
                    <svg class="w-6 h-6 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </button>
            </div>

            <div>
                <h1 id="profil"
                    class="bg-gradient-to-r  from-green-300 via-blue-500 to-purple-600 flex justify-center bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl">
                    Dinamika Indo Media

                </h1>
                <div class="w-full  justify-center flex">
                    <p class="w-full max-w-2xl text-center font-thin text-gray-500 text-sm">PT. DINAMIKA INDO MEDIA berdiri
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
                        <div class="delay-[300ms] duration-[600ms] taos:translate-x-[-200px] taos:opacity-0"
                            data-taos-offset="400 ">

                            <h1
                                class="bg-gradient-to-r  from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl">
                                Cari mitra tepercaya?
                                <span class="sm:block">Butuh partner bisnis?</span>
                            </h1>
                        </div>

                        <p class="mx-auto mt-4 max-w-xl sm:text-xl/relaxed delay-[300ms] duration-[600ms] taos:translate-x-[200px] taos:opacity-0"
                            data-taos-offset="400">
                            Percayakan proyek Anda kepada PT. Dinamika Indo Media dan nikmati
                            layanan terbaik dari mitra yang berpengalaman dan berdedikasi.
                            Hubungi kami sekarang untuk konsultasi lebih lanjut dan temukan bagaimana
                            kami dapat membantu Anda mencapai kesuksesan bisnis.
                        </p>

                        <div class="mt-8 flex flex-wrap justify-center gap-4">
                            <a class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
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
                        <h1 class="text-4xl flex justify-center">Unit Bisnis</h1>
                        <div class="w-full  justify-center flex">
                            <p class="w-full max-w-2xl text-center font-thin text-md">Perusahaan kami bergerak di dua unit
                                bisnis:</p>
                        </div>
                        <div class="flex gap-4 justify-evenly items-center flex-wrap">
                            <div class="max-w-sm h-44 ">
                                <div class='top border-b-2 text-white text-2xl py-1 text-center'>
                                    Retail
                                </div>
                                <p class="ub px-10 text-center">
                                    PT. Dinamika Indo Media adalah penyedia jasa terkemuka di bidang konstruksi dan bangunan
                                    yang bertujuan untuk membantu Anda mewujudkan proyek-proyek impian Anda.
                                </p>
                            </div>
                            <div class="w-96 h-44 ">
                                <div class='top border-b-2 text-white text-2xl py-1 text-center'>Penyedia Jasa</div>
                                <p class="ub px-10  text-center">
                                    PT. Dinamika Indo Media adalah penyedia solusi retail yang berkomitmen untuk memberikan
                                    layanan dan teknologi inovatif kepada pelanggan kami. Kami hadir untuk membantu bisnis
                                    Anda.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="gap-7 flex flex-col">
                        <h1 class="text-4xl flex justify-center">Support Brand</h1>
                        <div class="w-full  justify-center flex ">
                            <div class="gap-5 flex-wrap mx-10 item-center justify-center w-full flex">
                                <img src="https://dinamikaindomedia.co.id/brands/BEwtk9M1UwhfRUztL8JXw8w7dIB0HCrugRRu0P18.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/a8pQ5F8EwUfLsNGzogKFG0ydCwqL3IEAt4fPvE7f.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/bPRxWjWq8gJEW9APClpy0d9P2DEECBReBkTAQrpm.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/yIQOqyP0VwLM9H3UowAfamBoyzWXf0pvNrOw6zUC.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/yIQOqyP0VwLM9H3UowAfamBoyzWXf0pvNrOw6zUC.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/jlcaWNCWbRKKlX28VA0ekyanSdfD94qJfsdz4T6c.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/IWWMeqCXJSijxo7F0E3iF97rNuEpbD9yiNwnxaWe.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/YloE7NnpGYJsxPlmfi7C3qmULtjfRlvyHyGw1z5w.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/nTxKCAaA1yktW1N48ezPKFxJBL29INB3rWzPBKsc.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/O4pBLdAZDKVk3q8NJlhIMyVS5IyQoXCbAxQhQmwQ.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/LRUFTEfJAoaID95dfCBJoi3MAh00G5lPGuH1wFSR.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/3ekrDH6aeJL4eBHGagASlpijy4yMg8ktkFtagDmv.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/9HjYzMS80vzhzFyu4qcwZ4IFXu8O4SgdlsthlMT3.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/X9XfkaPw03pwQtDs1s2EO9FMW5Y8D59TgOd0wX1h.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/6bQMeHD8TiSx5yHNPCQjsEVCsp08NrFLBIMDvNL0.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/Kzj3BZwviLfXrohkkgBnzUmxeG4J91dwhmZZlvYh.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/9HmNVYFLUan8hnHcOeJG34MmCMPvg2mFsiFDuQvk.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/3UUAPsSeCn8AyIAOmF52vDnCzqlWe3nlHjC41huL.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                                <img src="https://dinamikaindomedia.co.id/brands/Q8voEAdP9NPXsDqjp6rqxrFzGUvij5V1HPf3Xpyn.png"
                                    class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            </div>
                        </div>
                    </div>
                </section>

                <section class="overflow-hidden text sm:grid sm:grid-cols-2 sm:items-center">
                    <div class="p-8 md:p-12 lg:px-16 lg:py-24">
                        <div class="mx-auto max-w-xl text-center ltr:sm:text-left rtl:sm:text-right xl:row-end-2">
                            <h2 class="text-2xl font-bold text-white md:text-3xl">
                                Penyedia Jasa
                            </h2>

                            <p class="text-center text-gray-500 md:mt-4 md:block">
                                Kami melayani pembangunan berbagai jenis bangunan, termasuk sekolah,
                                kantor atau instansi, dan gudang, dengan dedikasi untuk memberikan hasil
                                terbaik sesuai kebutuhan dan standar Anda.
                            </p>
                        </div>
                    </div>
                    <img alt=""
                        src="https://dinamikaindomedia.co.id/sliders/ggnkdjEPgomtyu0QvyaiiAYAq9uQ5p6IeyxKqMF8.png"
                        class="max-h-96 w-full object-cover xl:rounded-br-full xl:row-start-1" />


                </section>
            </div>
            <div>
                <section class="overflow-hidden text sm:grid sm:grid-cols-2 sm:items-center">
                    <div class="p-8 md:p-12 lg:px-16 lg:py-24">
                        <div class="mx-auto max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                            <h2 class="text-2xl font-bold text- md:texwitet-3xl">
                                Retail
                            </h2>

                            <p class="text-center text-gray-500 md:mt-4 md:block">
                                Kami menyediakan berbagai produk dan layanan, termasuk moco, multimedia, meubelair, alat
                                praktik,
                                alat permainan edukatif (APE), alat kesehatan, alat tulis kantor, serta berbagai
                                jenis pupuk seperti Pupuk Hens, Hibaflor, Pupuk Grand Tomiks, dan traktor.
                            </p>
                        </div>
                    </div>

                    <img alt=""
                        src="https://dinamikaindomedia.co.id/sliders/heFECnIjhvwBigISarzDj2lt9xIqddC6CGq9C8m8.png"
                        class="w-full max-h-96 object-cover  xl:rounded-tl-full" />
                </section>
            </div>


            </section>

            <section class="">
                <div id="produkKami" class="text-center my-10">
                    <h3 class="text-2xl font-semibold">Produk Kami</h3>
                    <p>Kami telah meningkatkan kinerja perusahaan dengan menjalin kerja sama bersama beberapa klien.</p>
                </div>
                <div class="flex flex-wrap gap-4 justify-center">
                    @foreach ($products->take(6) as $product)
                        
                    <a href="#" class="group rounded-xl max-w-xs w-56 block overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1599481238640-4c1288750d7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2664&q=80"
                            alt=""
                            class="h-60 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-64" />

                        <div class="relative border border-gray-100 bg-white flex py-2 justify-center">

                            <h3 class="text-lg font-medium text-gray-900"> {{$product->name_product}} </h3>

                        </div>
                    </a>

                    @endforeach
                </div>
                <a href="#" class=" flex justify-center text-gray-50 py-5">
                    <div class="bg-gray-800 py-3 px-3 rounded-xl border-gray-500  border-2">
                        show all
                    </div>
                </a>
            </section>


            <section class="pb-5">
                <div id="customer" class="gap-7 flex flex-col">
                    <h1 class="text-4xl flex justify-center">Customer Kami</h1>
                    <div class="flex justify-center text-center">
                        <p class="max-w-md">Kami besar dengan kepercayaan pelanggan dan kami memiliki visi untuk
                            mengembangan produk kami hingga ke luar negeri.</p>
                    </div>
                    <div class="w-full  justify-center flex ">
                        <div class="gap-5 flex-wrap mx-10 item-center justify-center w-full flex">
                            <img src="https://www.dinamikaindomedia.co.id/clients/q2mzIwWksEENHvXlbs0CiguuKAaMFHboo9iYfIMl.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/1CdNUAFLpfbAt85R4RYZJLjNoL4PAGmn7zjfn5ll.jpg"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/mi6PONdxC9UMPAE9Wg33EWRx6lcu2oiyHbhhAbH9.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/nRwH86BcCUAxqbZisXWHM2uYr2tya8z0jzVPL33E.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/2xTQgtw1i3zlof14Y0TlAfvgaeWgT9qbSLTUfbzx.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/AqvWkHCGlTxC1X82FX3oNAaLm6C2vRHuzcseBZXN.jpg"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/ADiApzk7EDZH6m36C6q3w2KcoHYbR95VxXTTonbf.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/KfpbdaGAyZa9z8LNflwsq9TivUD2TLC11SY1pjdJ.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/qsXLuNLQBNerZr0Gr1uR3L4yhn8P5fSquCeVdKeC.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/MmtUzTRwUcl4bKwdbxRWqxevB3eHvValN7W95D2P.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/1D4aaLQqYGGn6UisGUQg4QTSdQ6XE3xqfCfdRWVP.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                            <img src="https://www.dinamikaindomedia.co.id/clients/eE3KwH7io3BCVc2umzaosfmN1pFxa6GI23wRwnYL.png"
                                class="w-20 object-contain bg-white rounded-xl py-1 px-1" alt="Brand Product">
                        </div>
                    </div>
            </section>
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
                        <a class="text-xs hover:underline" href="https://siplah.temprina.co.id/">SIPLah Temprina</a>
                        <a class="text-xs hover:underline" href="https://www.jpbooks.id/">JPBooks Store</a>
                        <a class="text-xs hover:underline" href="https://cahayaquran.com/">Cahaya Quran</a>
                        <a class="text-xs hover:underline" href="https://temprina.com/main/index#">TemaTrade</a>
                        <a class="text-xs hover:underline" href="https://www.temapack.co.id/">TemaPack</a>
                        <a class="text-xs hover:underline" href="https://temprina.com/main/index#">Bela Pengadaan</a>
                    </div>
                </div>

                <div class=" px-2 max-w-1/4">
                    <h1 class="text-4xl">Contact</h1>
                    <p class="max-w-xs"> info.dinamikaindomedia@gmail.com</p>
                    <form class="max-w-sm mx-auto">
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@flowbite.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="numberPhone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number Phone</label>
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
