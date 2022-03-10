@extends('layouts.landing.layout')
@section('page-name', 'Property detail')
@section('page-content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Property Detail</h1>
                <h2><a href="{{ config('app.url') }}">Home </a> &nbsp;/&nbsp; Details</h2>
            </div>
        </div>
    </section>

    <!-- START SECTION PROPERTIES LISTING -->
    <section class="single-proper blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="headings-2 pt-0 col-6">
                                <div class="pro-wrapper">
                                    <div class="detail-wrapper-body col-8">
                                        <div class="listing-title-bar">
                                            <h3>{{ $property->title }}<span class="mrg-l-5 category-tag">For
                                                    {{ ucfirst($property->status) }}</span></h3>
                                            <div class="mt-0">
                                                <a href="#listing-location" class="listing-address">
                                                    <i
                                                        class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>{{ $property->address }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single detail-wrapper mr-2 col-4">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h4>GH₵ {{ number_format($property->price, 2) }}</h4>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <p>{{ $property->area }}/m<sup>2</sup></p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- main slider carousel items -->
                            <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                <h5 class="mb-4">Gallery</h5>
                                <div class="carousel-inner">
                                    @foreach ($property->pictures as $key => $picture)
                                        <div class=" @if ($key==0) active @endif item carousel-item" data-slide-number="{{ $key }}">
                                            <img src="{{ asset($picture) }}" class="img-fluid" alt="slider-listing">
                                        </div>
                                    @endforeach

                                    <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i
                                            class="fa fa-angle-left"></i></a>
                                    <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i
                                            class="fa fa-angle-right"></i></a>

                                </div>
                                <!-- main slider carousel nav controls -->
                                <ul class="carousel-indicators smail-listing list-inline">
                                    @foreach ($property->pictures as $key => $picture)
                                        <li class="list-inline-item @if ($key==0) active @endif">
                                            <a id="carousel-selector-{{ $key }}" class=" @if ($key==0) selected @endif"
                                                data-slide-to="{{ $key }}" data-target="#listingDetailsSlider">
                                                <img src="{{ asset($picture) }}" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- main slider carousel items -->
                            </div>
                            <div class="blog-info details mb-30">
                                <h5 class="mb-4">Description</h5>
                                <p class="mb-3">{{ $property->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="single homes-content details mb-30">
                        <!-- title -->
                        <h5 class="mb-4">Property Details</h5>
                        <ul class="homes-list clearfix">
                            <li>
                                <span class="font-weight-bold mr-1">Property ID:</span>
                                <span class="det">{{ $property->transid }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Property Type:</span>
                                <span class="det">{{ $property->buildingType->description }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Area:</span>
                                <span class="det">{{ $property->area }}/m<sup>2</sup></span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Property status:</span>
                                <span class="det">For {{ ucfirst($property->status) }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Property Price:</span>
                                <span class="det">GH₵ {{ number_format($property->price, 2) }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Bedrooms:</span>
                                <span class="det">{{ $property->bedrooms }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Bath:</span>
                                <span class="det">{{ $property->baths }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Garages:</span>
                                <span class="det">{{ $property->garages }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Floors:</span>
                                <span class="det">{{ $property->floors }}</span>
                            </li>
                        </ul>
                        <!-- title -->
                        <h5 class="mt-5">Amenities</h5>
                        <!-- cars List -->
                        <ul class="homes-list clearfix">
                            @foreach ($property->amenities as $amenity)
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>{{ $amenity }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single homes-content details mb-30">
                        <h5>Miscellaneous</h5>
                        <div class="property-nearby">
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach ($property->misc as $item)

                                        <div class="nearby-info mb-4">
                                            <span class="nearby-title mb-3 d-block">
                                                <i class="fa fa-check-square mr-2"></i>{{ $item }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="property wprt-image-video w50 pro">
                        <h5>Property Video</h5>
                        <video src="https://www.youtube.com/watch?v=14semTlwyUY"></video>
                        {{-- <img alt="image" src="{{ asset('assets/landing/images/slider/home-slider-4.jpg') }}">
                        <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=14semTlwyUY">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div> --}}
                    </div>
                    <div class="property-location map">
                        <h5>Location</h5>
                        <div class="divider-fade"></div>
                        <div id="map-contact" class="contact-map"></div>
                    </div>
                    <!-- Star Reviews -->
                    {{-- <section class="reviews comments">
                    <h3 class="mb-5">3 Reviews</h3>
                    <div class="row mb-5">
                        <ul class="col-12 commented pl-0">
                            <li class="comm-inf">
                                <div class="col-md-2">
                                    <img src="images/testimonials/ts-5.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-10 comments-info">
                                    <div class="conra">
                                        <h5 class="mb-2">Mary Smith</h5>
                                        <div class="rating-box">
                                            <div class="detail-list-rating mr-0">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-4">May 30 2020</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                    <div class="rest"><img src="images/single-property/s-1.jpg" class="img-fluid" alt=""></div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="row">
                        <ul class="col-12 commented pl-0">
                            <li class="comm-inf">
                                <div class="col-md-2">
                                    <img src="images/testimonials/ts-4.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-10 comments-info">
                                    <div class="conra">
                                        <h5 class="mb-2">Abraham Tyron</h5>
                                        <div class="rating-box">
                                            <div class="detail-list-rating mr-0">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-4">june 1 2020</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="row mt-5">
                        <ul class="col-12 commented mb-0 pl-0">
                            <li class="comm-inf">
                                <div class="col-md-2">
                                    <img src="images/testimonials/ts-3.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-10 comments-info">
                                    <div class="conra">
                                        <h5 class="mb-2">Lisa Williams</h5>
                                        <div class="rating-box">
                                            <div class="detail-list-rating mr-0">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-4">jul 12 2020</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                    <div class="resti">
                                        <div class="rest"><img src="images/single-property/s-2.jpg" class="img-fluid" alt=""></div>
                                        <div class="rest"><img src="images/single-property/s-3.jpg" class="img-fluid" alt=""></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section> --}}

                    <!-- End Reviews -->
                    <!-- Star Add Review -->
                    {{-- <section class="single reviews leve-comments details">
                    <div id="add-review" class="add-review-box">
                        <!-- Add Review -->
                        <h3 class="listing-desc-headline margin-bottom-20 mb-4">Add Review</h3>
                        <span class="leave-rating-title">Your rating for this listing</span>
                        <!-- Rating / Upload Button -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <!-- Leave Rating -->
                                <div class="clearfix"></div>
                                <div class="leave-rating margin-bottom-30">
                                    <input type="radio" name="rating" id="rating-1" value="1" />
                                    <label for="rating-1" class="fa fa-star"></label>
                                    <input type="radio" name="rating" id="rating-2" value="2" />
                                    <label for="rating-2" class="fa fa-star"></label>
                                    <input type="radio" name="rating" id="rating-3" value="3" />
                                    <label for="rating-3" class="fa fa-star"></label>
                                    <input type="radio" name="rating" id="rating-4" value="4" />
                                    <label for="rating-4" class="fa fa-star"></label>
                                    <input type="radio" name="rating" id="rating-5" value="5" />
                                    <label for="rating-5" class="fa fa-star"></label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6">
                                <!-- Uplaod Photos -->
                                <div class="add-review-photos margin-bottom-30">
                                    <div class="photoUpload">
                                        <span><i class="sl sl-icon-arrow-up-circle"></i> Upload Photos</span>
                                        <input type="file" class="upload" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 data">
                                <form action="#">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" id="exampleTextarea" rows="8" placeholder="Review" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg mt-2">Submit Review</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section> --}}
                    <!-- End Add Review -->
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="single widget">
                        @if (Auth::user())
                            <!-- Start: Schedule a Tour -->
                            <div class="schedule widget-boxed mt-33 mt-0">
                                <div class="widget-boxed-header">
                                    <h4><i class="fa fa-calendar pr-3 padd-r-10"></i>Book Room</h4>
                                </div>
                                <form id="book-room-form" enctype="multipart/form-data">
                                    <div class="widget-boxed-body">
                                        @if (!$checkIfBooked)
                                            <div class="row mrg-top-15 mb-3 book-room">
                                                <input type="hidden" name="property" required
                                                    value="{{ $property->transid }}">
                                                <div class="rld-single-select col-12">
                                                    <label>Book for</label>
                                                    <select class="select single-select drop mr-0" id='ifo' name="ifo">
                                                        <option value="self">Self</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 mt-2 ifo" style="display: none">
                                                    <label>Person Name</label>
                                                    <div class="form-group">
                                                        <input type="text" style="height:50px"
                                                            class="form-control input-custom input-full" name="ifo_name">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 ifo" style="display: none">
                                                    <label>Phone</label>
                                                    <div class="form-group">
                                                        <input type="text" style="height:50px"
                                                            class="form-control input-custom input-full" name="ifo_phone">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <label>Number of Persons</label>
                                                    <div class="form-group">
                                                        <input type="number" min="1" style="height:50px" required
                                                            class="form-control input-custom input-full"
                                                            name="occupants_no">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" form="book-room-form"
                                                class="btn reservation btn-radius theme-btn full-width mrg-top-10 book-room">Book
                                                Room</button>
                                        @else
                                            <a
                                                class="btn reservation btn-radius theme-btn full-width mrg-top-10 text-white booked">Booked</a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <!-- End: Schedule a Tour -->
                        @else
                            <!-- Start: Schedule a Tour -->
                            <div class="schedule widget-boxed mt-33 mt-0">
                                <div class="widget-boxed-header">
                                    <h4><i class="fa fa-calendar pr-3 padd-r-10"></i>Book Room</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <button type="button"
                                        class="show-reg-form modal-open btn reservation btn-radius theme-btn full-width mrg-top-10">Create Account or
                                        Login to Book!</button>
                                </div>
                            </div>
                            <!-- End: Schedule a Tour -->
                        @endif;

                        <!-- end author-verified-badge -->
                        <div class="sidebar">

                            <div class="main-search-field-2">

                                <!-- Start: enquiry offer -->
                                <div class="widget-boxed popular mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>Make an Enquiry</h4>
                                    </div>
                                    <form id="enquiry-form" enctype="multipart/form-data">
                                        <div class="widget-boxed-body">
                                            <input type="hidden" name="propertyID" required
                                                value="{{ $property->transid }}">
                                            <div class="row mrg-top-15 mb-3">
                                                <div class="col-12 mt-2">
                                                    <label>Name</label>
                                                    <div class="form-group">
                                                        <input type="text" style="height:50px" required
                                                            class="form-control input-custom input-full" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <label>Email</label>
                                                    <div class="form-group">
                                                        <input type="email" style="height:50px" required
                                                            class="form-control input-custom input-full" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <label>Phone</label>
                                                    <div class="form-group">
                                                        <input type="text" style="height:50px" required
                                                            class="form-control input-custom input-full" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <label>Message</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control input-custom input-full"
                                                            name="message" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" form="enquiry-form"
                                                class="btn reservation btn-radius theme-btn full-width mrg-top-10 text-white"
                                                style="width:100%">Send</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End: Specials offer -->
                                <div class="widget-boxed popular mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>Popular Tags</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="recent-post">
                                            <div class="tags">
                                                <span><a href="#" class="btn btn-outline-primary">Houses</a></span>
                                                <span><a href="#" class="btn btn-outline-primary">Real Home</a></span>
                                            </div>
                                            <div class="tags">
                                                <span><a href="#" class="btn btn-outline-primary">Baths</a></span>
                                                <span><a href="#" class="btn btn-outline-primary">Beds</a></span>
                                            </div>
                                            <div class="tags">
                                                <span><a href="#" class="btn btn-outline-primary">Garages</a></span>
                                                <span><a href="#" class="btn btn-outline-primary">Family</a></span>
                                            </div>
                                            <div class="tags">
                                                <span><a href="#" class="btn btn-outline-primary">Real Estates</a></span>
                                                <span><a href="#" class="btn btn-outline-primary">Properties</a></span>
                                            </div>
                                            <div class="tags no-mb">
                                                <span><a href="#" class="btn btn-outline-primary">Location</a></span>
                                                <span><a href="#" class="btn btn-outline-primary">Price</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <!-- START SIMILAR PROPERTIES -->
            <section class="similar-property featured portfolio p-0 bg-white-inner">
                <div class="container">
                    <h5>Similar Properties</h5>
                    <div class="row portfolio-items">
                        @foreach ($similarProperties as $property)
                            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="{{ config('app.url') }}/property/{{ $property->transid }}"
                                                class="homes-img">
                                                <div class="homes-tag button alt sale">For
                                                    {{ ucfirst($property->status) }}</div>
                                                <div class="homes-price">GHS {{ number_format($property->price, 2) }}
                                                </div>
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
                                                <span>{{ $property->garages }}/m<sup>2</sup> Garages</span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- END SIMILAR PROPERTIES -->
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->
    <script>
        $('#ifo').change(function() {
            this.value == 'self' ? $('.ifo').css("display", "none") : $('.ifo').css("display", "block");
        });

        var bookRoomForm = document.getElementById("book-room-form");

        $(bookRoomForm).submit(function(e) {
            e.preventDefault();

            var formdata = new FormData(bookRoomForm)
            formdata.append("userid", CREATEUSER);

            Swal.fire({
                title: 'Are you sure you want to book room?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Book'

            }).then((result) => {

                if (result.value) {
                    Swal.fire({
                        text: "Booking Room...",
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false
                    });
                    fetch(`${APP_URL}/api/booking`, {
                        method: "POST",
                        body: formdata,
                    }).then(function(res) {
                        return res.json()
                    }).then(function(data) {
                        if (!data.ok) {
                            Swal.fire({
                                text: data.msg,
                                icon: "error"
                            });
                            return;
                        }
                        Swal.fire({
                            text: data.msg,
                            icon: "success"
                        });
                        window.location.reload();
                        // bookRoomForm.reset();
                        // $(".drop").val(null).trigger('change');
                        // $('.book-room').css("display", "none");
                        // $('.booked').css("display", "block");

                    }).catch(function(err) {
                        if (err) {
                            Swal.fire({
                                text: "Booking failed"
                            });
                        }
                    })
                }
            })
        });

        var enquiryForm = document.getElementById("enquiry-form");

        $(enquiryForm).submit(function(e) {
            e.preventDefault();

            var formdata = new FormData(enquiryForm)

            Swal.fire({
                text: "Sending Enquiry...",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false
            });
            fetch(`${APP_URL}/api/enquiries`, {
                method: "POST",
                body: formdata,
            }).then(function(res) {
                return res.json()
            }).then(function(data) {
                if (!data.ok) {
                    Swal.fire({
                        text: data.msg,
                        icon: "error"
                    });
                    return;
                }
                Swal.fire({
                    text: data.msg,
                    icon: "success"
                });
                enquiryForm.reset();

            }).catch(function(err) {
                if (err) {
                    Swal.fire({
                        text: "Sending Enquiry failed"
                    });
                }
            })
        });

    </script>
@endsection

@push('js-scripts')

@endpush
