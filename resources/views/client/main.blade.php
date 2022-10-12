<!DOCTYPE html>
<html lang="vi">

<head>
    @include('client.elements.head')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        @include('client.elements.header')
    </header>
    <!-- Header End -->

    <!-- Main content section Begin -->
    @yield('content')
    <!-- Main content section End -->

    <!-- Footer Section Begin -->
    @include('client.elements.footer')
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    @include('client.elements.script')
</body>

</html>
