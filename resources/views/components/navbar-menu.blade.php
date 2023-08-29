<!-- Navbar -->
<nav class="navbar navbar-expand-lg py-0 my-0 navbar-primary">
    <div class="container px-0">
        <div class="d-flex flex-grow-1">
            <div class="navbar-brand p-0 my-auto text-white rounded-lg text-center">
                <a href="{{url('/')}}"><img src="{{ asset('storage/assets/mp.png') }}" class="navbrand-img" alt="hn"></a>
                <span class="navbrand-text"><a href="{{ url('/') }}">MebelPepak</a></span>
            </div>

                <form action="{{ url('searchProduct') }}" method="POST" name="product_name" class="my-auto d-inline-block search-main pr-2">
                    @csrf
                    <div class="input-group mt-0">
                        <input id="search_product" name="product_name" type="search" required class="form-control border border-right-0" placeholder="Cari...">
                        <span class="input-group-append">
                            <button class="search-btn btn btn-outline-dark border border-left-0" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                @if(Route::has('login'))
                    @auth()
                        @if(Auth::check() && Auth::user()->level == 0)
                            <a href="{{ url('cart') }}" class="navright-item nav-link d-flex flex-column text-white rounded-lg flex-column text-center">
                                <span>
                                    <img src="{{asset('storage/assets/icon_cart/android-chrome-192x192.png')}}" alt="">
                                </span>
                                <span style="
                                padding-right: 0.5em;
                                padding-left: 0.5em;
                                border-radius: 5rem;
                                margin-top: -50px;
                                margin-left: 20px;
                                font-size: 10px;"
                                      class="relative badge badge-pill badge-pill-custom bg-danger cart-count">0</span>
                            </a>
                        @endif
                        <!-- Profile -->
                        <div class="inline-block my-auto pl-2 pt-2.5 navright-item">
                            <x-jet-dropdown class="dropdownprofile text-white" align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                            <img class="h-8 w-8 mr-1.5 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            <div class="ml-0.5 mr-1 my-auto"><i class="fas fa-caret-down"></i></div>
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2">
                                            {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                    @endif
                                </x-slot>
                                <x-slot name="content">
                                    <div class="text-gray-300">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs">
                                            Halo ,
                                            <div class="text-lg font-bold font-thin">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>

                                        <div class="border-t border-gray-100 mx-1"></div>

                                        @if(Auth::check() && Auth::user()->level == 0)
                                            <x-jet-dropdown-link href="{{ url('customer/account') }}"
                                                                 style="text-decoration: none; font-weight: bold;"
                                                                 class="profilehome">
                                                <i class="fas fa-user-cog">&emsp;</i>
                                                {{ __('Dashboard') }}
                                            </x-jet-dropdown-link>
                                        @else
                                            <x-jet-dropdown-link href="{{ url('admin/dashboard') }}"
                                                                 class="text-decoration-none font-bold">
                                                <i class="fas fa-user-cog">&emsp;</i>{{ __('Dashboard') }}
                                            </x-jet-dropdown-link>
                                        @endif

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                 onclick="event.preventDefault();
                                                                 this.closest('form').submit();"
                                                                 class="text-decoration-none font-bold">
                                                <i class="fas fa-sign-out-alt">&emsp;&nbsp;</i>{{ __('Logout') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @else
                    <!-- account toggle -->
                        <div class="btn-auth-guest ml-3">

                            <div class="dropdown dropdownauth btn-auth-dropdownguest">
                                <div class="auth-option rounded-md">
                                    <a type="button" id="dropdownMenu" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right text-center">

                                        <a href="{{ route('login') }}" class="w-full btn-a">
                                            <button class="blob-btn">Masuk
                                                <span class="blob-btn__inner">
                                                    <span class="blob-btn__blobs">
                                                        <span class="blob-btn__blob"></span>
                                                        <span class="blob-btn__blob"></span>
                                                        <span class="blob-btn__blob"></span>
                                                    </span>
                                                </span>
                                            </button>
                                        </a>

                                        <a href="{{ route('register') }}" class="w-full btn-a">
                                            <button class="blob-btn">Mendaftar
                                                <span class="blob-btn__inner">
                                                    <span class="blob-btn__blobs">
                                                        <span class="blob-btn__blob"></span>
                                                        <span class="blob-btn__blob"></span>
                                                        <span class="blob-btn__blob"></span>
                                                    </span>
                                                </span>
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <span class="navbrand-text">
                                    <a href="{{ route('login') }}" class="w-full btn-a">
                                        <button class="blob-btn">
                                            Masuk
                                            <span class="blob-btn__inner">
                                              <span class="blob-btn__blobs">
                                                <span class="blob-btn__blob"></span>
                                                <span class="blob-btn__blob"></span>
                                                <span class="blob-btn__blob"></span>
                                              </span>
                                            </span>
                                        </button>
                                    </a>
                            </span>

                            <div class="py-1 px-1 pemisahauth">
                                <div class="border-t border-transparent"></div>
                            </div>

                            <span class="navbrand-text">
                                <a href="{{ route('register') }}" class="w-full btn-a">
                                    <button class="blob-btn">
                                        Mendaftar
                                        <span class="blob-btn__inner">
                                          <span class="blob-btn__blobs">
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                          </span>
                                        </span>
                                    </button>
                                </a>
                            </span>
                        </div>
                    @endauth
                @endif
        </div>
    </div>
</nav>
