@extends('layouts.landing.layout')
@section('page-name', '')
@section('page-content')

    <!-- STAR HEADER SEARCH -->
    {{-- <section id="hero-area" class="parallax-searchs home15 overlay thome-6 thome-1" data-stellar-background-ratio="0.5">
        <div class="hero-main">
            <div class="container" data-aos="zoom-in">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-inner">
                            <!-- Welcome Text -->
                            <div class="welcome-text">
                                <h1 class="h1">Find Your Dream
                                    <br class="d-md-none">
                                    <span class="typed border-bottom"></span>
                                </h1>
                                <p class="mt-4">We Have Over Thousand Properties Available In Accra For You.</p>
                            </div>
                            <!--/ End Welcome Text -->
                            <!-- Search Form -->
                            <div class="col-12">
                                <div class="banner-search-wrap">
                                    <ul class="nav nav-tabs rld-banner-tab">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tabs_1">For Sale</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs_1">For Rent</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs_1">
                                            <div class="rld-main-search">
                                                <div class="row">
                                                    <div class="rld-single-input">
                                                        <input type="text" name="keyword" placeholder="Enter Keyword...">
                                                    </div>
                                                    <div class="rld-single-select ml-22">
                                                        <select class="select single-select" name="property_type">
                                                            <option value="">Property Type</option>
                                                            @foreach ($buildingTypes as $buildingType)
                                                                <option value="{{ $buildingType->transid }}">
                                                                    {{ $buildingType->description }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="rld-single-select">
                                                        <select class="select single-select mr-0" name="location">
                                                            <option value="1">Location</option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city->transid }}">{{ $city->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="dropdown-filter"><span>Advanced Search</span></div>
                                                    <div class=" pl-0">
                                                        <a class="btn btn-yellow" style="cursor: pointer">Search
                                                            Now</a>
                                                    </div>
                                                    <div class="explore__form-checkbox-list full-filter">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                                <!-- Form Property Status -->
                                                                <div class="form-group categories">
                                                                    <div class="nice-select form-control wide" tabindex="0">
                                                                        <span class="current"><i
                                                                                class="fa fa-home"></i>Property
                                                                            Status</span>
                                                                        <ul class="list status">
                                                                            <input type="hidden" id="selectedStatus"
                                                                                name="selectedStatus" />
                                                                            <li data-value="sale" class="option selected ">
                                                                                For
                                                                                Sale</li>
                                                                            <li data-value="rent" class="option">For Rent
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!--/ End Form Property Status -->
                                                            </div>
                                                            <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                                <!-- Form Bedrooms -->
                                                                <div class="form-group beds">
                                                                    <div class="nice-select form-control wide" tabindex="0">
                                                                        <span class="current"><i class="fa fa-bed"
                                                                                aria-hidden="true"></i> Bedrooms</span>
                                                                        <ul class="list bedroom">
                                                                            <input type="hidden" id="selectedBedroom"
                                                                                name="selectedBedroom" />
                                                                            <li data-value="1" class="option selected">1
                                                                            </li>
                                                                            <li data-value="2" class="option">2</li>
                                                                            <li data-value="3" class="option">3</li>
                                                                            <li data-value="4" class="option">4</li>
                                                                            <li data-value="5" class="option">5</li>
                                                                            <li data-value="6" class="option">6</li>
                                                                            <li data-value="7" class="option">7</li>
                                                                            <li data-value="8" class="option">8</li>
                                                                            <li data-value="9" class="option">9</li>
                                                                            <li data-value="10" class="option">10</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!--/ End Form Bedrooms -->
                                                            </div>
                                                            <div class="col-lg-4 col-md-6 py-1 pl-0 pr-0">
                                                                <!-- Form Bathrooms -->
                                                                <div class="form-group bath">
                                                                    <div class="nice-select form-control wide" tabindex="0">
                                                                        <span class="current"><i class="fa fa-bath"
                                                                                aria-hidden="true"></i> Bathrooms</span>
                                                                        <ul class="list bathroom">
                                                                            <input type="hidden" id="selectedBathroom"
                                                                                name="selectedBathroom" />
                                                                            <li data-value="1" class="option selected">1
                                                                            </li>
                                                                            <li data-value="2" class="option">2</li>
                                                                            <li data-value="3" class="option">3</li>
                                                                            <li data-value="4" class="option">4</li>
                                                                            <li data-value="5" class="option">5</li>
                                                                            <li data-value="6" class="option">6</li>
                                                                            <li data-value="7" class="option">7</li>
                                                                            <li data-value="8" class="option">8</li>
                                                                            <li data-value="9" class="option">9</li>
                                                                            <li data-value="10" class="option">10</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!--/ End Form Bathrooms -->
                                                            </div>
                                                            <div class="col-lg-5 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                                <!-- Price Fields -->
                                                                <div class="main-search-field-2">
                                                                    <!-- Area Range -->
                                                                    <div class="range-slider">
                                                                        <label>Area Size</label>
                                                                        <div id="area-range" data-min="0" data-max="1300"
                                                                            data-unit="sq ft"></div>
                                                                        <div class="clearfix"></div>
                                                                        <input type="hidden" id="area_minval">
                                                                        <input type="hidden" id="area_maxval">
                                                                    </div>
                                                                    <br>
                                                                    <!-- Price Range -->
                                                                    <div class="range-slider">
                                                                        <label>Price Range</label>
                                                                        <input type="hidden" id="price_minval">
                                                                        <input type="hidden" id="price_maxval">

                                                                        <div id="price-range" data-min="0" data-max="600000"
                                                                            data-unit="GH₵"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30">
                                                                <!-- Checkboxes -->
                                                                <div class="checkboxes one-in-row margin-bottom-10 ch-1">
                                                                    <input id="check-air_conditioning"
                                                                        value="Air Conditioning" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-air_conditioning">Air
                                                                        Conditioning</label>
                                                                    <input id="check-swimming_pool" value="Swimming Pool"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-swimming_pool">Swimming Pool</label>
                                                                    <input id="check-central_heating"
                                                                        value="Central Heating" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-central_heating">Central
                                                                        Heating</label>
                                                                    <input id="check-laundry" value="Laundry"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-laundry">Laundry Room</label>
                                                                    <input id="check-gym" value="Gym" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-gym">Gym</label>
                                                                    <input id="check-security" value="Security"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-security">Security</label>
                                                                    <input id="check-window_covering"
                                                                        value="Window Covering" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-window_covering">Window
                                                                        Covering</label>
                                                                    <input id="check-maintenance_staff"
                                                                        value="Maintenance Staff" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-maintenance_staff">Maintenance
                                                                        Staff</label>
                                                                    <input id="check-window_covering"
                                                                        value="Window Covering" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-window_covering">Window
                                                                        Covering</label>
                                                                    <input id="check-roof_terrace" value="Roof Terrace"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-roof_terrace">Roof Terrace</label>
                                                                    <input id="check-video_security" value="Video Security"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-video_security">Video Security</label>
                                                                </div>
                                                                <!-- Checkboxes / End -->
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30">
                                                                <!-- Checkboxes -->
                                                                <div class="checkboxes one-in-row margin-bottom-10 ch-2">
                                                                    <input id="check-wifi" value="Wifi" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-wifi">WiFi</label>
                                                                    <input id="check-tv_cable" value="TV Cable"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-tv_cable">TV Cable</label>
                                                                    <input id="check-dryer" value="Dryer" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-dryer">Dryer</label>
                                                                    <input id="check-microwave" value="Microwave"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-microwave">Microwave</label>
                                                                    <input id="check-washer" value="Washer" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-washer">Washer</label>
                                                                    <input id="check-refrigerator" value="Refrigerator"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-refrigerator">Refrigerator</label>
                                                                    <input id="check-outdoor_shower" value="Outdoor Shower"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-outdoor_shower">Outdoor Shower</label>
                                                                    <input id="check-water_storage" value="Water Storage"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-water_storage">Water Storage</label>
                                                                    <input id="check-power_backup" value="Power Backup"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-power_backup">Power Backup</label>
                                                                    <input id="check-balcony" value="Balcony"
                                                                        type="checkbox" name="check">
                                                                    <label for="check-balcony">Balcony</label>
                                                                    <input id="check-cot" value="Cot" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-cot">Cot</label>
                                                                    <input id="check-rain_water_harvesting"
                                                                        value="Rain Water Harvesting" type="checkbox"
                                                                        name="check">
                                                                    <label for="check-rain_water_harvesting">Rain Water
                                                                        Harvesting</label>
                                                                </div>
                                                                <!-- Checkboxes / End -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- END HEADER SEARCH -->

    <!-- START SECTION POPULAR PLACES -->
    <section class="feature-categories bg-white rec-pro">
        <div class="container-fluid mt-5">
            <div class="sec-title">
                <h2><span>Most Searched </span>Places</h2>
                <p>Available Properties to rent in Accra right now</p>
            </div>
            <div class="row">
                <!-- Single category -->
                @foreach ($propertyByPlaces as $property)
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="small-category-2">
                            <div class="small-category-2-thumb img-1">
                                <a href="{{ config('app.url') }}/properties-grid/all/{{ $property->city }}/all"><img
                                        src="{{ $property->pictures[0] }}" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a
                                        href="{{ config('app.url') }}/properties-grid/all/{{ $property->city }}/all">{{ $property->cityDesc->name }}</a>
                                </h4>
                                <span>{{ $property->total }} Properties</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /row -->
        </div>
    </section>
    <!-- END SECTION POPULAR PLACES -->

    <!-- START SECTION FEATURED PROPERTIES -->
    <section class="featured portfolio bg-white-2 rec-pro full-l">
        <div class="container-fluid">
            <div class="sec-title">
                <h2><span>Featured </span>Properties</h2>
                <p>Browse Through Our Exclusive Properties</p>
            </div>
            <div class="row portfolio-items">
                @if (!empty($featured))
                    @foreach ($featured as $feature)
                        <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
                            <div class="project-single" data-aos="fade-right">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <!-- homes img -->
                                        <a href="{{ config('app.url') }}/properties-grid/all/all/{{ $feature->status }}"
                                            class="homes-img">
                                            <div class="homes-tag button alt featured">Featured</div>
                                            <div class="homes-tag button alt sale">For {{ ucfirst($feature->status) }}
                                            </div>
                                            <img src="{{ $feature->pictures[0] }}" alt="home-1" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        <a href="{{ config('app.url') }}/property/{{ $feature->transid }}"
                                            class="btn"><i class="fa fa-link"></i></a>
                                        <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                            class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                        <a href="{{ config('app.url') }}/property/{{ $feature->transid }}"
                                            class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="homes-content">
                                    <!-- homes address -->
                                    <h3><a
                                            href="{{ config('app.url') }}/property/{{ $feature->transid }}">{{ $feature->title }}</a>
                                    </h3>
                                    <p class="homes-address mb-3">
                                        <a href="{{ config('app.url') }}/property/{{ $feature->transid }}">
                                            <i class="fa fa-map-marker"></i><span>{{ $feature->address }}</span>
                                        </a>
                                    </p>
                                    <!-- homes List -->
                                    <ul class="homes-list clearfix pb-3">
                                        <li class="the-icons">
                                            <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                            <span>{{ $feature->bedrooms }} Bedrooms</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                            <span>{{ $feature->baths }} Bathrooms</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                            <span>{{ $feature->area }}/m<sup>2</sup></span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                            <span>{{ $feature->garages }} Garages</span>
                                        </li>
                                    </ul>
                                    <div class="price-properties footer pt-3 pb-0">
                                        <h3 class="title mt-3">
                                            <a>GH₵ {{ number_format($feature->price, 2) }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="bg-all">
                <a href="{{ config('app.url') }}/properties-grid/all/all/all" class="btn btn-outline-light">View More</a>
            </div>
        </div>
    </section>
    <!-- END SECTION FEATURED PROPERTIES -->

    <!-- START SECTION WHY CHOOSE US -->
    <section class="how-it-works bg-white rec-pro">
        <div class="container-fluid">
            <div class="sec-title">
                <h2><span>Why </span>Choose Us</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row service-1">
                <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="150">
                    <div class="serv-flex">
                        <div class="art-1 img-13">
                            <img src="{{ asset('assets/landing/images/icons/icon-4.svg') }}" alt="">
                            <h3>Wide Renge Of Properties</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits
                                adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="250">
                    <div class="serv-flex">
                        <div class="art-1 img-14">
                            <img src="{{ asset('assets/landing/images/icons/icon-5.svg') }}" alt="">
                            <h3>Trusted by thousands</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits
                                adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up" data-aos-delay="350">
                    <div class="serv-flex arrow">
                        <div class="art-1 img-15">
                            <img src="{{ asset('assets/landing/images/icons/icon-6.svg') }}" alt="">
                            <h3>Payment made easy</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits
                                adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt its-2" data-aos="fade-up" data-aos-delay="450">
                    <div class="serv-flex">
                        <div class="art-1 img-14">
                            <img src="{{ asset('assets/landing/images/icons/icon-15.svg') }}" alt="">
                            <h3>We are here near you</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits
                                adipisicing lacus consectetur Business Directory.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- END SECTION WHY CHOOSE US -->

    <!-- START SECTION RECENTLY PROPERTIES -->
    <section class="featured portfolio rec-pro disc">
        <div class="container-fluid">
            <div class="sec-title discover">
                <h2><span>Discover </span>Recent Properties</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="portfolio col-xl-12">
                <div class="slick-lancers">
                    @if (!empty($popular))
                        @foreach ($popular as $property)
                            <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                                <div class="landscapes">
                                    <div class="project-single">
                                        <div class="project-inner project-head">
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="{{ config('app.url') }}/properties-grid/all/all/{{ $property->status }}"
                                                    class="homes-img">
                                                    <div class="homes-tag button alt featured">Recent</div>
                                                    <div class="homes-tag button alt sale">For
                                                        {{ ucfirst($property->status) }}</div>
                                                    <img src="{{ $property->pictures[0] }}" alt="home-1"
                                                        class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="button-effect">
                                                <a href="{{ config('app.url') }}/property/{{ $property->transid }}"
                                                    class="btn"><i class="fa fa-link"></i></a>
                                                <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                                    class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                                <a href="{{ config('app.url') }}/property/{{ $property->transid }}"
                                                    class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                            </div>
                                        </div>
                                        <!-- homes content -->
                                        <div class="homes-content">
                                            <!-- homes address -->
                                            <h3><a
                                                    href="{{ config('app.url') }}/property/{{ $property->transid }}">{{ $property->title }}</a>
                                            </h3>
                                            <p class="homes-address mb-3">
                                                <a>
                                                    <i class="fa fa-map-marker"></i><span>{{ $property->address }}</span>
                                                </a>
                                            </p>
                                            <!-- homes List -->
                                            <ul class="homes-list clearfix pb-3">
                                                <li class="the-icons">
                                                    <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                    <span>{{ $property->bedrooms }} Bedrooms</span>
                                                </li>
                                                <li class="the-icons">
                                                    <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                    <span>{{ $property->baths }} Bathrooms</span>
                                                </li>
                                                <li class="the-icons">
                                                    <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                    <span>{{ $property->area }}/m<sup>2</sup></span>
                                                </li>
                                                <li class="the-icons">
                                                    <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                    <span>{{ $property->garages }} Garages</span>
                                                </li>
                                            </ul>
                                            <div class="price-properties footer pt-3 pb-0">
                                                <h3 class="title mt-3">
                                                    <a>GH₵ {{ number_format($feature->price, 2) }}</a>
                                                </h3>
                                                <div class="compare">
                                                    <a href="#" title="Compare">
                                                        <i class="flaticon-compare"></i>
                                                    </a>
                                                    <a href="#" title="Share">
                                                        <i class="flaticon-share"></i>
                                                    </a>
                                                    <a href="#" title="Favorites">
                                                        <i class="flaticon-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION RECENTLY PROPERTIES -->
    {{-- @push('script') --}}
    <script>
        $('.status li').click(function(e) {
            var value = $(this).data("value");
            $('#selectedStatus').val(value);
        });

        $('.bedroom li').click(function(e) {
            var value = $(this).data("value");
            $('#selectedBedroom').val(value);
        });

        $('.bathroom li').click(function(e) {
            var value = $(this).data("value");
            $('#selectedBathroom').val(value);
        });

        var priceSlideMinValue = document.getElementById('price_minval'),
            priceSlideMaValue = document.getElementById('price_maxval'),
            priceSliderDiv = document.getElementById("price-range");

        ['mouseup'].forEach(evt =>
            priceSliderDiv.addEventListener(evt, function() {
                var min = $("#price-range").slider("option", "values")[0],
                    max = $("#price-range").slider("option", "values")[1];

                console.log("min: " + min + " max: " + max);
                priceSlideMinValue.value = $("#price-range").slider("option", "values")[0];
                priceSlideMaValue.value = $("#price-range").slider("option", "values")[1];
            }, false)
        );

        var areaSlideMinValue = document.getElementById('area_minval'),
            areaSlideMaValue = document.getElementById('area_maxval'),
            areaSliderDiv = document.getElementById("area-range");


        ['mouseup'].forEach(evt =>
            areaSliderDiv.addEventListener(evt, function() {
                var min = $("#area-range").slider("option", "values")[0],
                    max = $("#area-range").slider("option", "values")[1];

                console.log("min: " + min + " max: " + max);
                areaSlideMinValue.value = $("#area-range").slider("option", "values")[0];
                areaSlideMaValue.value = $("#area-range").slider("option", "values")[1];
            }, false)
        );

    </script>
    {{-- @endpush --}}
@endsection
