@section('header')
    <header id="header-container" class="header head-tr bg-dark">
        <!-- Header -->
        <div id="header" class="head-tr bottom">
            <div class="container container-header">
                <!-- Left Side Content -->
                <div class="left-side">
                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{ config('app.url') }}"><img src="{{ asset('assets/landing/images/logo-new.svg') }}"
                                data-sticky-logo="{{ asset('assets/landing/images/logo-new-pink.svg') }}"
                                alt="PayDaily"></a>
                    </div>
                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1 head-tr">
                        <ul id="responsive">
                            <li class="@if (Route::currentRouteName()==='welcome' ) active @endif "><a href=" {{ config('app.url') }}">Home</a></li>
                            <li class="@if (Route::currentRouteName()==='about' ) active @endif"><a href="{{ route('about') }}">About Us</a></li>
                            <li class="@if (Route::currentRouteName()==='properties-grid' ||
                                Route::currentRouteName()==='properties-list' ||
                                Route::currentRouteName()==='properties-details' ) active @endif">
                                <a href="{{ config('app.url') }}/properties-grid/all/all/all">All Properties</a>
                            </li>
                            <li class="@if (Route::currentRouteName()==='contact' ) active @endif"><a href="{{ route('contact') }}">Contact</a></li>
                            @if (Auth::user())
                                <li class="d-none d-xl-none d-block d-lg-block"><a
                                        href="{{ route('dashboard') }}">Dashboard</a></li>
                            @else
                                <li class="show-reg-form modal-open d-none d-xl-none d-block d-lg-block"><a href="#">Login</a>
                                </li>
                                <li class="show-reg-form modal-open d-none d-xl-none d-block d-lg-block"><a
                                        href="#">Register</a></li>
                            @endif
                            <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0"><a
                                    href="add-property.html" class="button border btn-lg btn-block text-center">Add
                                    Listing<i class="fas fa-laptop-house ml-2"></i></a></li>
                        </ul>
                    </nav>
                    <!-- Main Navigation / End -->
                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                @if (Auth::user())
                    <div class="header-user-menu user-menu add">
                        <div class="header-user-name">
                            <span><img
                                    src="{{ empty(Auth::user()->picture) ? asset('assets/landing/images/testimonials/ts-1.jpg') : Auth::user()->picture }}"
                                    alt=""></span>Hi, {{ Auth::user()->fname }}!
                        </div>
                        <ul>
                            <li><a href="#"> Edit profile</a></li>
                            <li><a href="{{ route('dashboard') }}"> Bookings</a></li>
                            <li><a href="{{ route('dashboard') }}"> Payments</a></li>
                            <li><a href="#"> Change Password</a></li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <li><a style="cursor:pointer"
                                        onclick="event.preventDefault(); document.forms['logout-form'].submit()">Log Out</a>
                                </li>
                            </form>
                        </ul>
                    </div>
                @else
                <!-- Right Side Content / End -->

                <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                    <!-- Header Widget -->
                    <div class="header-widget sign-in">
                        <div class="show-reg-form modal-open"><a href="#">Sign In</a></div>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->
                @endif

                <!-- lang-wrap-->
                {{-- <div class="header-user-menu user-menu add d-none d-lg-none d-xl-flex ml-0">
                    <div class="lang-wrap">
                        <div class="show-lang"><span><i class="fas fa-globe-americas"></i><strong>ENG</strong></span><i
                                class="fa fa-caret-down arrlan"></i></div>
                        <ul class="lang-tooltip lang-action no-list-style">
                            <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                            <li><a href="#" data-lantext="Fr">Francais</a></li>
                            <li><a href="#" data-lantext="Es">Espanol</a></li>
                            <li><a href="#" data-lantext="De">Deutsch</a></li>
                        </ul>
                    </div>
                </div> --}}
                <!-- lang-wrap end-->

            </div>
        </div>
        <!-- Header / End -->

    </header>
@show
