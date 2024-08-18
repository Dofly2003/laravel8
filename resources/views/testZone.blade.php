@extends('layout.main')

{{-- $request->all(); --}}
@section('container')
    <div class="text-white p-10 ">
        <a href="/" class="p-4 hover:text-gray-700 hover:bg-gray-200 ease-in-out duration-300 rounded-xl bg-gray-700  ">LogOut  </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="pr-2 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->name_product }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->slug }}
                        </td>
                        <td class="py-4">
                            {{ $product->description }}
                        </td>
                        @foreach ($product->kategori_product as $kategori)
                            <td class="flex">
                                <li>{{ $kategori->name_kategori }}</li>
                            </td>
                        @endforeach

                        <td class="py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
