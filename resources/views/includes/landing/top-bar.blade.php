@section('top-bar')
    <div class="top-bar">
        <div class="container">
            <ul id="menu-top-menu" class="top-menu">
                <li id="menu-item-1577" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1577"><a
                        href="#">Terms</a></li>
                <li id="menu-item-1578" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1578"><a
                        href="#">Privacy Policy</a></li>
                <li id="menu-item-1579" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1579"><a
                        href="#">Legal Agreement</a></li>
            </ul>
            <div class="top-right">



                @if (Auth::user())
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        <ul class="user-account">
                            <li>
                                <a style="cursor:pointer"
                                    onclick="event.preventDefault(); document.forms['logout-form'].submit()"> <span
                                        class="fa fa-user"> </span> Logout </a>
                            </li>
                        </ul>
                        <div class="contact-number">
                            <span class="fa fa-phone-square"> </span> +233000011111
                        </div>
                    </form>
                @else
                    <ul class="user-account">
                        <li> <a href="{{ route('login') }}"> <span class="fa fa-user"> </span> Login </a> </li>
                    </ul>
                    <ul class="user-account">
                        <li> <a href="{{ route('register') }}"> <span class="fa fa-user"> </span> Register </a> </li>
                    </ul>
                    <div class="contact-number">
                        <span class="fa fa-phone-square"> </span> 1 (542) 796 5107
                    </div>
                @endif

            </div>
        </div>
    </div>
@show
