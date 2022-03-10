@extends('layouts.layouts')
@section('page-name', 'Login')
@section('page-content')
    <div id="main">
        <div id="slider" style="height:600px;"></div>
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
                var myLatlng = new google.maps.LatLng(-38.1485437, 144.36134790000006);
                var mapOptions = {
                    zoom: 9,
                    scrollwheel: !1,
                    center: myLatlng
                }
                var map = new google.maps.Map(document.getElementById("slider"), mapOptions);
                var markers = new Array();
                var info_windows = new Array();
                markers[0] = new google.maps.Marker({
                    position: new google.maps.LatLng(-37.53973498971008, 143.84681235624998),
                    map: map,
                    title: "Classic Brick Building",
                    icon: "http://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/farm-house.png"
                });
                info_windows[0] = new google.maps.InfoWindow({
                    content: "<div class=\"top-map-info-window\"><a class=\"thumb\" href=\"https://dtrealproperty.wpengine.com/dt_properties/classic-brick-building/\"><img class=\"thumb\" src=\"https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property5.jpg\" alt=\"Classic Brick Building\"/><span class=\"map-pro-price\">$50,000.00</span></a><h5 class=\"map-pro-title\"><a href=\"https://dtrealproperty.wpengine.com/dt_properties/classic-brick-building/\">Classic Brick Building</a></h5><a class=\"dt-sc-button filled small\" href=\"https://dtrealproperty.wpengine.com/dt_properties/classic-brick-building/\">Know More</a></div>"
                });
                attachInfoWindowToMarker(map, markers[0], info_windows[0]);
                markers[1] = new google.maps.Marker({
                    position: new google.maps.LatLng(-37.90254791086959, 144.68726645781248),
                    map: map,
                    title: "Condo 240 W 98th Street",
                    icon: "http://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/condo.png"
                });
                info_windows[1] = new google.maps.InfoWindow({
                    content: "<div class=\"top-map-info-window\"><a class=\"thumb\" href=\"https://dtrealproperty.wpengine.com/dt_properties/condo-240-w-98th-street/\"><img class=\"thumb\" src=\"https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property4.jpg\" alt=\"Condo 240 W 98th Street\"/><span class=\"map-pro-price\">$35,000.00</span></a><h5 class=\"map-pro-title\"><a href=\"https://dtrealproperty.wpengine.com/dt_properties/condo-240-w-98th-street/\">Condo 240 W 98th Street</a></h5><a class=\"dt-sc-button filled small\" href=\"https://dtrealproperty.wpengine.com/dt_properties/condo-240-w-98th-street/\">Know More</a></div>"
                });
                attachInfoWindowToMarker(map, markers[1], info_windows[1]);
                markers[2] = new google.maps.Marker({
                    position: new google.maps.LatLng(-37.91771681114588, 145.10474692656248),
                    map: map,
                    title: "6 Acre Lake Property",
                    icon: "https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/images/default-marker.png"
                });
                info_windows[2] = new google.maps.InfoWindow({
                    content: "<div class=\"top-map-info-window\"><a class=\"thumb\" href=\"https://dtrealproperty.wpengine.com/dt_properties/6-acre-lake-property/\"><img class=\"thumb\" src=\"https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property10.jpg\" alt=\"6 Acre Lake Property\"/><span class=\"map-pro-price\">$45,000.00</span></a><h5 class=\"map-pro-title\"><a href=\"https://dtrealproperty.wpengine.com/dt_properties/6-acre-lake-property/\">6 Acre Lake Property</a></h5><a class=\"dt-sc-button filled small\" href=\"https://dtrealproperty.wpengine.com/dt_properties/6-acre-lake-property/\">Know More</a></div>"
                });
                attachInfoWindowToMarker(map, markers[2], info_windows[2]);
                markers[3] = new google.maps.Marker({
                    position: new google.maps.LatLng(-38.038955382585364, 144.50324546171873),
                    map: map,
                    title: "Ultimate Swan River views",
                    icon: "http://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/single-family.png"
                });
                info_windows[3] = new google.maps.InfoWindow({
                    content: "<div class=\"top-map-info-window\"><a class=\"thumb\" href=\"https://dtrealproperty.wpengine.com/dt_properties/ultimate-swan-river-views/\"><img class=\"thumb\" src=\"https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property10.jpg\" alt=\"Ultimate Swan River views\"/><span class=\"map-pro-price\">$35.00</span></a><h5 class=\"map-pro-title\"><a href=\"https://dtrealproperty.wpengine.com/dt_properties/ultimate-swan-river-views/\">Ultimate Swan River views</a></h5><a class=\"dt-sc-button filled small\" href=\"https://dtrealproperty.wpengine.com/dt_properties/ultimate-swan-river-views/\">Know More</a></div>"
                });
                attachInfoWindowToMarker(map, markers[3], info_windows[3])
            }
        }

    </script>
    <script type='text/javascript'
        src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCBEAoMjpxgfiNSG9shm9PiO7lijV-w19c&#038;callback=initMap&#038;ver=5.8'
        id='dt-map-js'></script>
@endsection
