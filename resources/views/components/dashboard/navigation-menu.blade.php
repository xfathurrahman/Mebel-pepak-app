<!-- Navbar -->
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="section-header">
        @isset($header_content)
            {{ $header_content }}
        @else
            {{ __('Halaman') }}
        @endisset
    </div>
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" id="sidebar-toggle" data-toggle="sidebar" class="my-auto nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </form>
    <div class="navbar-nav navbar-right">
        <!-- Profile -->
        <div class="px-1.5 py-1 relative content-center">
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 mr-1.5 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                 alt="{{ Auth::user()->name }}"/>
                            <div class="ml-0.5 mr-1 my-auto"><i class="fas fa-angle-double-down"></i></div>
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                              <button type="button"
                                      class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                  {{ Auth::user()->name }}
                                  <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                       viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>
                                  </svg>
                              </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-200">
                        Halo ,
                        <div class="text-lg font-bold font-thin text-gray-200">
                            {{ Auth::user()->name }}
                        </div>
                    </div>

                    <div class="border-t border-gray-100 mx-1"></div>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            <i class="fas fa-fire">&emsp;{{ __('API Tokens') }}</i>
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
                </x-slot>
            </x-jet-dropdown>
        </div>
    </div>
</nav>
