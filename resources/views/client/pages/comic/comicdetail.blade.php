<div class="anime__details__content">
    <div class="row">
        <div class="col-lg-3">
            <div class="anime__details__pic set-bg" data-setbg="{{ asset('client/img/anime/details-pic.jpg') }}">
                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="anime__details__text">
                <div class="anime__details__title">
                    <h3>{{$comic->title}}</h3>
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
                <p>{{$comic->description}}</p>
                <div class="anime__details__widget">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <ul>
                                <li><span>Time Created:</span> {{$comic->created_at}}</li>
                                <li><span>Views:</span> {{$comic->totalView}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="anime__details__btn">
                    <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                    <a href="#" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
