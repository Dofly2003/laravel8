@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 ">
        <h1 class="text-3xl font-bold mb-6">Product</h1>

        <div class="overflow-x-auto bg-gray-200  p-2 rounded-xl gap-2 flex flex-col text-xl">
            @if (isset($product))
                <div class="flex flex-row text-gray-900" >Id : {{ $product->id }}</div>
                <div class="flex flex-row">Name : {{ $product->name }}</div>
                <div class="flex flex-row">Slug : {{ $product->slug }}</div>
                <div class="flex gap-2 flex-row">Kategori :
                    <div class="flex gap-3">
                        @foreach ($product->kategori_product as $kategori)
                            <a href="/kategories/{{ $kategori->name }}">
                                <li class="flex hover:underline">{{ $kategori->name }}</li>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-row h-auto w-full">Deskripsi :
                    <div class=" w-4/5 px-10 pt-2">
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="flex flex-row">Image :
                    @if (!empty($product->img))
                        <img src="{{ asset('uploads/' . $product->img) }}" alt="{{ $product->name }}"
                            class="h-5/6 w-32 object-contain rounded-xl bg-slate-300">
                    @else
                        <img src="https://p7.hiclipart.com/preview/696/451/637/computer-icons-inventory-business-management-warehouse-warehouse.jpg"
                            alt="Default Image" class="w-32">
                    @endif
                </div>
            @else
                <p>Product not found.</p>
            @endif


        </div>
    @endsection
