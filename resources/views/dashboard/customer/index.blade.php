<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a><i class="fas fa-fire"></i> {{ __('Dashboard') }}</a></li>
        </ol>
    </x-slot>

    <div class="row my-12 pt-12 pb-72">
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-dolly-flatbed"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pesanan Saya</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_orders }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pesanan Dikonfirmasi</h4>
                    </div>
                    <div class="card-body">
                        {{ $order_confirmed }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pesanan Belum Dikonfirmasi</h4>
                    </div>
                    <div class="card-body">
                        {{ $order_pending }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pesanan Ditolak</h4>
                    </div>
                    <div class="card-body">
                        {{ $order_rejected }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
