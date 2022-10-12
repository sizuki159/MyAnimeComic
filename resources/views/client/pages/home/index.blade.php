@extends('client.main')

@section('content')
    <!-- Hero Section Begin -->
    @include('client.pages.home.slider')
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @include('client.pages.home.product')
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    @include('client.pages.home.topview')
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection

@section('append_script')
@endsection