@extends('client.main')
@section('content')
    <!-- Breadcrumb Begin -->
    @include('client.pages.comic.breadcrumb')
    <!-- Breadcrumb End -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    @include('client.pages.chapter.listchapter')

                    <div class="anime__video__player">
                        @foreach ($chapter->source as $source)
                            <div>
                                <img src="{{ $source }}" alt="{{ $chapter->name }}">
                            </div>
                        @endforeach
                    </div>

                    @include('client.pages.chapter.listchapter')

                </div>
            </div>


            <div class="row">
                <div class="col-lg-8">
                    @include('client.pages.chapter.comment')
                </div>
            </div>
        </div>
    </section>
@endsection
