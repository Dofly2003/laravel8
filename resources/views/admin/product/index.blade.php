@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Product</h1>

        <div class="text-xl py-4 text-white">
            <a href="{{ route('Admin.product.create') }}"
                class="bg-blue-600 py-2 px-3 rounded-xl hover:bg-blue-700 text-white duration-300 ease-in-out">
                Create
            </a>
            <form class="max-w-screen-sm mx-auto">
                @if (request('kategori'))
                    <input type="hidden" id="search" name="kategori" value="{{ request('kategori') }}">
                @endif
                <div class="flex items-stretch justify-center">
                    <label for="search-dropdown" class="sr-only">Search</label>
                    <!-- Search Input -->
                    <div class="relative w-1/2 lg:w-full">
                        <input type="search" name="search" id="search-dropdown" placeholder="Search..."
                            class="block p-2 lg:w-full w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-xl  border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            value="{{ request('search') }}" />
    
                        <!-- Search Button -->
                        <button type="submit"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full items-center justify-center  text-white bg-blue-700 rounded-r-xl border w-14 border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 flex" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-red-400">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Img</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $item)
                        <tr id="slide-row-{{ $item->id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 slide-name"
                                id="name-{{ $item->id }}">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 slide-name"
                                id="name-{{ $item->id }}">{{ $item->slug }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($item->img)
                                        <img class="h-10 rounded-md object-contain" src="{{ asset('uploads/' . $item->img) }}"
                                             alt="{{ $item->name }}">
                                    @else
                                        <span class="text-sm text-gray-600">No Data</span>
                                    @endif
                                </td>
                                
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">
                                {{ $item->is_publish ? 'Active' : 'Nonactive' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex text-sm font-medium">
                                <a href="{{ route('Admin.product.edit', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-900">Edit</a>
                                <span class="mx-2">|</span>
                                <form action="{{ route('Admin.product.destroy', $item->id) }}" method="POST"
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

                                <form action="{{ route('publish.product', $item->id) }}" method="POST">
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
            </table>
        </div>
    <div  class="py-4 flex justify-center">
        @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $products->links() }}
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
