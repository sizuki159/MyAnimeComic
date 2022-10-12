@extends('client.main')
@section('content')
    <!-- Breadcrumb Begin -->
    @include('client.pages.comic.breadcrumb')
    <!-- Breadcrumb End -->
    
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            @include('client.pages.comic.comicdetail')
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    @include('client.pages.comic.review')
                </div>
                <div class="col-lg-4 col-md-4">
                    @include('client.pages.comic.youmightlike')
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection
