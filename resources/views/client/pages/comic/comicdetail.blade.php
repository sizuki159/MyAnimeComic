<div class="anime__details__content">
    <div class="row">
        <div class="col-lg-3">
            <div class="anime__details__pic set-bg" data-setbg="{{ $comic->image }}">
                <div class="comment"><i class="fa fa-comments"></i> {{ $comic->totalComment }}</div>
                <div class="view"><i class="fa fa-eye"></i> {{ $comic->totalView }}</div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="anime__details__text">
                <div class="anime__details__title">
                    <h3>{{ $comic->title }}</h3>
                </div>
                <div class="anime__details__rating">
                    <div class="rating">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                    <span>1.029 Votes</span>
                </div>
                <p>{{ $comic->description }}</p>
                <div class="anime__details__widget">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <ul>
                                <li><span>Time Created:</span> {{ $comic->created_at }}</li>
                                <li><span>Views:</span> {{ $comic->totalView }}</li>
                                <li><span>Comments:</span> {{ $comic->totalComment }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="anime__details__btn">
                    @auth
                        @if ($favorite)
                            <a href="{{ route('client.favorite', ['comic' => $comic]) }}" class="follow-btn"><i
                                    class="fa fa-heart-o"></i> Delete Favorite</a>
                        @else
                            <a href="{{ route('client.favorite', ['comic' => $comic]) }}" class="follow-btn"><i
                                    class="fa fa-heart-o"></i> Favorite</a>
                        @endif

                    @endauth
                    @if ($comic->totalChapter > 0)
                        <a href="{{ route('client.chapter.detail', ['category' => $comic->category, 'comic' => $comic, 'chapterNumber' => $comic->chapters->first()->chapter_number]) }}"
                            class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
