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
        <form action="{{ route('Admin.product.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-100 p-6 rounded-lg shadow-md">
            @csrf

            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name:</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="deskripsi" name="deskripsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
            </div>

            <!-- Categories -->
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Categories:</label>
                <select id="kategori" name="kategori[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm js-example-basic-multiple" multiple="multiple">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                </select>
            </div>  

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="img" class="block text-sm font-medium text-gray-700">Image:</label>
                <input type="file" id="img" name="img" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#deskripsi').summernote({
                height: 300, // Set editor height
                minHeight: null, // Set minimum height of editor
                maxHeight: null, // Set maximum height of editor
                focus: true, // Set focus to editable area after initializing
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                callbacks: {
                    onInit: function() {
                        // Add custom Tailwind classes to Summernote buttons
                        $('.note-btn').addClass('bg-blue-500 text-white hover:bg-blue-700');
                    }
                }
            });

            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
