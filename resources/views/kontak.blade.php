@extends('layout.main')

@section('container')
    <div class="hidden mx-auto bg-gray-100 w-full md:block text-gray-900">
        <div class="max-w-7xl px-4 py-6 sm:px-6 lg:px-8 mx-auto">
            <h1 class="ml-5 upercase h-10">Hubungi Kami</h1>
            <div class="flex flex-row mt-10 flex-wrap">
                <div class="flex w-full max-w-xs items-center "><img class="rounded-md w-11/12"
                        src="https://jpbooks.co.id/files/upload/kontak.webp" alt="kontak"></div>
                <div class="mt-10">
                    <div class="mb-3">Masukkan anda sangat Berarti</div>
                    <p class="mb-7">Tulis kritik, saran atau pesan Anda kepada kami dan dapatkan informasi seputar program
                        dan pelatihan.</p>
                    <div class="flex flex-row">
                        <div class="">
                            <p class="mb-5 mt-1 h-10 w-40">Nama Lengkap</p>
                            <p class="mb-5 mt-1 h-10">Instansi</p>
                            <p class="mb-5 mt-1 h-10">Jabatan</p>
                            <p class="mb-5 mt-1 h-10">Kota Tinggal</p>
                            <p class="mb-5 mt-1 h-10">No Whatsapp</p>
                            <p class="mb-5 mt-1 h-10">Pesan</p>
                        </div>
                        <form action="{{ route('kontak.massage') }}" method="POST" class="flex flex-col ml-10 w-full">
                            @csrf

                            <input name="name" required class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                                type="text" placeholder="Nama Lengkap">
                            <input name="instansi" required class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                                type="text" placeholder="Instansi">
                            <input name="jabatan" required class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                                type="text" placeholder="Jabatan">
                            <input name="kota" required class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                                type="text" placeholder="Kota">
                            <input name="no_whatsapp" required class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                                type="text" placeholder="No Whatsapp">

                            <textarea name="message" required placeholder="Pesan" class="border-solid mb-5 h-20 w-full border-2 rounded-md"></textarea>

                            <div class="flex justify-center">
                                <div
                                    class="group relative w-32 h-10 flex justify-center items-center overflow-hidden rounded-md">
                                    <button type="submit"
                                        class="relative z-10 bg-blue-700  text-white cursor-pointer w-full h-full">
                                        Kirim Pesan
                                    </button>
                                </div>
                            </div>
                            @if ($errors->has('error'))
                                <div id="alert-error" class="alert alert-danger" role="alert">
                                    <p>{{ $errors->first('error') }}</p>
                                </div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen " class="md:hidden mx-auto  text-gray-900  max-w-7xl  px-4 py-6 sm:px-6 lg:px-8" id="mobile-menu">
        <h1>Hubungi Kami</h1>
        <div class="flex flex-row mt-10 flex-wrap">
            <div class="flex mb-7 items-center justify-center "><img class="rounded-md w-10/12"
                    src="https://jpbooks.co.id/files/upload/kontak.webp" alt="kontak"></div>
            <div>
                <div class="mb-3">Masukkan anda sangat Berarti</div>
                <p class="mb-7">Tulis kritik, saran atau pesan Anda kepada kami dan dapatkan informasi seputar program dan
                    pelatihan.</p>
                <div class="flex flex-row">
                    <div>
                        <p class="mb-5 mt-1 h-10 w-40">Nama Lengkap</p>
                        <p class="mb-5 mt-1 h-10">Instansi</p>
                        <p class="mb-5 mt-1 h-10">Jabatan</p>
                        <p class="mb-5 mt-1 h-10">Kota Tinggal</p>
                        <p class="mb-5 mt-1 h-10">No Whatsapp</p>
                        <p class="mb-5 mt-1 h-10">Pesan</p>
                    </div>
                    <form  action="{{ route('kontak.massage') }}" method="POST" class="flex flex-col w-full">
                        @csrf
                        <input required name="name" class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                            type="text">
                        <input required name="instansi" class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                            type="text">
                        <input required name="jabatan" class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                            type="text">
                        <input required name="kota" class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                            type="text">
                        <input required name="no_whatsapp" class="border-solid mb-5 h-10 w-full border-2 rounded-md"
                            type="text">
                        <textarea required name="message" placeholder="message" name="message"
                            class="border-solid mb-5 h-20 w-full border-2 rounded-md"></textarea>
                        <div class=" flex justify-center items-center ">
                            <button type="submit"class=" text-white rounded-md w-32 h-10 bg-blue-700 border-2 border-gray-400" >Kirim Pesan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Menghilangkan alert error setelah 5 detik
        setTimeout(function() {
            let errorAlert = document.getElementById('alert-error');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000); // 5000 ms = 5 detik
    </script>
@endsection
