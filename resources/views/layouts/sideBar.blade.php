<div class="sticky top-0 w-64 h-screen bg-gray-800 text-white p-6 flex flex-col justify-around">
    <div>
        <h2 class="text-xl font-semibold mb-5">Selamat datang {{ Auth::user()->name }}</h2>
        <ul>
            <li class="mb-4"><a href="{{ route('dashboard') }}" class="text-lg text-white hover:text-gray-300"> <i
                        class="fas fa-home text-xl mr-2"></i>Dashboard</a></li>
            <li class="mb-4"><a href="{{ route('Admin.slider.index') }}"
                    class="text-lg text-white hover:text-gray-300"><i class="fas fa-images text-xl mr-2"></i>Slide </a>
            </li>
            <li class="mb-4"><a href="{{ route('Admin.product.index') }}"
                    class="text-lg text-white hover:text-gray-300"><i
                        class="fas fa-box-open text-xl mr-2"></i>Products</a></li>
            <li class="mb-4"><a href="{{ route('Admin.kategori.index') }}"
                    class="text-lg text-white hover:text-gray-300"><i
                        class="fa-solid fa-book text-xl mr-2"></i>Kategori</a></li>
            <li class="mb-4"><a href="{{ route('Admin.video.showVideos') }}"
                    class="text-lg text-white hover:text-gray-300"><i class="fas fa-film text-xl mr-2"></i>Video</a>
            </li>
            <li class="mb-4"><a href="{{ route('Admin.brand.index') }}"
                    class="text-lg text-white hover:text-gray-300"><i class="fas fa-tag text-xl mr-2"></i>Brand</a></li>
            <li class="mb-4"><a href="{{ route('Admin.customer.index') }}"
                    class="text-lg text-white hover:text-gray-300"><i
                        class="fas fa-handshake text-xl mr-2"></i>Kerjasama</a></li>
        </ul>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left text-base hover:text-gray-300 flex items-center">
            <i class="fas fa-sign-out-alt text-xl mr-4"></i>
            <span>Logout</span>
        </button>
    </form>
    @guest
        @if (Route::has('login'))
            <li>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">{{ __('Register') }}</a>
            </li>
        @endif
    @else
    @endguest
    </div>
