<!DOCTYPE html>
<html lang="en">
@extends('layout.main')
@section('container')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Sliders</title>
        {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
        </style>
    </head>

    <body class="text-white bg-white">
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <form action="{{ route('testZone.store') }}" method="POST" class="text-white" enctype="multipart/form-data">
            @csrf

            <label for="name_img">Name Image:</label>
            <input type="text" id="name_img" name="name_img" required>

            <label for="img">Upload Image:</label>
            <input type="file" id="img" name="img" required>

            <label for="is_publish">Publish:</label>
            <label class="toggle-switch">
                <input type="checkbox" id="is_publish" name="is_publish">
                <span class="slider"></span>
            </label>

            <button type="submit" class="py-2 px-3 bg-gray-500 rounded-md">Submit</button>
        </form>



        @if ($sliders->isEmpty())
            <p>No sliders available.</p>
        @else
            <div class="flex justify-evenly text-white flex-row">
                @foreach ($sliders as $slider)
                    <div class="">
                        <h2>{{ $slider->name_img }}</h2>
                        @if ($slider->img)
                            <img src="{{ asset('uploads/' . $slider->img) }}" alt="{{ $slider->name_img }}" class="w-10"
                                width="200">
                        @else
                            <p>No image available.</p>
                        @endif

                        <form action="{{ route('testZone.toggle', $slider->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                        </form>

                        <a class="py-2 px-3 bg-gray-500 rounded-md"
                            href="{{ route('testZone.edit', $slider->id) }}">Edit</a>

                        <form action="{{ route('testZone.destroy', $slider->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="py-2 px-3 bg-gray-500 rounded-md" type="submit"
                                onclick="return confirm('Are you sure you want to delete this slider?');">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="text-white">
                <div class="flex flex-wrap gap-3">

                    @foreach ($sliders as $photo)
                        <div class="gap-4 flex flex-row">
                            <img src="{{ $photo->url }}" alt="{{ $photo->name }}">
                            <form action="{{ route('publish.brands', $photo->id) }}" method="POST">
                                @csrf
                                <button class="py-2 px-3 bg-gray-600 gap-4 flex rounded-md" type="submit">
                                    {{ $photo->is_publish ? 'Unpublish' : 'Publish' }} {{ $photo->name_img }}
                                </button>
                            </form>

                        </div>
                    @endforeach
                    @foreach ($photos as $photo)
                        @if ($photo->is_publish)
                            <div class="gap-4 flex flex-row">
                                <img style="width: 50px" class="object-contain bg-white rounded-md "
                                    src="{{ asset('uploads/' . $photo->img) }}" alt="{{ $photo->name }}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </body>
@endsection


</html>
