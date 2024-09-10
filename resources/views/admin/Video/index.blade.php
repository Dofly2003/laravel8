@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Slides</h1>

        <div class="text-xl py-4 text-white">
            <a href="{{ route('Admin.slider.create') }}"
                class="bg-blue-600 py-2 px-3 rounded-xl hover:bg-blue-700 text-white duration-300 ease-in-out">
                Create
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-red-400">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Vid</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($videos as $item)
                        <tr id="slide-row-{{ $item->id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 slide-name"
                                id="name-{{ $item->id }}">{{ $item->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-4/5 max-w-md aspect-w-15  aspect-h-9">
                                    <iframe 
                                        class=""
                                        src="https://www.youtube.com/embed/{{ $item->youtube_url }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">
                                {{ $item->is_publish ? 'Active' : 'Nonactive' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex text-sm font-medium">
                                <form action="{{ route('Admin.sliders.destroy', $item->id) }}" method="POST"
                                    class="flex items-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this slider?');"
                                        class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                                <span class="mx-2">|</span>
                                {{-- <button class="text-sm text-blue-600 hover:text-blue-900"
                                    onclick="toggleHide({{ $item->id }})">Hide</button> --}}

                                <form action="{{ route('publish.videos', $item->id) }}" method="POST">
                                    @csrf
                                    <button onclick="toggleHide({{ $item->id }})"
                                        class="text-sm text-blue-600
                                        hover:text-blue-900"
                                        type="submit">
                                        {{ $item->is_publish ? 'Unpublish' : 'Publish' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </table>
@endsection
