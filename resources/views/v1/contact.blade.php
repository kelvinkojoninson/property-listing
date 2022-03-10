@extends('layouts.layouts')
@section('page-name', 'Contact')
@section('page-content')
    <div id="main">
        <section class='fullwidth-background dark-bg'
            style='background:url({{ asset('assets/landing/parallax-building.jpg') }}) center center repeat'>
            <div class="fullwidth-background-wrapper">
                <div class="container">
                    <div class="main-title-section">
                        <h1>Contact</h1>
                        <div class="breadcrumb">
                            <a href="{{ config('app.url') }}">Home</a><span class='fa fa-angle-double-right'>
                            </span><span class="current">Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="primary" class="content-full-width">
            <div id="post-21" class="post-21 page type-page status-publish hentry">
                <div class='fullwidth-section '>
                    <div class="container">
                        <div class='column dt-sc-two-third  space first'>
                            <h3 class='border-title alignleft'><span>Give us a message</span></h3>
                            <div role="form" class="wpcf7" id="wpcf7-f5-p21-o1" lang="en-US" dir="ltr">
                                <div class="screen-reader-response">
                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                    <ul></ul>
                                </div>
                                <form id="send-message-form" class="wpcf7-form init">
                                    <p>Your Name (required)
                                        <span class="wpcf7-form-control-wrap your-name"><input type="text" name="name"
                                                value="" size="40" required id="fname"
                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                aria-required="true" aria-invalid="false" /></span>
                                    </p>
                                    <p>Your Email (required)
                                        <span class="wpcf7-form-control-wrap your-email"><input type="email" name="email"
                                                value="" size="40" required
                                                class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                aria-required="true" aria-invalid="false" /></span>
                                    </p>
                                    <p>Subject
                                        <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="subject"
                                                value="" required size="40" class="wpcf7-form-control wpcf7-text"
                                                aria-invalid="false" /></span>
                                    </p>
                                    <p>Your Message
                                        <span class="wpcf7-form-control-wrap your-message"><textarea name="message"
                                                cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" required
                                                aria-invalid="false"></textarea></span>
                                    </p>
                                    <p><input type="submit" form="send-message-form" value="Send"
                                            class="wpcf7-form-control wpcf7-submit" /></p>
                                </form>
                            </div>
                        </div>
                        <div class='column dt-sc-one-third  space '>
                            <h3 class='border-title alignleft'><span>Contact Info</span></h3>
                            <div class="dt-sc-contact-info address">
                                <div class='icon'><i class='fa fa-rocket'></i></div>
                                <p>Pay Daily<br>Heritage Tower, Ridge 2233 Ghana.
                                <p><span></span>
                            </div>
                            <div class="dt-sc-contact-info">
                                <div class='icon'><i class='fa fa-phone'></i></div>
                                <p><a href='tel:+1 200 258 2145'>+233 000 000 000</a></p><span></span>
                            </div>
                            <div class="dt-sc-contact-info">
                                <div class='icon'><i class='fa fa-mobile-phone'></i></div>
                                <p>+233 0000 11111</p><span></span>
                            </div>
                            <div class="dt-sc-contact-info">
                                <div class='icon'><i class='fa fa-envelope-o'></i></div>
                                <p><a href='mailto:super@email.com'>super@email.com</a></p><span></span>
                            </div>
                            <div class="dt-sc-contact-info">
                                <div class='icon'><i class='fa fa-globe'></i></div>
                                <p><a target='_blank' href='http://www.google.com/'>google.com</a></p>
                                <span></span>
                            </div>
                            <div class='dt-sc-hr-invisible  '></div>
                            <ul class='dt-sc-social-icons'>
                                <li class='google'><a href='#' target='_blank'><img
                                            src='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/sociable/hover/google.png'
                                            alt='google.png' /><img
                                            src='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/sociable/google.png'
                                            alt='google.png' /> </a></li>
                                <li class='facebook'><a href='http://google.com/' target='_blank'><img
                                            src='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/sociable/hover/facebook.png'
                                            alt='facebook.png' /><img
                                            src='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/sociable/facebook.png'
                                            alt='facebook.png' /> </a></li>
                                <li class='picasa'><a href='#' target='_blank'><img
                                            src='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/sociable/hover/picasa.png'
                                            alt='picasa.png' /><img
                                            src='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/sociable/picasa.png'
                                            alt='picasa.png' /> </a></li>
                                <li class='flickr'><a href='#' target='_blank'><img
                                            src='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/sociable/hover/flickr.png'
                                            alt='flickr.png' /><img
                                            src='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/sociable/flickr.png'
                                            alt='flickr.png' /> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dt-sc-clear"></div>
                <div class='dt-sc-hr-invisible-medium  '></div>
                <div id="slider" class="responsive-map" style="height:500px;width:100%;">
                </div>
                <div class="container">
                    <div class="social-bookmark"></div>
                    <div class="social-share"></div>
                </div>
            </div>

        </section>
    </div>
    <script type='text/javascript' id='dt-map-js-before'>
        var map;

        function initMap() {
            function attachInfoWindowToMarker(map, marker, infoWindow) {
                google.maps.event.addListener(marker, "click", function() {
                    infoWindow.open(map, marker)
                })
            }
            if (jQuery("div#slider").length) {
                var myLatlng = new google.maps.LatLng(5.5565973, -0.2020188);
                var mapOptions = {
                    zoom: 9,
                    scrollwheel: !1,
                    center: myLatlng
                }
                var map = new google.maps.Map(document.getElementById("slider"), mapOptions);
                var markers = new Array();
                var info_windows = new Array();
                markers[0] = new google.maps.Marker({
                    position: new google.maps.LatLng(5.5565973, -0.2020188),
                    map: map,
                    title: "Head Office",
                    icon: "http://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/single-family.png"
                });
                info_windows[0] = new google.maps.InfoWindow({
                    content: "<div class=\"top-map-info-window\"><a class=\"thumb\" href=\"https://dtrealproperty.wpengine.com/dt_properties/ultimate-swan-river-views/\"><img class=\"thumb\" src=\"https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property10.jpg\" alt=\"Head Office\"/></a><h5 class=\"map-pro-title\"><a href=\"https://dtrealproperty.wpengine.com/dt_properties/ultimate-swan-river-views/\">Head Office</a></h5><a class=\"dt-sc-button filled small\" href=\"https://dtrealproperty.wpengine.com/dt_properties/ultimate-swan-river-views/\">Know More</a></div>"
                });
                attachInfoWindowToMarker(map, markers[0], info_windows[0])
            }
        }

    </script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script> 
        var sendMessageForm = document.getElementById("send-message-form");
        $(sendMessageForm).submit(function(e) {
            e.preventDefault();

            var formdata = new FormData(sendMessageForm)
            Swal.fire({
                title: 'Proceed to send message?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Submit'

            }).then((result) => {

                if (result.value) {
                    Swal.fire({
                        text: "Sending Message...",
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false
                    });
                    fetch(`${APP_URL}/api/enquiries/send_message`, {
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
                        sendMessageForm.reset();

                    }).catch(function(err) {
                        if (err) {
                            Swal.fire({
                                text: "Message not sent. Please try again."
                            });
                        }
                    })
                }
            })
        });

    </script>

    <script type='text/javascript'
        src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCBEAoMjpxgfiNSG9shm9PiO7lijV-w19c&#038;callback=initMap&#038;ver=5.8'
        id='dt-map-js'></script>

@endsection
