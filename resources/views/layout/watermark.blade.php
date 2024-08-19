@section('endWeb')
    <section id="kontak" class="flex flex-wrap flex-row py-20 justify-evenly gap-4 bg-indigo-700 text-left">
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
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        email</label>
                    <input type="email" id="email" autocomplete="n"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@flowbite.com" required />
                </div>
                <div class="mb-5">
                    <label for="numberPhone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number
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
@endsection
