<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.landing.head')
</head>
<!--begin::Body-->

<body class="page-template page-template-tpl-login page-template-tpl-login-php page page-id-1636 wp-embed-responsive">
    <div class="wrapper">

        <div class="inner-wrapper">

            <div id="header-wrapper">
                <header id="header" class="header1">

                    @include('includes.landing.top-bar')

                    <div class="container">

                        @include('includes.landing.menu-bar')
                    </div>
                </header>
            </div>

            <!--begin::Container-->
            @yield('page-content')
            <!--end::Container-->

            @include('includes.landing.footer')
        </div>
    </div>
    <div id="aioseo-admin"></div>
    @include('includes.landing.scripts')

</body>

</html>
