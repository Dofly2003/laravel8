@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">  </h1>

    <div class="row text-white">
        <!-- Slides -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-56  bg-primary shadow">
                <div class="card-body">
                    <div class="flex flex-col">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Slides</p>
                            <i class="fas fas fa-images fa-2x"></i>
                        </div>

                        <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                            <div class="w-1/2 flex justify-center border-r-2">
                                content1
                            </div>
                            <div class="w-1/2 flex justify-center border-l-2">
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
                            <p class="mb-0">Products</p>
                            <i class="fas fa-boxes fa-2x"></i>
                        </div>

                        <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                            <div class="w-1/2 flex justify-center border-r-2">
                                content1
                            </div>
                            <div class="w-1/2 flex justify-center border-l-2">
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
                            <p class="mb-0">Brands</p>
                            <i class="fas fa-tags fa-2x"></i>
                        </div>

                        <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                            <div class="w-1/2 flex justify-center border-r-2">
                                content1
                            </div>
                            <div class="w-1/2 flex justify-center border-l-2">
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
                            <p class="mb-0">Kerjasama</p>
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>

                        <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                            <div class="w-1/2 flex justify-center border-r-2">
                                content1
                            </div>
                            <div class="w-1/2 flex justify-center border-l-2">
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
                            <p class="mb-0">Videos</p>
                            <i class="fas fa-video fa-2x"></i>
                        </div>

                        <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                            <div class="w-1/2 flex justify-center border-r-2">
                                content1
                            </div>
                            <div class="w-1/2 flex justify-center border-l-2">
                                content2
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
