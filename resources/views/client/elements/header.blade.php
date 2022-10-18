<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <div class="header__logo">
                <a href="{{ route('client.home') }}">
                    <img src="{{ asset('client/img/logo.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="header__nav">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{ route('client.home') }}">Homepage</a></li>
                        <li><a href="./categories.html">Categories <span class="arrow_carrot-down"></span></a>
                            <ul class="dropdown">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('client.category.showListComic', ['category' => $category]) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="header__right">
                <a href="#" class="search-switch"><span class="icon_search"></span></a>
                <a href="./login.html"><span class="icon_profile"></span></a>
            </div>
        </div>
    </div>
    <div id="mobile-menu-wrap"></div>
</div>
