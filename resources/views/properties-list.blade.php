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
                            <a href="/">Home</a>
                            <span class="fa fa-angle-double-right"> </span>
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
                        class="property-grid-type"> <span> </span>Grid</a>
                    <a href="{{ config('app.url') }}/properties-list/all/all/all" class="property-list-type active">
                        <span> </span>List</a>
                </div>
                <div class="dt-sc-clear"></div>



                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sale">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sale/'>Sale</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property11.jpg'
                                    alt='' title='' /></li>
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property8.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/office/'>Office</a></span><span
                                class="property-price">$ 56,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/central-park-view/'>Central
                                    Park View</a></h2>
                            <h3>1 Willis Street, Wellington, Lambton 6011, New Zealand</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>65000/m<sup>2</sup><span>Area</span></li>
                                <li>4<span>Beds</span></li>
                                <li>3<span>Baths</span></li>
                                <li>5<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/central-park-view/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type rent">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/rent/'>Rent</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property6.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/single-family/'>Single
                                    Family</a></span><span class="property-price">$ 55,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/snowy-mountain-cabin-2/'>Snowy
                                    Mountain Cabin</a></h2>
                            <h3>302 Church Street, Ryerson University, Toronto, ON M5B 1E9, Canada</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>35000/m<sup>2</sup><span>Area</span></li>
                                <li>4<span>Beds</span></li>
                                <li>5<span>Baths</span></li>
                                <li>3<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/snowy-mountain-cabin-2/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sale">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sale/'>Sale</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property4.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/farm-house/'>Farm
                                    House</a></span><span class="property-price">$ 35,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/the-urban-life/'>The
                                    Urban Life</a></h2>
                            <h3>The PATH - City Hall, Toronto, ON M5H, Canada</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>45000/m<sup>2</sup><span>Area</span></li>
                                <li>2<span>Beds</span></li>
                                <li>2<span>Baths</span></li>
                                <li>2<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/the-urban-life/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sold">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sold/'>Sold</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property7.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/villa/'>Villa</a></span><span
                                class="property-price">$ 45,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/four-story-apartment/'>Four
                                    Story Apartment</a></h2>
                            <h3>34-80 B82, Cessnock NSW 2325, Australia</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>32000/m<sup>2</sup><span>Area</span></li>
                                <li>2<span>Beds</span></li>
                                <li>1<span>Baths</span></li>
                                <li>4<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/four-story-apartment/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type rent">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/rent/'>Rent</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property4.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/residential/'>Residential</a></span><span
                                class="property-price">$ 50,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/snowy-mountain-cabin/'>Snowy
                                    Mountain Cabin</a></h2>
                            <h3>34-80 B82, Cessnock NSW 2325, Australia</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>33000/m<sup>2</sup><span>Area</span></li>
                                <li>2<span>Beds</span></li>
                                <li>3<span>Baths</span></li>
                                <li>2<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/snowy-mountain-cabin/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sold">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sold/'>Sold</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property9.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/single-family/'>Single
                                    Family</a></span><span class="property-price">$ 45,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/cabin-in-the-woods/'>Cabin
                                    In The Woods</a></h2>
                            <h3>34-80 B82, Cessnock NSW 2325, Australia</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>25000/m<sup>2</sup><span>Area</span></li>
                                <li>3<span>Beds</span></li>
                                <li>2<span>Baths</span></li>
                                <li>3<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/cabin-in-the-woods/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sale">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sale/'>Sale</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property12.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/commercial/'>Commercial</a></span><span
                                class="property-price">$ 50.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/house-on-the-beach/'>House
                                    On The Beach</a></h2>
                            <h3>800 Macleod Trail Southeast, Calgary, AB T2G 2M3, Canada</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>67000/m<sup>2</sup><span>Area</span></li>
                                <li>4<span>Beds</span></li>
                                <li>3<span>Baths</span></li>
                                <li>5<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/house-on-the-beach/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sale">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sale/'>Sale</a> </span>
                        <ul class="porperty-slider">
                            <li> <img
                                    src='https://dtrealproperty.wpengine.com/wp-content/uploads/2018/03/Z-Apartment-06-1.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/show-rooms/'>Show
                                    Rooms</a></span><span class="property-price">$ 65,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/las-angeles-mansion/'>Las
                                    Angeles Mansion</a></h2>
                            <h3>800 Macleod Trail Southeast, Calgary, AB T2G 2M3, Canada</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>60000/m<sup>2</sup><span>Area</span></li>
                                <li>5<span>Beds</span></li>
                                <li>5<span>Baths</span></li>
                                <li>4<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/las-angeles-mansion/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sold">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sold/'>Sold</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property1.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/villa/'>Villa</a></span><span
                                class="property-price">$ 40,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/limestone-estate/'>Limestone
                                    Estate</a></h2>
                            <h3>800 Macleod Trail Southeast, Calgary, AB T2G 2M3, Canada</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>45000/m<sup>2</sup><span>Area</span></li>
                                <li>2<span>Beds</span></li>
                                <li>1<span>Baths</span></li>
                                <li>2<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/limestone-estate/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sale">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sale/'>Sale</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property5.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/farm-house/'>Farm
                                    House</a></span><span class="property-price">$ 50,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/classic-brick-building/'>Classic
                                    Brick Building</a></h2>
                            <h3>250 Bourke Street Mall, Melbourne's GPO, Melbourne VIC 3000, Australia</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>45000/m<sup>2</sup><span>Area</span></li>
                                <li>3<span>Beds</span></li>
                                <li>2<span>Baths</span></li>
                                <li>2<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/classic-brick-building/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type sale">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/sale/'>Sale</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property4.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/condo/'>Condo</a></span><span
                                class="property-price">$ 35,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/condo-240-w-98th-street/'>Condo
                                    240 W 98th Street</a></h2>
                            <h3>341 Bourke Street, Melbourne VIC 3000, Australia</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>55000/m<sup>2</sup><span>Area</span></li>
                                <li>4<span>Beds</span></li>
                                <li>3<span>Baths</span></li>
                                <li>4<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/condo-240-w-98th-street/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="property-item property-list-view">

                    <div class="property-thumb">
                        <span class="property-contract-type rent">
                            <a href='https://dtrealproperty.wpengine.com/contract_type/rent/'>Rent</a> </span>
                        <ul class="porperty-slider">
                            <li> <img src='https://dtrealproperty.wpengine.com/wp-content/uploads/2014/04/property10.jpg'
                                    alt='' title='' /></li>
                        </ul>

                        <div class="property-thumb-meta"><span class='property-type'><a
                                    href='https://dtrealproperty.wpengine.com/property_type/cottage/'>Cottage</a></span><span
                                class="property-price">$ 45,000.00</span> </div>
                    </div>

                    <div class="property-details">
                        <div class="property-details-inner">
                            <h2><a href='https://dtrealproperty.wpengine.com/dt_properties/6-acre-lake-property/'>6
                                    Acre Lake Property</a></h2>
                            <h3>250 Bourke Street Mall, Melbourne's GPO, Melbourne VIC 3000, Australia</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>


                            <ul class="property-meta">
                                <li>60000/m<sup>2</sup><span>Area</span></li>
                                <li>5<span>Beds</span></li>
                                <li>2<span>Baths</span></li>
                                <li>3<span>Floors</span></li>
                                <li class='read-more'><a
                                        href='https://dtrealproperty.wpengine.com/dt_properties/6-acre-lake-property/'>More
                                        Details <i class='fa fa-angle-double-right'></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="dt-sc-clear"></div>


                <div class="pagination">
                    <div class="prev-post"></div>
                    <ul class=''>
                        <li class='active-page'>1</li>
                        <li><a href='https://dtrealproperty.wpengine.com/dt_properties/page/2/?view=list'
                                class='inactive'>2</a>
                        </li>
                        <li><a href='https://dtrealproperty.wpengine.com/dt_properties/page/3/?view=list'
                                class='inactive'>3</a>
                        </li>
                    </ul>
                    <div class="next-post"><a
                            href="https://dtrealproperty.wpengine.com/dt_properties/page/2/?view=list">Next<span
                                class="fa fa-angle-double-right"></span></a></div>
                </div>
            </section>
        </div>
    </div>
@endsection
