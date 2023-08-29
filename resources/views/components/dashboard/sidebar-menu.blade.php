<!-- Sidebar -->
<div class="main-sidebar position-fixed">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{url('/')}}"><img alt="image" src="{{ asset('assets/mp.png') }}" class="w-20 p-1 pt-3 pb-0 mx-auto mb-0"></a>
            <a href="{{url('/')}}" class="brandname">Mebel Pepak</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{url('/')}}"><img alt="image" src="{{ asset('assets/mp.png') }}" class="p-1 pt-3"></a>
        </div>
        <div class="border-t border-gray-100 mt-2"></div>
        <ul class="sidebar-menu">
            @if(auth()->user()->level==0)
                <li class="nav-item {{ Request::is('customer/account') ? 'active' : '' }}"><a class="nav-link " href="{{url('customer/account')}}"><i class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a></li>
                <li class="nav-item {{ Request::is('order*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('myOrder') }}"><i class="fas fa-exchange-alt"></i><span>Pesanan Saya</span></a></li>
                <li class="nav-item {{ Request::is('user/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('profile.show') }}"><i class="fas fa-cog"></i><span>Pengaturan</span></a></li>
            @elseif(auth()->user()->level==1)
                <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link " href="{{url('admin/dashboard')}}"><i class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a></li>
                <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}"><a class="nav-link" href="{{route('products.index')}}"><i class="fas fa-stream"></i><span>Produk</span></a></li>
                <li class="nav-item {{ Request::is('category*') ? 'active' : '' }}"><a class="nav-link" href="{{route('category.index')}}"><i class="fas fa-tags"></i><span>Kategori</span></a></li>
                <li class="nav-item {{ Request::is('carousel*') ? 'active' : '' }}"><a class="nav-link" href="{{route('carousel.index')}}"><i class="fas fa-percent"></i><span>Carousel</span></a></li>
                <li class="nav-item dropdown {{ Request::is('transaction*') ? 'active' : '' }}">
                    <a href="{{ url('transaction') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-exchange-alt"></i><span>Transaksi</span></a>
                    <ul class="dropdown-menu ">
                        <li><a class="nav-link" href="{{ url('transaction') }}">Pesanan Masuk</a></li>
                        <li><a class="nav-link" href="{{ route('confirmedTrans') }}">Dikonfirmasi</a></li>
                        <li><a class="nav-link" href="{{ route('rejectedTrans') }}">Ditolak</a></li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}"><a class="nav-link" href="{{route('users.index')}}"><i class="fas fa-users"></i><span>Pengguna</span></a></li>
                <li class="nav-item {{ Request::is('user/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('profile.show') }}"><i class="fas fa-cog"></i><span>Pengaturan</span></a></li>
            @elseif(auth()->user()->level==2)
                <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link " href="{{url('admin/dashboard')}}"><i class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a></li>
                <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}"><a class="nav-link" href="{{route('products.index')}}"><i class="fas fa-stream"></i><span>Produk</span></a></li>
                <li class="nav-item {{ Request::is('category*') ? 'active' : '' }}"><a class="nav-link" href="{{route('category.index')}}"><i class="fas fa-tags"></i><span>Kategori</span></a></li>
                <li class="nav-item {{ Request::is('carousel*') ? 'active' : '' }}"><a class="nav-link" href="{{route('carousel.index')}}"><i class="fas fa-percent"></i><span>Carousel</span></a></li>
                <li class="nav-item dropdown {{ Request::is('transaction*') ? 'active' : '' }}">
                    <a href="{{ url('transaction') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-exchange-alt"></i><span>Transaksi</span></a>
                    <ul class="dropdown-menu ">
                        <li><a class="nav-link" href="{{ url('transaction') }}">Pesanan Masuk</a></li>
                        <li><a class="nav-link" href="{{ route('confirmedTrans') }}">Dikonfirmasi</a></li>
                        <li><a class="nav-link" href="{{ route('rejectedTrans') }}">Ditolak</a></li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('user/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('profile.show') }}"><i class="fas fa-cog"></i><span>Pengaturan</span></a></li>
            @endif
        </ul>
    </aside>
</div>
