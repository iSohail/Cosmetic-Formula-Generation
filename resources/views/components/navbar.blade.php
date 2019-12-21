<section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">



    <nav
        class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">

                    <img src={{asset('images/mylogo-122x122.png')}} alt="Mobirise" title="" style="height: 3.8rem;">

                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-5" href="/">COSMETIC
                        FORMULAS</a></span>
            </div>
        </div>
        @if (Route::has('login'))
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-black display-4" href="/">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-black display-4" href="/about">
                        <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span> About Us
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link link text-black display-4" href="{{ url('/home') }}">
                        <span class="mbri-database"></span> Dashboard
                    </a>
                </li>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4"
                        href="{{ route('user.logout') }}">Logout</a></div>
                @else
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4"
                        href="{{ route('login') }}">Login / Register</a></div>
                @endauth
            </ul>

        </div>
        @endif
    </nav>
</section>