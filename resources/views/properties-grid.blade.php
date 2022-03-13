@extends('layouts.landing.layout')
@section('page-name', ' Properties')
@section('page-content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>All Properties</h1>
                <h2><a href="{{ config('app.url') }}">Home </a> &nbsp;/&nbsp; Properties</h2>
            </div>
        </div>
    </section>

    <!-- START SECTION PROPERTIES LISTING -->
    <section class="properties-list propertyd portfolio blog">
        <div class="container">
            <section class="headings-2 pt-0 pb-0">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                            <div class="text-heading text-left">
                                <p><a href="{{ config('app.url') }}">Home </a> &nbsp;/&nbsp; <span>Listings</span></p>
                            </div>
                            <h3>All Houses</h3>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Search Form -->
            <div class="col-12 px-0 parallax-searchs">
                <div class="banner-search-wrap">
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
                                        <select class="select2 single-select mr-0" name="location">
                                            <option value="1">Location</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->transid }}">{{ $state->name }}
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
            <section class="headings-2 pt-0">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                            <div class="text-heading text-left">
                                <p class="font-weight-bold mb-0 mt-3">{{ $propertiesCount }} Search results</p>
                            </div>
                        </div>
                    </div>
                    <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center">
                        <div class="sorting-options">
                            <a href="#" class="change-view-btn lde"><i
                                    class="fa fa-th-list"></i></a>
                            <a href="#" class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                @foreach ($properties as $property)
                    <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                        <div class="project-single" data-aos="fade-up">
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <!-- homes img -->
                                    <a href="{{ config('app.url') }}/property/{{ $property->transid }}"
                                        class="homes-img">
                                        <div class="homes-tag button alt sale">For {{ ucfirst($property->status) }}</div>
                                        <div class="homes-price">GH₵ {{ number_format($property->price, 2) }}</div>
                                        <img src="{{ $property->pictures[0] }}" alt="home-1" class="img-responsive">
                                    </a>
                                </div>
                                <div class="button-effect">
                                    <a href="feature" class="btn"><i class="fa fa-link"></i></a>
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
                                    <a href="{{ config('app.url') }}/property/{{ $property->transid }}">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $properties->links('vendor.pagination.paginator') }}
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->

@endsection
