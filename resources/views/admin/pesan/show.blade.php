@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Detail Pesan</h1>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $pesan->name }}</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Detail informasi pesan.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4  sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Nama</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $pesan->name }}</dd>
                    </div>
                    <div class="bg-white px-4  sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Instansi</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $pesan->instansi }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4  sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Jabatan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $pesan->jabatan }}</dd>
                    </div>
                    <div class="bg-white px-4  sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Kota</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $pesan->kota }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4  sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">No WhatsApp</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="https://wa.me/{{ $pesan->no_whatsapp }}" target="_blank"
                                class="text-blue-500 hover:text-blue-700">
                                {{ $pesan->no_whatsapp }}
                            </a>
                        </dd>
                    </div>
                    <div class="bg-white px-4  sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Pesan</dt>
                        <dd
                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 flex flex-col min-h-[200px] overflow-auto p-2 break-words">
                            {{ $pesan->message }}
                        </dd>
                    </div>
                    

                    <div class="bg-gray-50 px-4  sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Tanggal</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $pesan->created_at->format('d-m-Y H:i') }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
