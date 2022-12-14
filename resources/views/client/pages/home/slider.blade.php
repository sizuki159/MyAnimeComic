<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">

            @foreach ($sliders as $slider)
                <div class="hero__items set-bg" data-setbg="{{ $slider->image }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2>{{ $slider->title }}</h2>
                                <p>{{ $slider->description }}</p>
                                <a href="{{ $slider->url }}"><span>Go Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="hero__items set-bg" data-setbg="{{ asset('client/img/hero/hero-1.jpg') }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">Adventure</div>
                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                            <p>After 30 days of travel across the world...</p>
                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
