<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none;" href="{{route('carousel.index')}}"><i class="fas fa-stream"></i> {{ __('Kategori') }}</a></li>
            <li class="breadcrumb-item active"><a><i class="fa-solid fa-pen-to-square"></i> {{ __('Edit Kategori') }}</a></li>
        </ol>
    </x-slot>

    <div class="pt-12 mt-12">

        <div class="row edit-carousel">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mx-auto" style="color: #ff5959">Ubah Carousel {{ $carousel->name }}</h4>
                    </div>
                    <form method="POST" action="{{ url('update-carousel').'/'.$carousel->id }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kategori</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" value="{{ $carousel->name }}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Carousel</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="link_carousel" value="{{ $carousel->link_carousel }}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                <div class="col-sm-12 col-md-7">
                                    <input hidden type="file" name="image" id="carousel-image"><br />
                                    <div id="image-preview">
                                        @if($carousel->image)
                                            <img id="imgsrc" src="{{ asset("storage/carousel-image")."/".$carousel->image }}" class="caro-thumb w-full" alt="carousel-image">
                                        @endif
                                    </div>
                                    <label class="choosefile-caro" for="carousel-image" id="image-label">Pilih Foto</label>
                                    <input type="hidden" name="files_selected" id="files_selected" />
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn float-right text-white" style="background: #ff6b6b">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    function del(index) {
        $('div.img_'+index).remove();
        updateFiles();
    }

    function updateFiles() {
        var fileIndexes = $('#image-preview > div').map(function() {
            return $(this).data('index');
        }).get().join(",");
        $('#files_selected').val(fileIndexes);
    }

    $(document).ready(function() {
        $("#carousel-image").on('change', function() {
            var fileList = this.files;
            $('#image-preview').empty();
            for (var i = 0; i < fileList.length; i++) {
                var t = window.URL || window.webkitURL;
                var objectUrl = t.createObjectURL(fileList[i]);
                $('.removeimg').fadeIn();
                $('#image-preview').append('<div data-index="' + i + '" class="img_' + i + '"><span class="img_' + i + '" onclick="del(' + i + ')" style="cursor:pointer;"></span><img class="img_ caro-thumb rounded-md ml-0' + i + '" src="' + objectUrl + '" width="160" height="160"></div>');
                j = i + 1;
                if (j % 3 == 0) {
                    $('#image-preview').append('<br>');
                }
            }
            updateFiles();
        });
    });
</script>
