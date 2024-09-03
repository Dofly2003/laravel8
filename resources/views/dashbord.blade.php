@extends('layouts.app')

@section('content')
    <div class=" w-full">
        <div class="p-6 bg-gray-100">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-8">Admin Dashboard</h1>

            <!-- Slides Section -->
            <section>
                <h2 class="text-2xl font-semibold text-blue-600 mb-4">Slides</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-col-6 gap-6">
                    @forelse ($slides as $slide)
                        <div
                            class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <img src="{{ asset('uploads/' . $slide->img) }}" alt="{{ $slide->name }}"
                                class="w-full h-40 object-contain">
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900">{{ $slide->name }}</h3>
                            </div>
                        </div>
                    @empty

                    no data
                    @endforelse
                </div>
            </section>

            <!-- Products Section -->
            <section class="mt-12">
                <h2 class="text-2xl font-semibold text-blue-600 mb-4">Products</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-col-6 gap-6">
                    @foreach ($products as $product)
                        <div
                            class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            @if (!empty($product->img))
                                <img src="{{ asset('uploads/' . $product->img) }}" alt="{{ $product->name }}"
                                    class="w-full h-auto">
                            @else
                                <img src="https://p7.hiclipart.com/preview/696/451/637/computer-icons-inventory-business-management-warehouse-warehouse.jpg"
                                    alt="Default Image" class="w-full h-auto">
                            @endif

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900">{{ $product->name }}</h3>
                                <p class="text-gray-700 mt-2">{{ Str::limit($product->description, 20) }}</p>
                                <p class="text-lg font-semibold text-green-500 mt-4">Price: ${{ $product->price }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
