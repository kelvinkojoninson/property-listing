@section('footer')
    <footer id="footer">
        <div class="footer-widgets-wrapper">
            <div class="container">
                <div class='column dt-sc-one-fourth first'>
                    <aside id="categories-3" class="widget widget_categories">
                        <h3 class="widgettitle">Categories</h3>
                        <ul>
                            @foreach ($buildingTypes as $building_type)
                                <li class="cat-item cat-item-2"><a
                                        href="{{ config('app.url') }}/category/{{ $building_type->transid }}">{{ $building_type->description }}
                                        <span>({{ count($building_type->properties) }})</span></a>
                                </li>
                            @endforeach

                        </ul>

                    </aside>
                </div>
                <div class='column dt-sc-one-fourth '>
                    <aside id="my_property_widget-2" class="widget widget_popular_entries">
                        <h3 class="widgettitle">Latest Properties</h3>
                        <div class='recent-property-widget'>
                            <ul>
                                @foreach ($latest as $recent)
                                    <li><a href="{{ config('app.url') }}/property/{{ $recent->transid }}"
                                            class='thumb'><img src='{{ $recent->pictures[0] }}'
                                                alt='{{ $recent->title }}' /></a>
                                        <h6><a
                                                href="{{ config('app.url') }}/property/{{ $recent->transid }}">{{ $recent->title }}</a>
                                        </h6><span class="property-price">GHS {{ number_format($recent->price) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class='column dt-sc-one-fourth '>
                    <aside id="my_portfolio_widget-2" class="widget widget_popular_entries">
                        <h3 class="widgettitle">Portfolio</h3>
                        <div class='recent-portfolio-widget'>
                            <ul>
                                @foreach ($portfolios as $portfolio)
                                    <li><a href="{{ config('app.url') }}/property/{{ $portfolio->transid }}"
                                            class='thumb'><img
                                                src='{{ $portfolio->pictures[0] }}'
                                                alt="{{ $portfolio->title }}" /></a>
                                        <h6><a href="{{ config('app.url') }}/property/{{ $portfolio->transid }}">{{ $portfolio->title }}</a></h6>
                                        <p>{{ \Illuminate\Support\Str::limit($portfolio->description, 25, $end = '...') }}</p>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </aside>
                </div>
                <div class='column dt-sc-one-fourth '>
                    <aside id="my_mailchimp-2" class="widget mailchimp">
                        <h3 class="widgettitle">Get in touch</h3>
                        <form name="frmNewsletter" method="post" class="mailchimp-form">
                            <p><input type="text" required name="dt_mc_emailid" id="dt_mc_emailid"
                                    placeholder="Email Address" /></p> <input type='hidden' name='dt_mc_apikey'
                                id='dt_mc_apikey' value='c94a1d38b6683d601a324aeeb4d4ffe3-us1' /> <input type='hidden'
                                name='dt_mc_listid' id='dt_mc_listid' value='314bbca712' />
                            <p></p>
                            <p><input type="submit" name="submit" class="nl-submit" value="Signup" /></p>
                        </form>
                        <div id="ajax_newsletter_msg"></div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-info">Copyright &copy; {{ date('Y') }} Pay Daily All Rights Reserved</div>
                <div class="footer-links">
                    <p>Follow us</p>
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
    </footer>
@show
