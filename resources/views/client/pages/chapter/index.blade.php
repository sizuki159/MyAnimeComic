@extends('client.main')
@section('content')
    <!-- Breadcrumb Begin -->
    {{Breadcrumbs::render('category.comic.chapter', $chapter)}}
    <!-- Breadcrumb End -->
    
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    @include('client.pages.chapter.listchapter', ['chapterNumber' => $chapterNumber])

                    <div class="anime__video__player">
                        <div>
                        @foreach ($chapter->source as $source)
                            <div>
                                <img src="{{ $source }}" alt="{{ $chapter->name }}">
                            </div>
                        @endforeach
                        </div>
                    </div>

                    @include('client.pages.chapter.listchapter', ['chapterNumber' => $chapterNumber])

                </div>
            </div>


            {{-- <div class="row">
                <div class="col-lg-8">
                    @include('client.pages.chapter.comment')
                </div>
            </div> --}}
        </div>
    </section>
@endsection
