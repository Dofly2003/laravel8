@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Profile</h1>

        <div class="text-xl py-4 text-white">
            <a href="{{ route('Admin.profil.create') }}"
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracdateking-wider">Status
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-white flex justify-end uppercase tracking-wider">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($code as $item)
                        <tr id="slide-row-{{ $item->id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 slide-name"
                                id="name-{{ $item->id }}">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">
                                {{ $item->is_publish ? 'Active' : 'Nonactive' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex justify-end  text-sm font-medium">
                                <form action="{{ route('Admin.profil.destroy', $item->id) }}" method="POST"
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
                                <form action="{{ route('publish.profil', $item->id) }}" method="POST">
                                    @csrf
                                    <button onclick="toggleHide({{ $item->id }})"
                                        class="text-sm text-blue-600 hover:text-blue-900" type="submit">
                                        @if ($item->is_publish)
                                        <i class="fa-solid fa-eye-slash text-red-600"></i>
                                        @else
                                            <i class="fa-solid text-green-600 fa-eye"></i>
                                        @endif
                                    </button>
                                </form>
                                <span class="mx-2">|</span>
                                <a href="{{ route('Admin.profil.show', $item->id) }}">
                                    <button onclick="toggleHide({{ $item->id }})"
                                        class="text-sm hover:text-gray-900 text-gray-800 " type="submit">
                                        <i class="fa-solid  fa-up-right-and-down-left-from-center"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
        </table>
        <div class="py-4 flex justify-center">
            @if ($code instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $code->links() }}
            @endif
        </div>
    </div>

    <script>
        
    </script>
@endsection
