@extends('layouts.app')

@section('content')
    <!-- Load necessary JS libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <div class="container mx-auto px-4 py-6">
        <!-- Display success message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('success') }}</strong>
            </div>
        @endif

        <!-- Display error message -->
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('error') }}</strong>
            </div>
        @endif

        <!-- Form for creating product -->
        <form action="{{ route('Admin.customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-gray-100 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Costumer Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="relative mb-4 flex flex-row gap-4 rounded-md shadow-sm border px-3 py-2 focus:outline-none">
                <div class="">
                    <label for="img" class="block text-sm font-medium text-gray-700">Image:</label>
                    @if ($customer->img)
                        <div class=" flex items-end mb-2">
                            <img src="{{ asset('uploads/' . $customer->img) }}" alt="Current Image"
                                class=" w-32 object-contain bg-gray-600 p-1 rounded-md">
                        </div>
                    @endif
                </div>
                <input type="file" id="img" name="img"
                    class="mt-1  w-full relative top-16 h-32 border-gray-300  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>


            <!-- Submit Button -->
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Submit</button>
        </form>
    </div>

    <script></script>
@endsection
