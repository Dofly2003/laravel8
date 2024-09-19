        <!-- README -->
        <!-- Controller = HomeController -->

        @extends('layout.main')

        @section('container')

            <div class="py-5 h-screen bg-slate-800">
                <h1 class="p-5 text-2xl text-gray-300">This Is a Customers</h1>
                <div class="pt-10 w-full h-full overflow-hidden flex justify-center ">
                    <div class="gap-4 grid grid-cols-2  sm:grid-cols-3 md:grid-col-4 lg:grid-cols-4 xl:grid-cols-6 ">

                        @forelse ($customers as $product)
                            @if ($product->is_publish)
                                <div
                                    class="lg:w-48 w-40 max-w-xs h-40 lg:h-48 overflow-hidden transform transition-transform bg-gray-500 shadow-xl flex justify-center items-center rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                                    <a href="/product/{{ $product->slug }}">
                                        <div class="h-full ">
                                            @if (!empty($product->img))
                                                <img src="{{ asset('uploads/' . $product->img) }}" alt="{{ $product->name }}"
                                                    class=" object-contain w-36 rounded-xl ">
                                            @else
                                                <img src="https://p7.hiclipart.com/preview/696/451/637/computer-icons-inventory-business-management-warehouse-warehouse.jpg"
                                                    alt="Default Image" class="w-full  h-auto">
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @empty
                            <div class="h-screen flex justify-center w-screen">
                                <p class="font-semibold  text-white text-xl overflow-hidden w-11/12 flex justify-center">Customer Not
                                    Found</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>


        @endsection
