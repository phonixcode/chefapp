<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('partials.header')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('partials.nav')
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    @include('partials.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" action="{{ route('recipes.filter') }}" method="post">
                @csrf
                <input type="text" id="search-input" placeholder="Search here....." name="search">
            </form>
        </div>
    </div>
    <!-- Search End -->

    @include('partials.script')
</body>

</html>
