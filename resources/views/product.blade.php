@extends('layout.main')


@section('container')
    <div class="mx-auto md:block max-w-9xl py-6  mb-3">
        <section class=" bg-gray-900 md:pt-16 dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl pb-10 gap-8 flex flex-col px-4 text-white mx-auto 2xl:px-0">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="shrink-0 items-center justify-center flex max-w-md lg:max-w-lg mx-auto">
                        <img class=" max-w-sm dark:hidden rounded-xl"
                            src="https://jpbooks.co.id/files/upload/a98bd3c4cb09ae2b35b0153fa515133eb25dce9c9c7ea96cd2.jpeg"
                            alt="" />
                    </div>

                    <div class="mt-6 w-full sm:mt-8 lg:mt-0">
                        <div class="">
                            <a href="/katalog?kategori={{ $product->slug }}">

                                <h1 class="text-2xl font-extrabold  sm:text-3xl dark:text-white">
                                    {{ $product->name_product }}
                                </h1>
                            </a>
                            <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                                <p class="text-xl  font-semibold sm:text-2xldark:text-white">
                                    @foreach ($product->kategori_product as $kategori)
                                        <a href="/kategories/{{ $kategori->name_kategori }}">
                                            <li class="flex hover:underline">{{ $kategori->name_kategori }}</li>
                                        </a>
                                    @endforeach
                                </p>
                            </div>

                            <div class="mt-6 sm:gap-4 sm:items-center sm:flex flex gap-4 sm:mt-8">
                                <a href="#Shopee"
                                    class="cursor-pointer z-30 text-gray-700 flex gap-3 ease-in-out duration-300  rounded-xl flex-row border-orange-600 bg-orange-600 py-3 hover:bg-transparent items-center px-4 ">
                                    <img src="https://www.freepnglogos.com/uploads/shopee-logo-png/shopee-logo-shop-with-the-gentlemen-collection-and-win-the-shopee-0.png"
                                        class="w-7 p-1 object-fit bg-white rounded-xl" alt="">
                                    <p class="text-white">Shopee</p>
                                </a>
                                <a href="#Tiktok"
                                    class=" cursor-pointer text-gray-700 flex gap-3 ease-in-out duration-300  z-30 rounded-xl flex-row border-black bg-black py-3 hover:bg-transparent items-center px-4 ">
                                    <img src="https://seeklogo.com/images/T/tiktok-logo-B9AC5FE794-seeklogo.com.png"
                                        class="w-7 p-1 bg-white object-contain rounded-xl" alt="">
                                    <p class="text-white">Tiktok</p>
                                </a>
                                <a href="#Tokopedia"
                                    class="cursor-pointer text-gray-700 flex gap-3 ease-in-out duration-300  z-30 rounded-xl flex-row border-green-500 bg-green-500 py-3 hover:bg-transparent items-center px-4 ">
                                    <img src="https://www.freepnglogos.com/uploads/logo-tokopedia-png/berita-tokopedia-info-berita-terbaru-tokopedia-6.png"
                                        class="w-7 p-1 bg-white  object-contain rounded-xl" alt="">
                                    <p class="text-white">Tokopedia</p>
                                </a>
                            </div>

                            <br class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                            <p class="mb-6 text-gray-500 dark:text-gray-400">
                                {{ $product->description }}
                            </p>

                            <p class="text-gray-500 dark:text-gray-400 text-balance">
                                Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
                                Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
                                Magic Keyboard or Magic Keyboard with Touch ID.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="px-1 flex flex-col  font-semibold text-xl gap-4 text-white">
                    <p class="pl-10 py-10">Pilihan Lain</p>
                    <div class="px-2 flex flex-row flex-wrap justify-center items-center gap-2 mx-auto ">

                        @foreach ($products->take(6) as $product)
                            <a href="/product/{{ $product->slug }}"
                                class="group rounded-xl max-w-xs w-48 object-contain block overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1599481238640-4c1288750d7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2664&q=80"
                                    alt=""
                                    class="h-60 rounded-lg border-2 object-cover transition duration-500 group-hover:scale-105 sm:h-64" />

                                <div class="relative flex py-2 justify-center">

                                    <h3 class="text-lg font-medium  text-center"> {{ $product->name_product }} </h3>

                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <section id="kontak"
                class="flex flex-wrap flex-row py-20 justify-evenly gap-4 text-white bg-indigo-700 text-left">
                <div class="px-2 max-w-1/4 gap-3 items-center flex flex-col">
                    <img src="https://dinamikaindomedia.co.id/tests/wUeRvwqCPJpADXYoiPBsJ3u0cCzuUvE1f2TbYZbF.png"
                        class="w-36 p-1 rounded-xl" alt="">
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
                    <form action="#" class="max-w-sm mx-auto">
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium dark:text-white">Your
                                email</label>
                            <input type="email" id="email" autocomplete="n"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@flowbite.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="numberPhone" class="block mb-2 text-sm font-medium dark:text-white">Number
                                Phone</label>
                            <input type="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <label for="message" class="block mb-2 text-sm font-medium  dark:text-white">Your
                            message</label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Leave a comment..."></textarea>
                        <button type="submit"
                            class="text-white bg-blue-800 mt-5 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>
            </section>
        </section>
    </div>
@endsection
