<div class="anime__details__review">
    <div class="section-title">
        <h5>Comments</h5>
    </div>

    @foreach ($comments as $comment)
        <div class="anime__review__item">
            <div class="anime__review__item__pic">
                <img src="{{ asset('client/img/anime/review-1.jpg') }}" alt="">
            </div>
            <div class="anime__review__item__text">
                <h6>{{ $comment->name }} - <span>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span></h6>
                <p>{{$comment->content}}</p>
            </div>
        </div>
    @endforeach
</div>


@auth
    <div class="anime__details__form">
        <div class="section-title">
            <h5>Your Comment</h5>
        </div>
        <form method="POST" action="{{ route('client.comment.store', $comic) }}">
            @csrf
            <textarea placeholder="Your Comment" name="content"></textarea>
            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
        </form>
    </div>
@endauth

@guest
    <div class="section-title">
        <h5>Please login to comment</h5>
    </div>
@endguest
