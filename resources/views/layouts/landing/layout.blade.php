<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-landing.head />
@php
if (Route::currentRouteName()==='welcome')  $body =  'homepage-9 hp-6 homepage-1';
elseif(Route::currentRouteName()==='properties-details') $body = 'inner-pages sin-1 homepage-4 hd-white';
elseif(Route::currentRouteName()==='about') $body = 'inner-pages hd-white about';
elseif(Route::currentRouteName()==='contact') $body = 'inner-pages hd-white';
else $body = 'inner-pages homepage-4 agents hp-6 full hd-white';
@endphp
<body class="{{ $body }}">
    <div id="wrapper">
        <x-landing.header />
        <div class="clearfix"></div>
        @yield('page-content')

        <x-landing.footer />

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>

        <x-landing.auth />

        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>

        <x-landing.scripts />
    </div>
</body>

</html>
