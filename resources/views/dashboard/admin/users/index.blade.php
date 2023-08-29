<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a><i class="fas fa-stream"></i> {{ __('Pengguna') }}</a></li>
        </ol>
    </x-slot>

    <div class="row py-12 mt-12">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4>Admin</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="mytable table-striped p-0">
                            <thead>
                            <tr style="height: 60px; background: #ffffff; color: #858585;">
                                <th class="text-center">Nama</th>
                                <th class="text-center">Peran</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listusers as $user)
                                @if( $user->level==2)
                                    <tr>
                                        <td style="width: 40%;" class="text-center">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <img class="h-10 w-10 mt-2 rounded-full mr-auto ml-auto" src="{{ $user -> profile_photo_url }}"
                                                     alt="{{ $user -> name }}"/>
                                            @else
                                                <span class="rounded-md my-auto">
                                                {{ $user -> name }}
                                                      <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                           viewBox="0 0 20 20" fill="currentColor">
                                                          <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"/>
                                                      </svg>
                                                </span>
                                            @endif
                                            {{ $user -> name }}
                                        </td>
                                        <td style="width: 40%;" class="text-center">
                                            <div class="media-cta">
                                                <form method="POST" action="{{ url('update-level-user/'.$user -> id) }}">
                                                    @csrf
                                                    <select class="form-select rounded-md" name="level_user" id="status_trans">
                                                        <option {{ $user -> level == '0' ? 'selected' : "" }} value="0">Pelanggan</option>
                                                        <option {{ $user -> level == '2' ? 'selected' : "" }} value="2">Admin</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td style="width: 20%;" class="text-center">
                                            <a href="#" class="btn btn-danger delete"
                                               data-toggle="modal"
                                               data-target="#deleteModal"
                                               data-productid="{{$user->id}}"><i class="fas fa-times"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{--<div class="float-left" style="vertical-align: center;">
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
                    </div>--}}
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Pelanggan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="mytable table-striped p-0">
                            <thead>
                            <tr style="height: 60px; background: #ffffff; color: #858585;">
                                <th class="text-center">Nama</th>
                                <th class="text-center">Peran</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listusers as $user)
                                @if( $user->level==0)
                                <tr>
                                    <td style="width: 40%;" class="text-center">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <img class="h-10 w-10 mt-2 rounded-full mr-auto ml-auto" src="{{ $user -> profile_photo_url }}"
                                                 alt="{{ $user -> name }}"/>
                                        @else
                                            <span class="rounded-md my-auto">
                                                {{ $user -> name }}
                                                      <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                           viewBox="0 0 20 20" fill="currentColor">
                                                          <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"/>
                                                      </svg>
                                                </span>
                                        @endif
                                        {{ $user -> name }}
                                    </td>
                                    <td style="width: 40%;" class="text-center">
                                        <div class="media-cta">
                                            <form method="POST" action="{{ url('update-level-user/'.$user -> id) }}">
                                                @csrf
                                                <select class="form-select rounded-md" name="level_user" id="status_trans">
                                                    <option {{ $user -> level == '0' ? 'selected' : "" }} value="0">Pelanggan</option>
                                                    <option {{ $user -> level == '2' ? 'selected' : "" }} value="2">Admin</option>
                                                </select>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td style="width: 20%;" class="text-center">
                                        <a href="#" class="btn btn-danger delete"
                                           data-toggle="modal"
                                           data-target="#deleteModal"
                                           data-user_id="{{$user->id}}"><i class="fas fa-times"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{--<div class="float-left" style="vertical-align: center;">
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
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Delete Warning Modal -->
<div class="modal fade show" tabindex="-1" role="dialog" id="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="#" method="post" id="delete_user_form">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5>Yakin , Kamu ingin menghapus Pengguna ini ?</h5>
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
    $(document).on('click','.delete',function(){
        let id = $(this).data('user_id');
        $('#delete_user_form').attr('action', '/users/' + id);
    });
</script>
