<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a><i class="fa-solid fa-tags"></i> {{ __('Kategori') }}</a></li>
        </ol>
    </x-slot>

    <div class="row py-12 mt-12">
        <div class="col-12">
            <div class="card">

                @if(Session::has('status'))
                    <div class="alert text-center alert-success">
                        {{ Session::get('status') }}
                        @php
                            Session::forget('status');
                        @endphp
                    </div>
                @endif

                <div class="card-header justify-between">
                    <div class="btn-group" id="action_id" style="display: none" >
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" id="deleteSelectedItem" href="#">Hapus Kategori yang dipilih</a>
{{--                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>--}}
                        </div>
                    </div>

                    <form class="mr-3 ml-0 pr-0">
                        <div class="input-group">
                            <label style="margin-bottom: 0; margin-top: 2px; margin-left: 5px;">
                                <input type="text" class="form-control" placeholder="Cari Kategori">
                            </label>
                            <div style="margin-top: 2px;" class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="card-header-form">
                        <a href="{{route('category.create')}}" class="btn btn-icon icon-left btn-primary ">
                            <i class="fas fa-cart-plus"></i> Tambah Kategori</a>
                    </div>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="mytable table-striped p-0">
                            <thead>
                            @if ($listcategories->count())
                            <tr style="height: 60px; background: #ffffff; color: #858585;">
                                <th colspan="1" class="pl-4">
                                    <label>
                                        <input
                                            name="checkedAll"
                                            id="checkedAll"
                                            type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        &nbsp;Pilih Kategori untuk melakukan aksi
                                    </label>
                                </th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($listcategories as $listcategory)
                                    <tr id="cid{{$listcategory->id}}">
                                        <td style="width: 30%"  class="td p-0 pl-4 pb-2 text-center">
                                            <div class="custom-control-child">
                                                <label class="float-left">
                                                    <input name="ids"
                                                           id="checkSingle"
                                                           type="checkbox"
                                                           class="checkSingle rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                           value="{{ $listcategory -> id }}">
                                                </label>
                                                <img style="display: block; margin-left: auto; margin-right: auto;" class="img c-thumb" alt="image"
                                                     data-toggle="tooltip" title=""  src="{{ asset("storage/category-image")."/".$listcategory->image }}">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-success">{{ $listcategory->name }}</div>
                                        </td>
                                        <td class="text-center">
                                            {{ "#".number_format($listcategory->id) }}
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-success">{{ $listcategory->slug }}</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('category/edit').'/'.$listcategory->id }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger delete"
                                               data-toggle="modal"
                                               data-target="#deleteModal"
                                               data-category_id="{{$listcategory->id}}"><i class="fas fa-times"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <img class="max-w-3xl max-h-52 mx-auto" src="{{ asset('assets/empty-category.jpg') }}" alt="empty-category">
                                        <p class="text-center text-dark">Anda belum mempunyai Kategori.</p>
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
                        {{ $listcategories->firstItem() }}
                        -
                        {{ $listcategories->lastItem() }}
                        data dari
                        {{ $listcategories->total() }}
                        total kategori.
                    </div>
                    <div class=float-right>
                        {{ $listcategories->links() }}
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
            <div class="modal-header">
            </div>
            <form action="#" method="post" id="delete_category_form">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5>Yakin, Kamu ingin menghapus kategori ini ?</h5>
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
                url:"{{route('category.deleteSelectedCategory')}}",
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
            let id = $(this).data('category_id');
            $('#delete_category_form').attr('action', '/category/' + id);
        });

        $('table').on('change', ':checkbox', function() {
            $('#action_id').toggle(!!$('input:checkbox:checked').length);
        });

    });

</script>
