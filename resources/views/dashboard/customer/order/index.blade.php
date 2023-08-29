<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a><i class="fas fa-stream"></i> {{ __('Pesanan Saya') }}</a></li>
        </ol>
    </x-slot>

    <div class="container-lg">
        <div class="row py-12 mt-12">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="mx-auto">Pesanan Saya</h3>
                </div>

                @if(Session::has('success'))
                    <div class="alert text-center alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="mytable table-striped p-0">
                            <thead>
                            <tr style="height: 60px; background: #ffffff; color: #858585;">
                                <th class="text-center">Invoice</th>
                                <th class="text-center">Waktu Pemesanan</th>
                                <th class="text-center">Total Tagihan</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $item)
                                    <tr>
                                        <td class="text-center">{{ $item -> tracking_no }}</td>
                                        <td class="text-center">{{ $item -> created_at -> format('d/m/y-H:i:s') }}</td>
                                        <td class="text-center">@currency($item -> total_price)</td>
                                        <td class="text-center">
                                            @if($item -> status == '0')
                                                <p>Menunggu Konfirmasi</p>
                                            @elseif($item -> status == '1')
                                                <p>Pesanan Dikonfirmasi</p>
                                            @else($item -> status == '2')
                                                <p>Pesanan Ditolak</p>
                                            @endif
                                        </td>
                                        <td class="text-center py-3">
                                            <a href="{{ url('order/detail/'.$item->id) }}" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
   {{--             <div class="card-footer">
                    footer
                </div>--}}
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

