@section('menu-bar')
<div id="logo"> 
    <a href="/" title="Real Home">
        <img class="normal_logo"
            src="{{ asset('assets/landing/logo.png') }}"
            alt="Real Home" title="Real Home" />
        <img class="retina_logo"
            src="{{ asset('assets/landing/logo@2x.png') }}"
            alt="Real Home" title="Real Home" style="width:124px; height:62px;" />
    </a> 
</div>

<div id="primary-menu">
    <nav id="main-menu">
        <ul id="menu-main-menu" class="menu">
            @if (Auth::user())
            <li id="menu-item-1541"
                class="menu-item menu-item-type-custom menu-item-object-custom @if (Route::currentRouteName()==='dashboard') current-menu-item current_page_item @endif menu-item-depth-0 menu-item-simple-parent ">
                <a href="{{ route('dashboard') }}"><i
                        class='fa fa-home'></i>Dashboard<span class="menu-item-description">get
                        started</span></a>
            </li>
            @endif
            <li id="menu-item-1541"
                class="menu-item menu-item-type-custom menu-item-object-custom @if (Route::currentRouteName()==='welcome') current-menu-item current_page_item @endif menu-item-has-children menu-item-depth-0 menu-item-simple-parent ">
                <a href="{{ config('app.url') }}"><i
                        class='fa fa-home'></i>Home<span class="menu-item-description">get
                        started</span></a>
            </li>
            <li id="menu-item-1541"
                class="menu-item menu-item-type-custom menu-item-object-custom @if (Route::currentRouteName()==='dashboard-map') current-menu-item current_page_item @endif menu-item-has-children menu-item-depth-0 menu-item-simple-parent ">
                <a href="{{ route('dashboard-map') }}"><i
                        class='fa fa-home'></i>Map<span class="menu-item-description">get
                        started</span></a>
            </li>
            <li id="menu-item-1607"
                class="menu-item menu-item-type-custom menu-item-object-custom @if (Route::currentRouteName()==='properties-grid' || Route::currentRouteName()==='properties-list') current-menu-item current_page_item @endif menu-item-has-children menu-item-depth-0 menu-item-megamenu-parent  megamenu-4-columns-group">
                <a href="{{ config('app.url') }}/properties-grid/all/all/all"><i
                        class='fa fa-trophy'></i>Properties<span
                        class="menu-item-description">we have</span></a>
                <div class='megamenu-child-container'>

                    <ul class="sub-menu">
                        <li id="menu-item-1918"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-depth-1">
                            <a href="#">Property Types</a>
                            <ul class="sub-menu">
                                @foreach ($buildingTypes as $buildingType)
                                <li id="menu-item-1925"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2">
                                    <a
                                        href="{{ config('app.url') }}/category/{{ $buildingType->transid }}"><i
                                            class='fa fa-building-o'></i>{{ $buildingType->description }}</a></li>
                                            @endforeach
                            </ul>
                        </li>
                        <li id="menu-item-1920"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-depth-1">
                            <a href="#">Locations</a>
                            <ul class="sub-menu">
                                @foreach ($states as $state)
                                <li id="menu-item-1932"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2">
                                <a
                                    href="{{ config('app.url') }}/location/{{ $state->transid }}"><i
                                        class='fa fa-smile-o'></i>{{ $state->name}}</a></li>
                                @endforeach
                              
                            </ul>
                        </li>
                        <li id="menu-item-1919"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-depth-1">
                            <a href="#">Contract Types</a>
                            <ul class="sub-menu">
                                <li id="menu-item-1922"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2">
                                    <a
                                        href="{{ config('app.url') }}/contract_type/rent"><i
                                            class='fa fa-key'></i>For Rent</a></li>
                                <li id="menu-item-1923"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2">
                                    <a
                                        href="{{ config('app.url') }}/contract_type/sale"><i
                                            class='fa fa-money'></i>For Sale</a></li>
                                <li id="menu-item-1924"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-depth-2">
                                    <a
                                        href="{{ config('app.url') }}/contract_type/sold"><i
                                            class='fa fa-lock'></i>Sold Out</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </li>
            <li id="menu-item-1544"
                class="menu-item menu-item-type-post_type menu-item-object-page  @if (Route::currentRouteName()==='portfolio' || Route::currentRouteName()==='portfolio-details') current-menu-item current_page_item @endif menu-item-depth-0 menu-item-megamenu-parent  megamenu-4-columns-group">
                <a href="{{ config('app.url') }}/portfolio-gallery/all"><i
                        class='fa fa-camera'></i>Gallery<span class="menu-item-description">we
                        have done</span></a>
            </li>
            <li id="menu-item-1543"
                class="menu-item menu-item-type-post_type @if (Route::currentRouteName()==='contact') current-menu-item current_page_item @endif menu-item-object-page menu-item-depth-0 menu-item-simple-parent ">
                <a href="{{ route('contact') }}"><i
                        class='fa fa-location-arrow'></i>Contact<span
                        class="menu-item-description">get in touch</span></a>

            </li>
        </ul>
    </nav>
</div>
@show