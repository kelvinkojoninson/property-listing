@extends('layouts.landing.layout')
@section('page-name', ' | About Us')
@section('page-content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>About Us</h1>
                <h2><a href="{{ config('app.url') }}">Home </a> &nbsp;/&nbsp; About Us</h2>
            </div>
        </div>
    </section>

    <!-- START SECTION ABOUT -->
    <section class="about-us fh">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 who-1">
                    <div>
                        <h2 class="text-left mb-4">About <span>Pay Daily</span></h2>
                    </div>
                    <div class="pftext">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt
                            cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam
                            ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt
                            cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam
                            ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.</p>
                    </div>
                    <div class="box bg-2">
                        <a href="about.html"
                            class="text-center button button--moema button--text-thick button--text-upper button--size-s">read
                            More</a>
                        <img src="{{ asset('assets/landing/images/signature.png') }}" class="ml-5" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="wprt-image-video w50">
                        <img alt="image" src="{{ asset('assets/landing/images/bg/bg-video.jpg') }}">
                        <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=2xHQqYRcrx4">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION ABOUT -->

    <!-- START SECTION WHY CHOOSE US -->
    <section class="how-it-works bg-white-2">
        <div class="container">
            <div class="sec-title">
                <h2><span>Why </span>Choose Us</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row service-1">
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
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
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
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
                <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up">
                    <div class="serv-flex arrow">
                        <div class="art-1 img-15">
                            <img src="{{ asset('assets/landing/images/icons/icon-6.svg') }}" alt="">
                            <h3>Financing made easy</h3>
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

    <!-- START SECTION COUNTER UP -->
    <section class="counterup">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">300</p>
                            <h3>Sold Houses</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">400</p>
                            <h3>Daily Listings</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr mb-0">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">250</p>
                            <h3>Expert Agents</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr mb-0 last">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">200</p>
                            <h3>Won Awars</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COUNTER UP -->

    <!-- START SECTION AGENTS -->
    <section class="team">
        <div class="container">
            <div class="sec-title">
                <h2><span>Our </span>Team</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row team-all">
                <div class="col-lg-3 col-md-6 team-pro">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="{{ asset('assets/landing/images/team/t-5.jpg') }}" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Carls Jhons</h3>
                                <p>Financial Advisor</p>
                                <div class="team-socials">
                                    <ul>
                                        <li>
                                            <a href="#" title="facebook"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                            <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" title="instagran"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span><a href="team-details.html">View Profile</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 team-pro">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="{{ asset('assets/landing/images/team/t-6.jpg') }}" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Arling Tracy</h3>
                                <p>Acountant</p>
                                <div class="team-socials">
                                    <ul>
                                        <li>
                                            <a href="#" title="facebook"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                            <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" title="instagran"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span><a href="team-details.html">View Profile</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 team-pro pb-none">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="{{ asset('assets/landing/images/team/t-7.jpg') }}" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Mark Web</h3>
                                <p>Founder &amp; CEO</p>
                                <div class="team-socials">
                                    <ul>
                                        <li>
                                            <a href="#" title="facebook"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                            <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" title="instagran"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span><a href="team-details.html">View Profile</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 team-pro kat">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="{{ asset('assets/landing/images/team/t-8.jpg') }}" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Katy Grace</h3>
                                <p>Team Leader</p>
                                <div class="team-socials">
                                    <ul>
                                        <li>
                                            <a href="#" title="facebook"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                            <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" title="instagran"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span><a href="team-details.html">View Profile</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION AGENTS -->

    <!-- STAR SECTION PARTNERS -->
    <div class="partners bg-white-2">
        <div class="container">
            <div class="sec-title">
                <h2><span>Our </span>Partners</h2>
                <p>The Companies That Represent Us.</p>
            </div>
            <div class="owl-carousel style2">
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/11.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/12.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/13.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/14.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/15.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/16.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/17.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/11.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/12.jpg') }}" alt=""></div>
                <div class="owl-item"><img src="{{ asset('assets/landing/images/partners/13.jpg') }}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- END SECTION PARTNERS -->
@endsection
