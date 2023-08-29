<x-app-layout>
    <x-slot name="header_content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none;" href="{{route('products.index')}}"><i class="fas fa-stream"></i> {{ __('Produk') }}</a></li>
            <li class="breadcrumb-item active"><a><i class="fa-solid fa-pen-to-square"></i>{{ __('Edit Produk Detail') }}</a></li>
        </ol>
    </x-slot>

    <div class="py-12 form-upload">
        <form method="POST" action="{{ url('update-products').'/'.$products->id }}" name="form-example-1" id="form-example-1" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mx-auto">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="image-up-text-head-wrapper">
                                <h4>Upload Foto Produk</h4>
                                <span>Wajib</span>
                            </div>

                            <div class="tips bg-whitesmoke p-3 rounded-md">
                                <p class="mb-0">Format gambar .jpg .jpeg .png dan ukuran minimum 300 x 300px (Untuk gambar optimal gunakan ukuran minimum 700 x 700 px).<br>Pilih foto produk atau tarik dan letakkan hingga 5 foto sekaligus di sini.
                            </div>

                            <div class="input-field">
                                <div class="input-images-1"></div>

             {{--                   @if($products->images->image_path)
                                    <img id="imgsrc" src="{{ asset("storage/product-image")."/".$products->images->image_path }}" class="cate-thumb w-full" alt="product-image">
                                @endif
--}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-6">
                                    <label for="nama-produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                    <input value="{{ $products->name }}" type="text" name="name" id="nama-produk" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                                    @if($errors->has('name'))
                                        <span class="float-right text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="price" class="block text-sm font-medium text-gray-700">
                                        Harga
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">Rp</span>
                                        <input value="{{ $products->price }}" type="text" name="price" id="price" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" >
                                        @if($errors->has('price'))
                                            <span class="float-right text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description">{{ $products->description }}</textarea>
                                @if($errors->has('description'))
                                    <span class="float-right text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <select id="category" name="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach( $listcategories as $listcategory )
                                            @if($listcategory -> name == $products->categories->name)
                                                <option selected value="{{ $listcategory-> id }}">{{ $listcategory->name }}</option>
                                            @else
                                                <option value="{{ $listcategory -> id }}">{{ $listcategory -> name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                        <span class="float-right text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>

                                <div class="col-span-3 sm:col-span-3">
                                    <label for="quantity" class="block text-sm font-medium text-gray-700">Kuantitas</label>
                                    <div class="flex rounded-md shadow-sm">
                                        <input value="{{$products->quantity}}" type="text" name="quantity" id="quantity" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                                        @if($errors->has('quantity'))
                                            <span class="float-right text-danger">{{ $errors->first('quantity') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</x-app-layout>

<script>

    $('.input-images-1').imageUploader({
        imagesInputName: 'files',
        maxSize: 2 * 1024 * 1024,
        maxFiles: 5

    });

</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ),{
            toolbar: [ 'bold', 'italic', 'link', 'undo', 'redo', 'numberedList', 'bulletedList' ]
        } )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );

</script>
