@extends('layouts.layouts')
@section('page-name', 'Login')
@section('page-content')
    <div id="main">
        <div id="slider">
            <div id="slider-container">
                <div class='slider-image-only'><img src="{{ asset('assets/landing/slider-image_new1.jpg') }}" alt='' />
                </div>
            </div>
            {{-- <div class="property-search-container">
                <div class="dt-sc-tabs-container">
                    <ul class="dt-sc-tabs-frame">
                        <li><a href='#'>All</a></li>
                    </ul>

                    <div class="dt-sc-tabs-frame-content">
                        <form action='https://dtrealproperty.wpengine.com/property-search/' method='get'><input
                                type='hidden' name='searchby' value='default'>
                            <div class="property-type-module medium-module">
                                <label>Type</label>
                                <select name="ptype">
                                    <option value='all'>Any</option>
                                    @foreach ($buildingTypes as $buildingType)
                                        <option value="{{ $buildingType->transid }}">{{ $buildingType->description }}
                                        </option>
                                    @endforeach
                                    {{-- <option value='90'>Apartment</option>
                                    <option value='43'>Building Area</option>
                                    <option value='42'>Commercial</option>
                                    <option value='32'>Condo</option>
                                    <option value='88'>Cottage</option>
                                    <option value='33'>Factory</option>
                                    <option value='34'>Farm House</option>
                                    <option value='35'>Guest House</option>
                                    <option value='91'>Office</option>
                                    <option value='40'>Residential</option>
                                    <option value='38'>Shopping Mall</option>
                                    <option value='39'>Show Rooms</option>
                                    <option value='44'>Single Family</option>
                                    <option value='89'>Villa</option> 
                                </select>
                            </div>
                            <div class="location-module medium-module"><label>Locations</label><select name="plocation">
                                    <option value='all'>Any</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->transid }}">{{ $city->name }}</option>
                                    @endforeach
                                </select></div>
                            <div class="min-price-module medium-module"><label>Min Price</label>
                                <select name="minprice">
                                    <option value="0">Any</option>
                                    <option value='1000'>1000</option>
                                    <option value='2000'>2000</option>
                                    <option value='3000'>3000</option>
                                    <option value='4000'>4000</option>
                                    <option value='5000'>5000</option>
                                    <option value='6000'>6000</option>
                                    <option value='7000'>7000</option>
                                </select>
                            </div>
                            <div class="max-price-module medium-module"><label>Max Price</label><select name="maxprice">
                                    <option value="0">Any</option>
                                    <option value='10000'>10000</option>
                                    <option value='20000'>20000</option>
                                    <option value='30000'>30000</option>
                                    <option value='40000'>40000</option>
                                    <option value='50000'>50000</option>
                                    <option value='60000'>60000</option>
                                    <option value='70000'>70000</option>
                                </select></div>
                            <div class="beds-module small-module"><label>Beds</label><select name="pbeds">
                                    <option value=">0">Any</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                </select></div>
                            <div class="baths-module small-module"><label>Baths</label><select name="pbaths">
                                    <option value=">0">Any</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                </select></div>
                            <div class="floors-module small-module"><label>Floors</label><select name="pfloors">
                                    <option value=">0">Any</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                </select></div>
                            <div class="garages-module small-module"><label>Garages</label><select name="pgarages">
                                    <option value=">0">Any</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                </select></div><input type="submit" name="dt-propery-search-submit" value="Search" />
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- <div id="map-slider" style="height:600px;"></div> --}}

        <section id="primary" class="content-full-width">
            <div id="post-9" class="post-9 page type-page status-publish hentry">
                <div class='dt-sc-hr-invisible  '></div>
                <div class='fullwidth-section '>
                    <div class="container">
                        <h2 style="text-align: center;">We are Providing the Best Aparment Deals</h2>
                        <p style="text-align: center; font-weight: 300; font-size: 16px; color: #a0a0a0;">Lorem
                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam</p>
                        <p style="text-align: center; font-weight: 300; font-size: 16px; color: #a0a0a0;">erat,
                            sed diam voluptua.</p>
                        <div class='dt-sc-hr-invisible  '></div>
                        <div class='column dt-sc-one-fourth  space first'>
                            <div class="dt-sc-services">
                                <h4><span class='fa fa-home'></span><a href='#'>Search Home</a></h4><img
                                    src="{{ asset('assets/landing/caption-image1.jpg') }}" alt='Search Home' />
                                <p>Looking to buy your new dream home?</p>
                            </div>
                        </div>
                        <div class='column dt-sc-one-fourth  space '>
                            <div class="dt-sc-services">
                                <h4><span class='fa fa-users'></span><a href='#'>Find Realtor</a></h4><img
                                    src="{{ asset('assets/landing/caption-image2.jpg') }}" alt='Find Realtor' />
                                <p>Find a Realtor that suits your needs.</p>
                            </div>
                        </div>
                        <div class='column dt-sc-one-fourth  space '>
                            <div class="dt-sc-services">
                                <h4><span class='fa fa-file-text-o'></span><a href='#'>List Property</a></h4>
                                <img src="{{ asset('assets/landing/caption-image3.jpg') }}" alt='List Property' />
                                <p>Want to list your own property?</p>
                            </div>
                        </div>
                        <div class='column dt-sc-one-fourth  space '>
                            <div class="dt-sc-services">
                                <h4><span class='fa fa-key'></span><a href='#'>Search for rent</a></h4><img
                                    src="{{ asset('assets/landing/caption-image4.jpg') }}" alt='Search for rent' />
                                <p>Rent for a Home in Few Minutes</p>
                            </div>
                        </div>
                        @if (!empty($featured))
                            <div class='dt-sc-hr-invisible-medium'></div>
                            <h2 class='border-title '><span>Featured Properties</span></h2>
                            @php
                                $n = 0;
                            @endphp
                            @foreach ($featured as $feature)
                                @php
                                    $n++;
                                @endphp

                                <div
                                    class='column  dt-sc-one-third @if ($n == 1) first @endif'>
                                    <div class='property-item '>
                                        <div class="property-thumb"><span
                                                class='property-contract-type {{ $feature->status }}'><a
                                                    href="{{ config('app.url') }}/contract_type/{{ $feature->status }}">{{ ucfirst($feature->status) }}</a></span>
                                            <ul class="porperty-slider">
                                                @foreach ($feature->pictures as $picture)
                                                    <li><a
                                                            href="{{ config('app.url') }}/property/{{ $feature->transid }}">
                                                            <img src='{{ $picture }}' alt='' title='' />
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="property-thumb-meta"><span class='property-type'><a
                                                        href="{{ config('app.url') }}/property_type/{{ $feature->buildingType->description }}">{{ $feature->buildingType->description }}</a></span><span
                                                    class='property-price'>GHS {{ number_format($feature->price, 2) }}
                                                </span></div>
                                        </div>
                                        <div class="property-details">
                                            <div class="property-details-inner">
                                                <h2><a
                                                        href='{{ config('app.url') }}/property/{{ $feature->transid }}'>{{ $feature->title }}</a>
                                                </h2>
                                                <h3>{{ $feature->address }}</h3>
                                                <ul class="property-meta">
                                                    <li>{{ $feature->area }}/m<sup>2</sup><span>Area</span></li>
                                                    <li>{{ $feature->bedrooms }}<span>Beds</span></li>
                                                    <li>{{ $feature->baths }}<span>Baths</span></li>
                                                    <li>{{ $feature->floors }}<span>Floors</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class='dt-sc-hr-invisible-medium  '></div>
                <div class='fullwidth-section dark-bg'
                    style="background-image:url({{ asset('assets/landing/parallax1.jpg') }});background-repeat:no-repeat;background-position:left top;padding-top:50px;padding-bottom:50px;background-attachment:fixed; ">
                    <div class="container"><img loading="lazy" class="aligncenter size-full wp-image-1862"
                            src="{{ asset('assets/landing/home-icon.png') }}" alt="home-icon" width="77" height="90" />
                        <div class='dt-sc-hr-invisible-small  '></div>
                        <h2 style="text-align: center; margin-bottom: 10px;">Want a room? This
                            is the best Place.</h2>
                        <p style="font-size: 18px; text-align: center;">Join now and get a room for less.</p>
                        <p style="text-align: center; margin-top: 10px;"><a href="{{ config('app.url') }}/regsiter" 
                                class='dt-sc-button   small    with-icon '><i class='fa fa-user'>
                                </i>Join Now</a>
                    </div>
                </div>
                <div class='dt-sc-hr-invisible-medium  '></div>
                <div class='fullwidth-section '>
                    <div class="container">
                        <h2 style="text-align: center;">View a list of Featured Properties.</h2>
                        <p style="text-align: center; font-weight: 300; font-size: 16px; color: #a0a0a0;">Lorem
                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam</p>
                        <p style="text-align: center; font-weight: 300; font-size: 16px; color: #a0a0a0;">erat,
                            sed diam voluptua.</p>
                        <div class='dt-sc-hr-invisible  '></div>
                        <div class='dt-sc-tabs-container property-item-list-tab'>
                            <ul class="dt-sc-tabs-frame">
                                <li><a href="#">Property Type</a></li>
                                <li><a href="#">Contract Type</a></li>
                                <li><a href="#">By Location</a></li>
                            </ul>
                            <div class="dt-sc-tabs-frame-content">
                                <ul class="property-item-list-container">
                                    @foreach($propertyTypes as $propertyType)
                                    <li class="property-item-list">
                                        <div class="property-thumb"> <a
                                                href="{{ config('app.url') }}/property/{{ $propertyType->transid }}"><img
                                                    src="{{ $propertyType->pictures[0] }}"
                                                    alt='{{$propertyType->title }}' /></a> </div>
                                        <div class="property-details">
                                            <h2><a
                                                    href="{{ config('app.url') }}/property/{{ $propertyType->transid }}">{{ $propertyType->title}}</a></h2>
                                            <h3>{{ $propertyType->address }}</h3>
                                        </div>
                                        <div class="property-price">GHS {{ number_format($propertyType->price) }}</div>
                                        <ul class="property-meta">
                                            <li>{{ $propertyType->area }}/m<sup>2</sup><span>Area</span></li>
                                            <li>{{ $propertyType->bedrooms }}<span>Beds</span></li>
                                            <li>{{ $propertyType->bathrooms}}<span>Baths</span></li>
                                            <li>{{ $propertyType->floors }}<span>Floors</span></li>
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="dt-sc-tabs-frame-content">
                                <ul class="property-item-list-container">
                                    @foreach($contractTypes as $contractType)
                                    <li class="property-item-list">
                                        <div class="property-thumb"> <a
                                                href="{{ config('app.url') }}/property/{{ $contractType->transid }}"><img
                                                    src="{{ $contractType->pictures[0] }}"
                                                    alt='{{$contractType->title }}' /></a> </div>
                                        <div class="property-details">
                                            <h2><a
                                                    href="{{ config('app.url') }}/property/{{ $contractType->transid }}">{{ $contractType->title}}</a></h2>
                                            <h3>{{ $contractType->address }}</h3>
                                        </div>
                                        <div class="property-price">GHS {{ number_format($contractType->price) }}</div>
                                        <ul class="property-meta">
                                            <li>{{ $contractType->area }}/m<sup>2</sup><span>Area</span></li>
                                            <li>{{ $contractType->bedrooms }}<span>Beds</span></li>
                                            <li>{{ $contractType->bathrooms}}<span>Baths</span></li>
                                            <li>{{ $contractType->floors }}<span>Floors</span></li>
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="dt-sc-tabs-frame-content">
                                <ul class="property-item-list-container">
                                    @foreach($locations as $location)
                                    <li class="property-item-list">
                                        <div class="property-thumb"> <a
                                                href="{{ config('app.url') }}/property/{{ $location->transid }}"><img
                                                    src="{{ $location->pictures[0] }}"
                                                    alt='{{$location->title }}' /></a> </div>
                                        <div class="property-details">
                                            <h2><a
                                                    href="{{ config('app.url') }}/property/{{ $location->transid }}">{{ $location->title}}</a></h2>
                                            <h3>{{ $location->address }}</h3>
                                        </div>
                                        <div class="property-price">GHS {{ number_format($location->price) }}</div>
                                        <ul class="property-meta">
                                            <li>{{ $location->area }}/m<sup>2</sup><span>Area</span></li>
                                            <li>{{ $location->bedrooms }}<span>Beds</span></li>
                                            <li>{{ $location->bathrooms}}<span>Baths</span></li>
                                            <li>{{ $location->floors }}<span>Floors</span></li>
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <p><span style="line-height: 1.5em;">
                    </div>
                </div></span></p>
                <div class='dt-sc-hr-invisible-medium  '></div>
                <div class='fullwidth-section dark-bg'
                    style="background-image:url({{ asset('assets/landing/parallax2.jpg') }});background-repeat:no-repeat;background-position:left top;padding-top:60px;padding-bottom:60px;background-attachment:fixed; ">
                    <div class="container">
                        <div class='column dt-sc-one-fourth  space first'>
                            <p><img loading="lazy" class="aligncenter size-full wp-image-1860"
                                    src="{{ asset('assets/landing/search-icon.png') }}" alt="search-icon" width="90"
                                    height="111" /></p>
                            <div class='dt-sc-hr-invisible-small  '></div>
                            <h6 style="text-align: center;">SEARCH A HOME</h6>
                            <p style="text-align: center;">Maecenas tempus, tellus eget condimentum rhoncus, sem
                                quam sem osewper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        </div>
                        <div class='column dt-sc-one-fourth  space '>
                            <p><img loading="lazy" class="aligncenter size-full wp-image-1860"
                                    src="{{ asset('assets/landing/map-icon.png') }}" alt="search-icon" width="107"
                                    height="111" /></p>
                            <div class='dt-sc-hr-invisible-small  '></div>
                            <h6 style="text-align: center;">SELECT BY LOCATION</h6>
                            <p style="text-align: center;">Maecenas tempus, tellus eget condimentum rhoncus, sem
                                quam sem osewper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        </div>
                        <div class='column dt-sc-one-fourth  space '>
                            <p><img loading="lazy" class="aligncenter size-full wp-image-1860"
                                    src="{{ asset('assets/landing/comments-icon.png') }}" alt="search-icon" width="123"
                                    height="111" /></p>
                            <div class='dt-sc-hr-invisible-small  '></div>
                            <h6 style="text-align: center;">LIVE SUPPORT!</h6>
                            <p style="text-align: center;">Maecenas tempus, tellus eget condimentum rhoncus, sem
                                quam sem osewper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        </div>
                        <div class='column dt-sc-one-fourth  space '>
                            <p><img loading="lazy" class="aligncenter size-full wp-image-1860"
                                    src="{{ asset('assets/landing/keys-icon.png') }}" alt="search-icon" width="120"
                                    height="111" /></p>
                            <div class='dt-sc-hr-invisible-small  '></div>
                            <h6 style="text-align: center;">GET THE HOME</h6>
                            <p style="text-align: center;">Maecenas tempus, tellus eget condimentum rhoncus, sem
                                quam sem osewper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
