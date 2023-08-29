<div class="container-lg">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="bc-wrapper">
                <ol class="breadcrumb bg-light mb-2 px-md-4">
                    <li class="breadcrumb-item font-weight-bold font-italic">
                        <a href="{{ url('/') }}">
                            <span class="mr-md-3 mr-2">Home</span>
                        </a>
                        <i class="fa fa-caret-right " aria-hidden="true"></i>
                    </li>
                    <li class="breadcrumb-item font-weight-bold font-italic">
                        <a href="{{ url('view-category').'/'.Str::slug($details -> categories -> name) }}">
                            <span class="mr-md-3 mr-2">{{ $details -> categories -> name }}</span>
                        </a>
                        <i class="fa fa-caret-right text-uppercase " aria-hidden="true"></i>
                    </li>
                    <li class="breadcrumb-item font-weight-normal font-italic">
                        <span>{{ $details -> name }}</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
