<!DOCTYPE html>
<html lang="en">
{{-- @extends('layout.main')
@section('container') --}}

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

        <form action="{{ route('testZone.store') }}" method="POST" enctype="multipart/form-data">
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

            <button type="submit">Submit</button>
        </form>



        @if ($sliders->isEmpty())
            <p>No sliders available.</p>
        @else
            <div class="flex justify-evenly text-white flex-row">
                @foreach ($sliders as $slider)
                    <div class="">
                        <h2>{{ $slider->name_img }}</h2>
                        @if ($slider->img)
                            <img src="{{ asset('uploads/' . $slider->img) }}" alt="{{ $slider->name_img }}" width="200">
                        @else
                            <p>No image available.</p>
                        @endif

                        <form action="{{ route('testZone.toggle', $slider->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <label class="toggle-switch">
                                <input type="checkbox" name="is_publish" onchange="this.form.submit()"
                                    {{ $slider->is_publish ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </form>

                        <a href="{{ route('testZone.edit', $slider->id) }}">Edit</a>

                        <form action="{{ route('testZone.destroy', $slider->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this slider?');">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="text-white">
{{-- 
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @foreach ($sliders as $photo)
                <div class="photo-item">
                    @if ($photo->is_publish)
                        <img class="w-44" src="{{ asset('uploads/' . $photo->img) }}" alt="{{ $photo->name_img }}" class="photo-image">
                    @endif
            
                    <form action="{{ route('photos.publish', $photo->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn {{ $photo->is_publish ? 'btn-danger' : 'btn-success' }}">
                            {{ $photo->is_publish ? 'Unpublish' : 'Publish' }}
                        </button>
                    </form>                        
                </div>
            @endforeach --}}
            </div>
        @endif
    </body>
{{-- @endsection --}}


</html>
