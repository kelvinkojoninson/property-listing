@extends('layouts.layouts')
@section('page-name', 'Properties')
@section('page-content')
    <div id="main">
        <section class='fullwidth-background dark-bg subtitle-for-single-product'>
            <div class="fullwidth-background-wrapper">
                <div class="container">
                    <div class="main-title-section">
                        <h1>Properties</h1>
                        <div class="breadcrumb">
                            <a href="{{ config('app.url') }}">Home</a>
                                <span class="fa fa-angle-double-right">  </span>
                            </span><span class="current">@yield('page-name')</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">
            <section id="primary" class="content-full-width">
                <div class="property-view-type">
                    <a href="{{ config('app.url') }}/properties-grid/all/all/all"
                        class="property-grid-type active"> <span> </span>Grid</a>
                    <a href="{{ config('app.url') }}/properties-list/all/all/all" class="property-list-type ">
                        <span> </span>List</a>
                </div>
                <div class="dt-sc-clear"></div>

                @php
                $n = 0;
            @endphp
            @foreach ($properties as $property)
                @php
                    $n++;
                @endphp
                <div class="column dt-sc-one-third  @if ($n == 1  || $n % 4 == 0) first @endif">

                    <div class="property-item ">

                        <div class="property-thumb">
                            <span class="property-contract-type {{ $property->status }}">
                                <a href="{{ config('app.url') }}/portfolio-grid/{{ request()->buildingType }}/{{ request()->location }}/{{ $property->status }}">{{ ucfirst($property->status) }}</a>
                            </span>
                            <ul class="porperty-slider">
                                @foreach ($property->pictures as $picture)
                                <li> <img
                                    src="{{ $picture }}"
                                    alt='' title='' /></li>
                                @endforeach
                            </ul>

                            <div class="property-thumb-meta"><span class='property-type'><a
                                        href="{{ config('app.url') }}/portfolio-grid/{{ $property->buildingType->transid }}/{{ request()->location }}/{{ $property->status }}">{{ $property->buildingType->description }}</a></span><span
                                    class="property-price">GHS {{ number_format($property->price, 2) }}</span> </div>
                        </div>

                        <div class="property-details">
                            <div class="property-details-inner">
                                <h2><a href="{{ config('app.url') }}/property/{{$property->transid}}">{{ $property->title }}</a></h2>
                                <h3>{{ $property->cityDesc->name }}, {{ $property->stateDesc->name }}, {{ $property->countryDesc->name }}</h3>


                                <ul class="property-meta">
                                    <li>{{ $property->area }}/m<sup>2</sup><span>Area</span></li>
                                    <li>{{ $property->bedrooms }}<span>Beds</span></li>
                                    <li>{{ $property->bathrooms}}<span>Baths</span></li>
                                    <li>{{ $property->floors }}<span>Floors</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
                <div class="dt-sc-clear"></div>


                {{-- <div class="pagination">
                    <div class="prev-post"></div>
                    <ul class=''>
                        <li class='active-page'>1</li>
                        <li><a href='https://dtrealproperty.wpengine.com/dt_properties/page/2/' class='inactive'>2</a></li>
                        <li><a href='https://dtrealproperty.wpengine.com/dt_properties/page/3/' class='inactive'>3</a></li>
                    </ul>
                    <div class="next-post"><a href="https://dtrealproperty.wpengine.com/dt_properties/page/2/">Next<span
                                class="fa fa-angle-double-right"></span></a></div>
                </div> --}}

                {{ $properties->links('vendor.pagination.paginator') }}
            </section>
        </div>
    </div>
@endsection
