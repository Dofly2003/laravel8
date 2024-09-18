@extends('layouts.app')

@section('content')
    <div class="container py-4 text-white">
        <h1 class="text-start text-gray-900 mb-4"> Dashboard </h1>

        <div class="row ">
            <!-- Slides -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-primary shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">Slides</p>
                                <i class="fas fas fa-images fa-2x"></i>
                            </div>

                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center border-r-2 border-black border-opacity-20">
                                    content1
                                </div>
                                <div class="w-1/2 flex justify-center border-l-2 border-black border-opacity-20">
                                    content2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="col-lg-4 col-md-8 mb-4">
                <div class="card h-56  bg-success shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">Products</p>
                                <i class="fas fa-boxes fa-2x"></i>
                            </div>

                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center border-r-2 border-black border-opacity-20">
                                    content1
                                </div>
                                <div class="w-1/2 flex justify-center border-l-2 border-black border-opacity-20">
                                    content2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Brands -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-warning shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">Brands</p>
                                <i class="fas fa-tags fa-2x"></i>
                            </div>

                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center border-r-2 border-black border-opacity-20">
                                    content1
                                </div>
                                <div class="w-1/2 flex justify-center border-l-2 border-black border-opacity-20">
                                    content2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kerjasama -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-info shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">Kerjasama</p>
                                <i class="fas fa-handshake fa-2x"></i>
                            </div>

                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center border-r-2 border-black border-opacity-20">
                                    content1
                                </div>
                                <div class="w-1/2 flex justify-center border-l-2 border-black border-opacity-20">
                                    content2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Videos -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-danger shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">Videos</p>
                                <i class="fas fa-video fa-2x"></i>
                            </div>

                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center border-r-2 border-black border-opacity-20">
                                    content1
                                </div>
                                <div class="w-1/2 flex justify-center border-l-2 border-black border-opacity-20">
                                    content2
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Pesan --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-info shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">User Admin</p>
                                <i class="fa fa-user fa-2x"  aria-hidden="true"></i>
                            </div>

                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center border-r-2 border-black border-opacity-20">
                                    content1
                                </div>
                                <div class="w-1/2 flex justify-center border-l-2 border-black border-opacity-20">
                                    content2
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card h-64 bg-dark shadow">
                <div class="card-body">
                    <div class="flex flex-col">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="">Pesan</p>
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>

                        <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-44 w-full rounded-lg text-white">
                            <div class="w-full flex">
                                <table class=" relative table-auto w-full text-left">
                                    <thead>
                                        <tr class="">
                                            <th class="px-2  w-1/6 ">Nama</th>
                                            <th class="px-2  w-1/6">Instansi</th>
                                            <th class="px-2  w-1/6">Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pesan as $item)
                                            <tr class="">
                                                <td class="px-2 w-1/6">{{ $item->name }}</td>
                                                <td class="px-2 w-1/6">{{ $item->instansi }}</td>
                                                <td class="px-2 w-2/6">{{ $item->message }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No messages found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
