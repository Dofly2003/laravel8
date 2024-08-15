@extends('layout.main')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@section('container')
    <div class="w-full flex justify-center ">
        <div class="xl:w-1/3">
            <form class="space-y-6 bg-blue-800 py-10 px-10 rounded-xl" action="/products" method="POST">
                @csrf
                <div>
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                    <div class="mt-2">
                        <input id="nama" name="Nama" type="text" autocomplete="none" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                    <div class="mt-2">
                        <input id="slug" name="slug" type="text" autocomplete="none" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                {{-- <div>
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">image</label>
                    <div class="mt-2">
                        <input id="image" name="image" type="text" autocomplete="none" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div> --}}

                <div>
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                    <div class="mt-2">
                        <select id="kategori" name="kategori" multiple="multiple"
                            class="bg-gray-50 js-example-basic-multiple border states[] border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @foreach ($products as $item)
                                @foreach ($item->kategori_product as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->name_kategori }}</option>
                                @endforeach
                            @endforeach
                        </select>
                        {{-- <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>

                          </select> --}}
                    </div>
                </div>

                <div class="mt-4">
                    <label for="Deskripsi" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
                    <input id="Deskripsi" type="hidden" name="deskripsi">
                    <trix-editor input="Deskripsi"></trix-editor>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create
                    </button>
                </div>
            </form>

            <div>
                @foreach ($products as $product)
                    <div class="flex flex-row max-w-xl bg-white gap-5">
                        <h3 class="">Nama: {{ $product->name_product }}</h3>
                        <div class="flex flex-row max-w-xs gap-2">
                            <p> Deskripsi: {{ $product->description }}</p>
                            <ul>
                                @foreach ($product->kategori_product as $kategori)
                                    <li class="">Kategori :{{ $kategori->name_kategori }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                {{-- @dd($products->kategori_product) --}}
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
