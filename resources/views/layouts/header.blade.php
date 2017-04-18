    <div class="header">
    <!-- BEGIN .header-very-top -->
    <div class="header-very-top">
        <!-- BEGIN .wrapper -->
        <div class="wrapper">
            <div class="left">
                <ul class="ot-menu very-top-menu load-responsive" rel="Top Menu">
                    <li><a href="{{ route('index') }}" class="icon-text"><i class="fa fa-home"></i></a></li>
                    @if (Auth::check())
                        <li id=""
                            class="menu-item menu-item-type-post_type menu-item-object-page single"><a
                            href="{{ route('admin.home') }}">Trang quản trị</a></li>
                    @else
                        <li id=""
                            class="menu-item menu-item-type-post_type menu-item-object-page single"><a
                            href="{{ route('login') }}">Đăng nhập</a></li>
                        <li id=""
                            class="menu-item menu-item-type-custom menu-item-object-custom single"><a
                            href="{{ route('register') }}">Đăng ký</a></li>
                    @endif
                </ul>
            </div>
            <div class="right">
                <div class="weather-report">
                    <span>Thời tiết</span> <b>Việt Nam, Hà Nội</b> <img
                        src="{{ asset('image/weather/'.getIcon()) }}"
                        alt="Vietnam, Hanoi" width="20px"/> 
                        <font class="weather-meter" style="background: #e87c2d;">{{ getTemperature() }}&deg;C</font>
                </div>
            </div>
            <div class="clear-float"></div>
        </div>
        <div class="double-split"></div>
        <!-- END .header-very-top -->
    </div>
    <!-- BEGIN .header-middle -->
    <div class="header-middle">
        <div class="wrapper">
            <div class="logo-image">
                <h1>t-cnews</h1>
                <a href="{{ route('index') }}"><img class="logo"
                    src="{{ asset('image/imgTheme/logo.png') }}"
                    alt="t-cnews" /></a>
            </div>
            <div class="banner">
                <div class="banner-block">
                    @foreach ($adv as $adve)
                        @if ($adve['adv_position'] === 'header')
                        <a href="{{ $adve['url_company'] }}" target="_blank">
                            <img src="{{ asset('image/adv/' . $adve['adv_url']) }}"
                            alt="" />
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="clear-float"></div>
        </div>
        <!-- END .header-middle -->
    </div>
    <!-- BEGIN .header-menu -->
    @include ('layouts.mainMenu')
    <!-- END .header -->
</div>
