{{-- <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./categories.html">Categories</a>
                    <span>Romance</span>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@unless($breadcrumbs->isEmpty())
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if (!is_null($breadcrumb->url) && !$loop->last)
                                <a href="{{ $breadcrumb->url }}"><i class="fa fa-home"></i> {{ $breadcrumb->title }}</a>
                            @else
                                <span>{{ $breadcrumb->title }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endunless
