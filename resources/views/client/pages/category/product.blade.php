<div class="product__page__content">
    <div class="product__page__title">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6">
                <div class="section-title">
                    <h4>{{ $category->name }}</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="product__page__filter">
                    <p>Order by:</p>
                    <select>
                        <option value="">A-Z</option>
                        <option value="">1-10</option>
                        <option value="">10-50</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($category->comics as $comic)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ $comic->image }}">
                        <div class="ep">{{ $comic->totalChapter }} / ?</div>
                        <div class="comment"><i class="fa fa-comments"></i> {{ $comic->totalComment }}</div>
                        <div class="view"><i class="fa fa-eye"></i> {{ $comic->totalView }}</div>
                    </div>
                    <div class="product__item__text">
                        <ul>
                            <li>Active</li>
                            <li>Movie</li>
                        </ul>
                        <h5><a href="{{ route('client.comic.detail', ['category' => $comic->category, 'comic' => $comic]) }}">{{ $comic->title }}</a></h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
