<div class="trending__product">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="section-title">
                <h4>Trending Now</h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="btn__all">
                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($comics as $comic)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('comics/' . $comic->id . '/' . json_decode($comic->image)) }}">
                        <div class="ep">2411</div>
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    </div>
                    <div class="product__item__text">
                        <h5><a href="#">{{$comic->title}}</a></h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@section('append_script')
    <script></script>
@endsection
