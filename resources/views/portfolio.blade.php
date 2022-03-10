@extends('layouts.layouts')
@section('page-name', 'Portfolio')
@section('page-content')

    <div id="main">
        <section class='fullwidth-background dark-bg'
            style='background:url({{ asset('assets/landing/parallax-building.jpg') }}) center center repeat'>
            <div class="fullwidth-background-wrapper">
                <div class="container">
                    <div class="main-title-section">
                        <h1>Portfolio</h1>
                        <div class="breadcrumb">
                            <a href="{{ config('app.url') }}">Home</a><span class='fa fa-angle-double-right'>
                            </span><span class="current">Portfolio</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">


            <section id="primary" class="content-full-width">
                <div id="post-19" class="post-19 page type-page status-publish hentry">
                    <div class="social-bookmark"></div>
                    <div class="social-share"></div>
                </div>


                <div class="dt-sc-clear"></div>


                <div class="dt-sc-sorting-container">
                    <a href="{{ config('app.url') }}/portfolio-gallery/all" target="_blank" class="@if (request()->buildingType == 'all') active-sort @endif">All</a>
                    @foreach ($buildingTypes as $buildingType)
                        <a href="{{ config('app.url') }}/portfolio-gallery/{{ $buildingType->transid }}" target="_blank"
                            class="@if (request()->buildingType == $buildingType->transid) active-sort @endif">
                            {{ $buildingType->description }} </a>
                    @endforeach
                </div>

                <div class="dt-sc-portfolio-container gallery  with-space ">
                    @foreach ($portfolio as $port)
                        <div id="portfolio-155"
                            class=" portfolio column dt-sc-one-column  all-sort  first apartment-sort cottage-sort retail-sort  with-space ">
                            <figure>
                                <img src="{{ asset($port->pictures[0]) }}" width='1060' height='795' />
                                <figcaption>
                                    <div class="fig-title">
                                        <h5><a href="{{ config('app.url') }}/portfolio/{{ $port->transid }}"
                                                title="{{ $port->title }}">{{ $port->title }}</a></h5>
                                        {{-- <h6>{{ $port-> }}</h6> --}}
                                    </div>
                                    <div class="fig-overlay">
                                        <a href="https://dtrealproperty.wpengine.com/wp-content/uploads/2014/01/gallery1.jpg"
                                            data-gal="prettyPhoto[gallery]" class="zoom"> <span class="fa fa-plus">
                                            </span> </a>
                                        <a href="{{ config('app.url') }}/portfolio/{{ $port->transid }}"
                                            class="link"> <span class="fa fa-link"> </span> </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>

                <div class="dt-sc-clear"></div>
                <div class="dt-sc-hr-invisible"> </div>


                {{-- <div class="pagination">
                    <div class="prev-post"></div>
                    <div class="next-post"></div>
                </div> --}}
                {{ $portfolio->links('vendor.pagination.simple-bootstrap-4') }}

            </section>
        </div>
    </div>
@endsection
