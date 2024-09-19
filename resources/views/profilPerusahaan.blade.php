@extends('layout.main')

@section('container')
    @foreach ($profil as $item)
        @if ($item->is_publish)
            {!! $item->code !!}
        @else
        @endif
    @endforeach

    @if (!empty($item->is_publish))
        {!! $item->code !!}
    @else
        <div class="mx-auto px-4 py-6 sm:px-6 lg:px-8 mb-3">

            <!-- Web View -->
            <div class="hidden md:block">
                <div class="pb-20 border-b-2">
                    <div class=" px-10">

                        <div class="flex flex-row">
                            <div>
                                <img src="https://jpbooks.co.id/files/upload/img-profile.jpg"
                                    class="w-full max-w-md rounded-lg" alt="Profil Perusahaan">
                            </div>
                            <div class="w-full max-w-3xl pl-24 pt-20">
                                <h1 class="py-3 font-semibold text-xl">Profil Perusahaan</h1>
                                <p class="py-3 text-gray-900 text-sm font-sans">PT. Dinamika Indo Media berdiri pada hari
                                    Kamis
                                    tanggal 10 Februari 2011 di Kabupaten Bekasi,kami merupakan perusahaan yang bergerak di
                                    bidang
                                    teknologi informasi dan media. Dan dibidang pengadaan barang untuk pemenuhan kebutuhan
                                    instansi,
                                    Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya.</p>
                                <p class="py-3 text-gray-900 text-sm font-sans">PT. Dinamika Indo Media merupakan perusahaan
                                    yang
                                    bergerak di bidang teknologi informasi dan media. Dan dibidang pengadaan barang untuk
                                    pemenuhan
                                    kebutuhan instansi, Lembaga, dan satuan kerja pemerintahan yang bertempat
                                    di Kota Surabaya.
                                </p>
                            </div>
                        </div>
                        <div>
                            <p class="text-gray-900 text-sm font-sans pt-7">Di bawah naungan PT Temprina Media Grafika, JP
                                BOOKS
                                terus berkembang dan berinovasi mengikuti perkembangan zaman. Sebagai penerbit yang
                                beroperasi
                                sejak
                                tahun 2002, kami senantiasa berupaya dan bertumbuh, untuk menyediakan buku-buku terbaik bagi
                                masyarakat.</p>
                            <p class="text-gray-900 text-sm font-sans pt-4">Di dukung oleh para tenaga ahli, kami
                                menyediakan
                                banyak
                                buku berkualitas yang sarat akan nilai-nilai pendidikan. Kami memiliki tim-tim handal yang
                                bekerja
                                keras, mulai dari proses kreatif, produksi, pengemasan, hingga pemasaran. Kami berupaya agar
                                buku
                                yang sampai ke tangan anda dalam kondisi yang terbaik.</p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-row py-14 border-b-2 justify-between">
                    <div class="w-full max-w-2xl pl-10">
                        <p class="w-14 my-4 py-1 px-3 rounded-md uppercase text-2xl">Visi</p>
                        <div>
                            <p>Menjadi perusahaan retail buku dan alat pendidikan yang unggul, mudah dijangkau dan merata di
                                seluruh wilayah Indonesia dengan memanfaatkan teknologi terkini untuk menjamin ketersediaan
                                stock, kualitas dan kecepatan pelayanan</p>
                        </div>
                        <p class="w-14 my-4 py-1 px-3 rounded-md uppercase text-2xl">Misi</p>
                        <div>
                            <p>Menjadi tempat tujuan utama untuk berbelanja buku dan alat pendidikan yang mudah dan aman
                                baik
                                secara offline maupun online.
                                Membangun budaya kerja yang professional, dan berorientasi kepada kepuasan pelanggan
                                Bersama pemerintah turut memajukan pendidikan nasional.</p>
                        </div>
                    </div>
                    <div>
                        <img src="https://jpbooks.co.id/files/upload/img-visi.jpg" class="w-full max-w-md rounded-lg"
                            alt="">
                    </div>
                </div>
                <div class="py-16">
                    <h2 class="text-2xl font-bold text-gray-900 text-center">Alamat Kami</h2>
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                        <!-- Google Maps Embed -->
                        <div class="relative" style="padding-bottom: 56.25%; height: 0; overflow: hidden;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d822.972201787338!2d112.71728055060603!3d-7.314777633890883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7dc58c71c3%3A0xfc7efe1783ad19f3!2sJawa%20Pos%20Pt!5e0!3m2!1sid!2sid!4v1726642734530!5m2!1sid!2sid"
                                class="absolute top-0 left-0 w-full h-full border-0 rounded-lg shadow-lg" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <!-- Informasi Alamat -->
                        <div class="flex flex-col h-full justify-center  space-y-4">
                            <div class="flex flex-col gap-5">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">Alamat</h3>
                                    <p class="text-gray-900 text-lg">Jl. Karah Agung I No.45, Karah, Kec. Jambangan,
                                        Surabaya,
                                        Jawa
                                        Timur 60232</p>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">Jam Operasional</h3>
                                    <p class="text-gray-900 text-lg">Buka jam 08.00 sampai 17.00, Sabtu dan Minggu tutup</p>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">Kontak</h3>
                                    <p class="text-gray-900 text-lg">Telepon: (031) 8283333</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile View -->
            <div class="block md:hidden px-4 py-6">
                <div class="pb-10 border-b-2">
                    <div>
                        <img src="https://jpbooks.co.id/files/upload/img-profile.jpg" class="w-full rounded-lg mb-6"
                            alt="Profil Perusahaan">
                    </div>
                    <div>
                        <h1 class="py-3 font-semibold text-lg">Profil Perusahaan</h1>
                        <p class="py-3 text-gray-900 text-sm font-sans">PT. Dinamika Indo Media berdiri pada hari Kamis
                            tanggal 10 Februari 2011 di Kabupaten Bekasi,kami merupakan perusahaan yang bergerak di bidang
                            teknologi informasi dan media. Dan dibidang pengadaan barang untuk pemenuhan kebutuhan instansi,
                            Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya.</p>
                        <p class="py-3 text-gray-900 text-sm font-sans">PT. Dinamika Indo Media merupakan perusahaan yang
                            bergerak di bidang teknologi informasi dan media. Dan dibidang pengadaan barang untuk pemenuhan
                            kebutuhan instansi, Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya.</p>
                    </div>
                    <div class="mt-6">
                        <p class="text-gray-900 text-sm font-sans">Di bawah naungan PT Temprina Media Grafika, JP BOOKS
                            terus berkembang dan berinovasi mengikuti perkembangan zaman. Sebagai penerbit yang beroperasi
                            sejak
                            tahun 2002, kami senantiasa berupaya dan bertumbuh, untuk menyediakan buku-buku terbaik bagi
                            masyarakat.</p>
                        <p class="text-gray-900 text-sm font-sans mt-4">Di dukung oleh para tenaga ahli, kami menyediakan
                            banyak
                            buku berkualitas yang sarat akan nilai-nilai pendidikan. Kami memiliki tim-tim handal yang
                            bekerja
                            keras, mulai dari proses kreatif, produksi, pengemasan, hingga pemasaran. Kami berupaya agar
                            buku
                            yang sampai ke tangan anda dalam kondisi yang terbaik.</p>
                    </div>
                </div>

                <div class="py-14 border-b-2">
                    <div>
                        <p class="font-semibold text-lg  uppercase my-4">Visi</p>
                        <p class="text-gray-900 text-sm">Menjadi perusahaan retail buku dan alat pendidikan yang unggul,
                            mudah
                            dijangkau
                            dan merata di seluruh wilayah Indonesia dengan memanfaatkan teknologi terkini untuk menjamin
                            ketersediaan
                            stock, kualitas dan kecepatan pelayanan.</p>
                    </div>
                    <div class="mt-6">
                        <p class="font-semibold text-lg  uppercase my-4">Misi</p>
                        <p class="text-gray-900 text-sm">Menjadi tempat tujuan utama untuk berbelanja buku dan alat
                            pendidikan
                            yang mudah dan aman baik
                            secara offline maupun online. Membangun budaya kerja yang profesional, dan berorientasi kepada
                            kepuasan
                            pelanggan. Bersama pemerintah turut memajukan pendidikan nasional.</p>
                    </div>
                </div>

                <div class="py-5">
                    <div class="mb-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3508759351316!2d112.7151195747609!3d-7.314422992693566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb005d4df687%3A0xc18690588597f699!2sPT.%20Dinamika%20Indo%20Media!5e0!3m2!1sid!2sid!4v1726643112121!5m2!1sid!2sid"
                            class="w-full rounded-lg" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div>
                        <p class="text-gray-900 text-sm mb-4">
                            Jl. Karah Agung I No.45, Karah, Kec. Jambangan, Surabaya, Jawa Timur 60232
                        </p>
                        <p class="text-gray-500">
                        <div class="flex flex-col gap-5 ">
                            <div class="text-center">
                                <h3 class="text-xl font-semibold  text-gray-800">Alamat</h3>
                                <p class="text-gray-900 text-lg">Jl. Karah Agung I No.45, Karah, Kec. Jambangan, Surabaya,
                                    Jawa
                                    Timur 60232</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-semibold  text-gray-800">Jam Operasional</h3>
                                <p class="text-gray-900 text-lg">Buka jam 08.00 sampai 17.00, Sabtu dan Minggu tutup</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-semibold  text-gray-800">Kontak</h3>
                                <p class="text-gray-900 text-lg">Telepon: (031) 8283333</p>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    @endif

    {{-- tamplate --}}

    {{-- <div class="mx-auto px-4 py-6 sm:px-6 lg:px-8 mb-3">

        <!-- Web View -->
        <div class="hidden md:block">
            <div class="pb-20 border-b-2">
                <div class=" px-10">

                    <div class="flex flex-row">
                        <div>
                            <img src="https://jpbooks.co.id/files/upload/img-profile.jpg" class="w-full max-w-md rounded-lg"
                                alt="Profil Perusahaan">
                        </div>
                        <div class="w-full max-w-3xl pl-24 pt-20">
                            <h1 class="py-3 font-semibold text-xl">Profil Perusahaan</h1>
                            <p class="py-3 text-gray-900 text-sm font-sans">PT. Dinamika Indo Media berdiri pada hari Kamis
                                tanggal 10 Februari 2011 di Kabupaten Bekasi,kami merupakan perusahaan yang bergerak di
                                bidang
                                teknologi informasi dan media. Dan dibidang pengadaan barang untuk pemenuhan kebutuhan
                                instansi,
                                Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya.</p>
                            <p class="py-3 text-gray-900 text-sm font-sans">PT. Dinamika Indo Media merupakan perusahaan
                                yang
                                bergerak di bidang teknologi informasi dan media. Dan dibidang pengadaan barang untuk
                                pemenuhan
                                kebutuhan instansi, Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya.
                            </p>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-900 text-sm font-sans pt-7">Di bawah naungan PT Temprina Media Grafika, JP BOOKS
                            terus berkembang dan berinovasi mengikuti perkembangan zaman. Sebagai penerbit yang beroperasi
                            sejak
                            tahun 2002, kami senantiasa berupaya dan bertumbuh, untuk menyediakan buku-buku terbaik bagi
                            masyarakat.</p>
                        <p class="text-gray-900 text-sm font-sans pt-4">Di dukung oleh para tenaga ahli, kami menyediakan
                            banyak
                            buku berkualitas yang sarat akan nilai-nilai pendidikan. Kami memiliki tim-tim handal yang
                            bekerja
                            keras, mulai dari proses kreatif, produksi, pengemasan, hingga pemasaran. Kami berupaya agar
                            buku
                            yang sampai ke tangan anda dalam kondisi yang terbaik.</p>
                    </div>
                </div>

            </div>

            <div class="flex flex-row py-14 border-b-2 justify-between">
                <div class="w-full max-w-2xl pl-10">
                    <p class="w-14 my-4 py-1 px-3 rounded-md uppercase text-2xl">Visi</p>
                    <div>
                        <p>Menjadi perusahaan retail buku dan alat pendidikan yang unggul, mudah dijangkau dan merata di
                            seluruh wilayah Indonesia dengan memanfaatkan teknologi terkini untuk menjamin ketersediaan
                            stock, kualitas dan kecepatan pelayanan</p>
                    </div>
                    <p class="w-14 my-4 py-1 px-3 rounded-md uppercase text-2xl">Misi</p>
                    <div>
                        <p>Menjadi tempat tujuan utama untuk berbelanja buku dan alat pendidikan yang mudah dan aman baik
                            secara offline maupun online.
                            Membangun budaya kerja yang professional, dan berorientasi kepada kepuasan pelanggan
                            Bersama pemerintah turut memajukan pendidikan nasional.</p>
                    </div>
                </div>
                <div>
                    <img src="https://jpbooks.co.id/files/upload/img-visi.jpg" class="w-full max-w-md rounded-lg"
                        alt="">
                </div>
            </div>
            <div class="py-16">
                <h2 class="text-2xl font-bold text-gray-900 text-center">Alamat Kami</h2>
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                    <!-- Google Maps Embed -->
                    <div class="relative" style="padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d822.972201787338!2d112.71728055060603!3d-7.314777633890883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7dc58c71c3%3A0xfc7efe1783ad19f3!2sJawa%20Pos%20Pt!5e0!3m2!1sid!2sid!4v1726642734530!5m2!1sid!2sid"
                            class="absolute top-0 left-0 w-full h-full border-0 rounded-lg shadow-lg" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <!-- Informasi Alamat -->
                    <div class="flex flex-col h-full justify-center  space-y-4">
                        <div class="flex flex-col gap-5">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Alamat</h3>
                                <p class="text-gray-900 text-lg">Jl. Karah Agung I No.45, Karah, Kec. Jambangan, Surabaya,
                                    Jawa
                                    Timur 60232</p>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Jam Operasional</h3>
                                <p class="text-gray-900 text-lg">Buka jam 08.00 sampai 17.00, Sabtu dan Minggu tutup</p>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Kontak</h3>
                                <p class="text-gray-900 text-lg">Telepon: (031) 8283333</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile View -->
        <div class="block md:hidden px-4 py-6">
            <div class="pb-10 border-b-2">
                <div>
                    <img src="https://jpbooks.co.id/files/upload/img-profile.jpg" class="w-full rounded-lg mb-6"
                        alt="Profil Perusahaan">
                </div>
                <div>
                    <h1 class="py-3 font-semibold text-lg">Profil Perusahaan</h1>
                    <p class="py-3 text-gray-900 text-sm font-sans">PT. Dinamika Indo Media berdiri pada hari Kamis
                        tanggal 10 Februari 2011 di Kabupaten Bekasi,kami merupakan perusahaan yang bergerak di bidang
                        teknologi informasi dan media. Dan dibidang pengadaan barang untuk pemenuhan kebutuhan instansi,
                        Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya.</p>
                    <p class="py-3 text-gray-900 text-sm font-sans">PT. Dinamika Indo Media merupakan perusahaan yang
                        bergerak di bidang teknologi informasi dan media. Dan dibidang pengadaan barang untuk pemenuhan
                        kebutuhan instansi, Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya.</p>
                </div>
                <div class="mt-6">
                    <p class="text-gray-900 text-sm font-sans">Di bawah naungan PT Temprina Media Grafika, JP BOOKS
                        terus berkembang dan berinovasi mengikuti perkembangan zaman. Sebagai penerbit yang beroperasi sejak
                        tahun 2002, kami senantiasa berupaya dan bertumbuh, untuk menyediakan buku-buku terbaik bagi
                        masyarakat.</p>
                    <p class="text-gray-900 text-sm font-sans mt-4">Di dukung oleh para tenaga ahli, kami menyediakan banyak
                        buku berkualitas yang sarat akan nilai-nilai pendidikan. Kami memiliki tim-tim handal yang bekerja
                        keras, mulai dari proses kreatif, produksi, pengemasan, hingga pemasaran. Kami berupaya agar buku
                        yang sampai ke tangan anda dalam kondisi yang terbaik.</p>
                </div>
            </div>

            <div class="py-14 border-b-2">
                <div>
                    <p class="font-semibold text-lg  uppercase my-4">Visi</p>
                    <p class="text-gray-900 text-sm">Menjadi perusahaan retail buku dan alat pendidikan yang unggul, mudah
                        dijangkau
                        dan merata di seluruh wilayah Indonesia dengan memanfaatkan teknologi terkini untuk menjamin
                        ketersediaan
                        stock, kualitas dan kecepatan pelayanan.</p>
                </div>
                <div class="mt-6">
                    <p class="font-semibold text-lg  uppercase my-4">Misi</p>
                    <p class="text-gray-900 text-sm">Menjadi tempat tujuan utama untuk berbelanja buku dan alat pendidikan
                        yang mudah dan aman baik
                        secara offline maupun online. Membangun budaya kerja yang profesional, dan berorientasi kepada
                        kepuasan
                        pelanggan. Bersama pemerintah turut memajukan pendidikan nasional.</p>
                </div>
            </div>

            <div class="py-5">
                <div class="mb-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3508759351316!2d112.7151195747609!3d-7.314422992693566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb005d4df687%3A0xc18690588597f699!2sPT.%20Dinamika%20Indo%20Media!5e0!3m2!1sid!2sid!4v1726643112121!5m2!1sid!2sid"
                        class="w-full rounded-lg" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div>
                    <p class="text-gray-900 text-sm mb-4">
                        Jl. Karah Agung I No.45, Karah, Kec. Jambangan, Surabaya, Jawa Timur 60232
                    </p>
                    <p class="text-gray-500">
                    <div class="flex flex-col gap-5 ">
                        <div class="text-center">
                            <h3 class="text-xl font-semibold  text-gray-800">Alamat</h3>
                            <p class="text-gray-900 text-lg">Jl. Karah Agung I No.45, Karah, Kec. Jambangan, Surabaya,
                                Jawa
                                Timur 60232</p>
                        </div>
                        <div class="text-center" >
                            <h3 class="text-xl font-semibold  text-gray-800">Jam Operasional</h3>
                            <p class="text-gray-900 text-lg">Buka jam 08.00 sampai 17.00, Sabtu dan Minggu tutup</p>
                        </div>
                        <div class="text-center" >
                            <h3 class="text-xl font-semibold  text-gray-800">Kontak</h3>
                            <p class="text-gray-900 text-lg">Telepon: (031) 8283333</p>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>

    </div> --}}
@endsection
