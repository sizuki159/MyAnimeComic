@extends('client.main')

@section('content')

    {{Breadcrumbs::render('category.listcomic', $category)}}

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @include('client.pages.category.product')
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    @include('client.pages.home.topview')
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection