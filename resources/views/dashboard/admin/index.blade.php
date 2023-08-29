<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a><i class="fas fa-fire"></i> {{ __('Dashboard') }}</a></li>
        </ol>
    </x-slot>

    <div class="row my-12 pt-12 pb-40">
        <div class="col-sm-12 col-lg-6 col-md-6 col-xl-4">
            <div class="card card-statistic-2 pb-3">
                <div class="card-stats">
                    <div class="card-stats-title text-center">Statistik Pesanan</div>
                    <hr class="mb-3.5">
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $pending }}</div>
                            <div class="card-stats-item-label">Tertunda</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{$confirm}}</div>
                            <div class="card-stats-item-label">Selesai</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{$reject}}</div>
                            <div class="card-stats-item-label">Ditolak</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 py-0">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pesanan</h4>
                        </div>
                        <div class="card-body">
                            {{ $order }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 col-md-6 col-xl-4">
            <div class="col-12 px-0">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            {{ $ttadmin }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 px-0">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Produk</h4>
                        </div>
                        <div class="card-body">
                            {{ $ttproduct }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 col-md-6 col-xl-4 justify-between">
            <div class="col-12 px-0">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Customer</h4>
                        </div>
                        <div class="card-body">
                            {{ $ttcustomer }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 px-0">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pendapatan</h4>
                        </div>
                        <div class="card-body">
                            @currency($balance)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


