@extends('layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <style>
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            border-radius: 50%;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        select {
            scrollbar-width: none;
        }

        trix-editor {
            scrollbar-width: none;
        }
    </style>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Create Product</title>
        <!-- Include your CSS files here -->
    </head>

    <body>
        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form for creating product -->
        <form action="{{ route('Admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Form fields for product details -->
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="slug">Slug:</label>
            <input type="text" id="slug" name="slug">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>

            <label for="deskripsi">Description:</label>
            <textarea id="deskripsi" name="deskripsi"></textarea>

            <label for="kategori">Categories:</label>
            <select id="kategori" name="kategori[]" required
                class="bg-gray-50 js-example-basic-multiple border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                multiple="multiple">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                @endforeach
            </select>

            <label for="img">Image:</label>
            <input type="file" id="img" name="img" required>

            <button type="submit">Submit</button>
        </form>
    </body>

    </html>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#deskripsi').summernote();
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    </script>
@endsection
