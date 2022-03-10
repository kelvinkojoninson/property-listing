@extends('layouts.layouts')
@section('page-name', 'Portfolio Detail')
@section('page-content')
    <div id="main">

        <section class='fullwidth-background dark-bg'
            style='background:url({{ asset('assets/landing/parallax-building.jpg') }}) center center repeat'>
            <div class="fullwidth-background-wrapper">
                <div class="container">
                    <div class="main-title-section">
                        <h1>{{ $portfolio->title }}</h1>
                        <div class="breadcrumb">
                            <a href="{{ config('app.url') }}">Home</a><span class='fa fa-angle-double-right'>
                            </span><a href="{{ config('app.url') }}/archive/{{ $portfolio->buildingType->transid }}"
                                rel="tag">{{ $portfolio->buildingType->description }}</a><span class='fa fa-angle-double-right'> </span><span
                                class="current">{{ $portfolio->title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">

            <section id="primary" class="content-full-width">
                <article id="post-153"
                    class="portfolio-single post-153 dt_portfolios type-dt_portfolios status-publish hentry portfolio_entries-cottage portfolio_entries-retail">
                    <div class="column dt-sc-two-third right-gallery first">
                        <ul class="portfolio-slider">
                            @foreach ($portfolio->pictures as $picture)
                            <li> <img src="{{ asset($picture) }}"
                                alt='' title='' /></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="column dt-sc-one-third last">
                        <h3>{{ $portfolio->title }}</h3>
                        <p>{{ $portfolio->description }}</p>
                        <p>{{ $portfolio->schools_neighbourhood }}</p>

                        <div class="project-details">
                            <p> <span> Client : </span>
                                Designthemes</p>
                            <p> <span> Category : </span> <a
                                    href="https://dtrealproperty.wpengine.com/portfolio_entries/cottage/"
                                    rel="tag">{{ $portfolio->buildingType->title }}</a>, <a
                                    href="https://dtrealproperty.wpengine.com/portfolio_entries/retail/"
                                    rel="tag">{{ ucfirst($portfolio->status) }}</a></p>
                            <p> <span> Date : </span> {{ strtoupper(date("j M Y", strtotime($portfolio->createdate))) }}</p>
                        </div>



                    </div>

                </article>

            </section>
        </div>
    </div>
@endsection
