@extends('layouts.layouts')
@section('page-name', 'Login')
@section('page-content')
    @php
    use App\Models\BuildingTypes;
    use App\Models\Properties;
    use App\Models\States;

    $buildingTypes = BuildingTypes::withCount('properties')
        ->where('deleted', 0)
        ->get();

    //  $cities = Cities::where('deleted', 0)->get();

    $propertyTypes = Properties::where('deleted', 0)
        ->whereIn('status', ['rent', 'sale'])
        ->inRandomOrder()
        ->limit(5)
        ->get();

    $latest = Properties::where('deleted', 0)
        ->whereIn('status', ['rent', 'sale'])
        ->inRandomOrder()
        ->orderByDesc('createdate')
        ->limit(3)
        ->get();

    $portfolios = Properties::where('deleted', 0)
        ->inRandomOrder()
        ->limit(3)
        ->get();

    $states = States::where('deleted', 0)
        ->where('country_id', 83)
        ->inRandomOrder()
        ->get();
    @endphp
    <div id="main">

        <section class='fullwidth-background dark-bg'
            style='background:url({{ asset('assets/landing/parallax-building.jpg') }}) center center repeat'>
            <div class="fullwidth-background-wrapper">
                <div class="container">
                    <div class="main-title-section">
                        <h1>Login</h1>
                        <div class="breadcrumb">
                            <a href="/">Home</a><span class='fa fa-angle-double-right'>
                            </span><span class="current">@yield('page-name')</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">

            <section id="primary" class="content-full-width">

                <div class="column dt-sc-one-half first">

                    <h2 class="border-title alignleft"> <span>Login Form</span> </h2>

                    <p> <strong>Already a Member? Log in here.</strong> </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p>
                            <label>Username<span class="required"> * </span></label>
                            <input type="text" id="email" name="email" class="input @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" size="20" tabindex="10" required="required" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors }}</strong>
                                </span>
                            @enderror
                        </p>

                        <p>
                            <label>Password<span class="required"> * </span> </label>
                            <input class="input @error('password') is-invalid @enderror" type="password" name="password"
                                size="20" tabindex="20" required="required" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors }}</strong>
                                </span>
                            @enderror
                        </p>

                        <p class="forgetmenot">
                            <label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" />
                                Remember Me</label>
                        </p>

                        <p class="submit alignleft">
                            <input type="submit" name="wp-submit" class="button-primary" value="Log In" tabindex="100" />
                        </p>
                    </form>

                    @if (Route::has('password.request'))
                        <p class="tpl-forget-pwd"><a href="{{ route('password.request') }}">Lost
                                your password?</a></p>
                    @endif
                </div>


                <div class="column dt-sc-one-half">
                    <h2 class="border-title alignleft"> <span>Register Form</span> </h2>
                    <p> <strong>Do not have an account? <a href="{{ route('register') }}">Register here</a></strong> </p>
                </div>
                <div class="clear"></div>

            </section>
        </div>
    </div>
@endsection
