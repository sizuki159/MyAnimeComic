<div class="product__sidebar">
    <div class="product__sidebar__view">
        <div class="section-title">
            <h5>Top Views</h5>
        </div>
        <ul class="filter__controls">
            <li class="active" data-filter="*">Day</li>
            <li data-filter=".week">Week</li>
            <li data-filter=".month">Month</li>
            <li data-filter=".years">Years</li>
        </ul>
        <div class="filter__gallery">
            <div class="product__sidebar__view__item set-bg mix day years"
                data-setbg="{{ asset('client/img/sidebar/tv-1.jpg') }}">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Boruto: Naruto next generations</a></h5>
            </div>
            <div class="product__sidebar__view__item set-bg mix month week"
                data-setbg="{{ asset('client/img/sidebar/tv-2.jpg') }}">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
            </div>
            <div class="product__sidebar__view__item set-bg mix week years"
                data-setbg="{{ asset('client/img/sidebar/tv-3.jpg') }}">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Sword art online alicization war of underworld</a></h5>
            </div>
            <div class="product__sidebar__view__item set-bg mix years month"
                data-setbg="{{ asset('client/img/sidebar/tv-4.jpg') }}">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
            </div>
            <div class="product__sidebar__view__item set-bg mix day"
                data-setbg="{{ asset('client/img/sidebar/tv-5.jpg') }}">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Fate stay night unlimited blade works</a></h5>
            </div>
        </div>
    </div>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>New Comment</h5>
        </div>
        @foreach ($comicRecentComments as $comicRecentComment)
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img width="90px" height="130px" src="{{ $comicRecentComment->image }}" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <h5><a href="{{ route('client.comic.detail', ['category' => $comicRecentComment->category, 'comic' => $comicRecentComment]) }}">{{ $comicRecentComment->title }}</a></h5>
                <span><i class="fa fa-eye"></i> {{ $comicRecentComment->totalView }} Viewes</span>
                <div class="comment"><i class="fa fa-comments"></i> {{ $comicRecentComment->totalComment }}</div>
            </div>
        </div>  
        @endforeach
    </div>
</div>
