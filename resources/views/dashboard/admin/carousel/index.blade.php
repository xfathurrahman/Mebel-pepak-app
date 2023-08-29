<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a><i class="fas fa-stream"></i> {{ __('Carousel') }}</a></li>
        </ol>
    </x-slot>

    <div class="row py-12 mt-12">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-end">
                    <div class="btn-group" id="action_id" style="display: none" >
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" id="deleteSelectedItem" href="#">Hapus Carousel yang dipilih</a>
                        </div>
                    </div>

                    <div class="card-header-form">
                        <a href="{{route('carousel.create')}}" class="btn btn-icon icon-left btn-primary ">
                            <i class="fas fa-cart-plus"></i> Tambah Carousel</a>
                    </div>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="mytable table-striped p-0">
                            <thead>
                            @if ($listcarousels->count())
                            <tr style="height: 60px; background: #ffffff; color: #858585;">
                                <th colspan="1" class="pl-4">
                                    <label>
                                        <input
                                            name="checkedAll"
                                            id="checkedAll"
                                            type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        &nbsp;Pilih Carousel untuk melakukan aksi
                                    </label>
                                </th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($listcarousels as $carousel)
                                    <tr id="cid{{$carousel->id}}">
                                        <td style="width: 30%"  class="td p-0 pl-4 pb-2 text-center">
                                            <div class="flex-column-product custom-control-child">
                                                <label class="float-left">
                                                    <input name="ids"
                                                           id="checkSingle"
                                                           type="checkbox"
                                                           class="checkSingle rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                           value="{{ $carousel -> id }}">
                                                </label>
                                                <img class="block mx-auto img c-thumb-d" alt="image" data-toggle="tooltip" title=""  src="{{ asset("storage/carousel-image")."/".$carousel->image }}">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-success">{{ $carousel->name }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-success">#{{ $carousel->id }}</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('carousel/edit').'/'.$carousel->id }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger delete"
                                               data-toggle="modal"
                                               data-target="#deleteModal"
                                               data-carousel_id="{{$carousel->id}}"><i class="fas fa-times"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <img class="max-w-3xl max-h-52 mx-auto" src="{{ asset('storage/assets/carousel-empty.jpg') }}" alt="carousel kosong">
                                        <p class="text-center text-dark">Anda belum mempunyai Carousel.</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-left" style="vertical-align: center;">
                        Menampilkan
                        {{ $listcarousels->firstItem() }}
                        -
                        {{ $listcarousels->lastItem() }}
                        data dari
                        {{ $listcarousels->total() }}
                        total Carousel.
                    </div>
                    <div class=float-right>
                        {{ $listcarousels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Delete Warning Modal -->
<div class="modal fade show" tabindex="-1" role="dialog" id="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="#" method="post" id="delete_carousel_form">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5>Yakin , Kamu ingin menghapus Carousel ini ?</h5>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-undo"></i> Batal</button>
                    <button type="submit" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete Modal -->

<script>
    $(document).ready(function() {
        $("#checkedAll").change(function() {
            if (this.checked) {
                $(".checkSingle").each(function() {
                    this.checked=true;
                });
            } else {
                $(".checkSingle").each(function() {
                    this.checked=false;
                });
            }
        });

        $(".checkSingle").click(function () {
            if ($(this).is(":checked")) {
                let isAllChecked = 0;

                $(".checkSingle").each(function() {
                    if (!this.checked)
                        isAllChecked = 1;
                });

                if (isAllChecked === 0) {
                    $("#checkedAll").prop("checked", true);
                }
            }
            else {
                $("#checkedAll").prop("checked", false);
            }
        });

        $("#deleteSelectedItem").click(function (e){
            e.preventDefault();
            let allids = [];

            $("input:checkbox[name=ids]:checked").each(function (){
                allids.push($(this).val());
            })

            $.ajax({
                url:"{{route('carousel.deleteSelectedCarousel')}}",
                type:"DELETE",
                data:{
                    _token:$("input[name=_token]").val(),
                    ids:allids
                },
                success:function (response){
                    $.each(allids, function (key,val){
                        $("#cid"+val).remove();
                    })
                }
            });
        });

        $(document).on('click','.delete',function(){
            let id = $(this).data('carousel_id');
            $('#delete_carousel_form').attr('action', '/carousel/' + id);
        });

        $('table').on('change', ':checkbox', function() {
            $('#action_id').toggle(!!$('input:checkbox:checked').length);
        });

    });

</script>
