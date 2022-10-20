@unless($breadcrumbs->isEmpty())
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if (!is_null($breadcrumb->url) && !$loop->last)
                                @if ($loop->first)
                                <a href="{{ $breadcrumb->url }}"><i class="fa fa-home"></i> {{ $breadcrumb->title }}</a>
                                @else
                                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                                @endif
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
