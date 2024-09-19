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
                <thead class="bg-dark">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Img</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracdateking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white flex justify-end uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($slides as $slide)
                        <tr id="slide-row-{{ $slide->id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 slide-name"
                                id="name-{{ $slide->id }}">{{ $slide->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="h-10 rounded-md object-contain" src="{{ asset('uploads/' . $slide->img) }}"
                                    alt="{{ $slide->name }}">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">
                                {{ $slide->is_publish ? 'Active' : 'Nonactive' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex justify-end  text-sm font-medium">
                                <a href="{{ route('Admin.sliders.edit', $slide->id) }}"
                                    class="text-blue-600 hover:text-blue-900">
                                    <img src="{{ asset('img/edit-svgrepo-com.svg') }}" style="display: inline-block; width: 30px; height: 30px;" class="w-5" alt="Trash">
                                </a>
                                <span class="mx-2">|</span>
                                <form action="{{ route('Admin.sliders.destroy', $slide->id) }}" method="POST"
                                    class="flex items-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this slider?');"
                                        class="text-red-600 hover:text-red-800">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                                <span class="mx-2">|</span>
                                <form action="{{ route('publish.slider', $slide->id) }}" method="POST">
                                    @csrf
                                    <button onclick="toggleHide({{ $slide->id }})"
                                        class="text-sm text-blue-600 hover:text-blue-900" type="submit">
                                        @if ($slide->is_publish)
                                            <img src="{{ asset('img/eye-slash-svgrepo-com.svg') }}"
                                                class="bg-green-300 rounded-3xl" alt="Publish"
                                                style="display: inline-block; width: 20px; height: 20px;">
                                        @else
                                            <img src="{{ asset('img/eye-svgrepo-com.svg') }}"
                                                class="bg-red-300 rounded-3xl" alt="Unpublish"
                                                style="display: inline-block; width: 20px; height: 20px;">
                                        @endif
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
        </table>
        <div class="py-4 flex justify-center">
            @if ($slides instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $slides->links() }}
            @endif
        </div>
    </div>

    <script>
        function toggleHide(id) {
            const nameElement = document.getElementById(`name-${id}`);

            // Toggle strikethrough and red text color
            if (nameElement.classList.contains('line-through')) {
                nameElement.classList.remove('line-through', 'text-red-500');
            } else {
                nameElement.classList.add('line-through', 'text-red-500');
            }
        }
    </script>
@endsection
