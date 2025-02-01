<div class="header_style_wrapper">
    <div class="top_bar">
        <!-- Begin logo -->
        <div id="logo_wrapper">
            <div class="standard_wrapper">
                <div id="logo_normal" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo" class="logo_wrapper default" href="{{ route('f.home') }}">
                            <img src="{{ asset('frontend/img/logo.png') }}" alt=""/>
                        </a>
                    </div>
                </div>
                <!-- End logo -->

                <div class="ppb_ads pp_ads_global_before_menu">
                    {!! get_ads('header', 1) !!}
                </div>
            </div>
        </div>

        <div id="menu_wrapper">
            <div id="nav_wrapper">
                <div class="nav_wrapper_inner">
                    <div id="menu_border_wrapper">
                        <div class="menu-main-menu-container">
                            <ul id="main_menu" class="nav">

                                @foreach ($headerCategories as $hc)
                                    @if ($hc->header_subCategories->count() > 0)
                                    <li class="menu-item menu-item-has-children arrow">
                                        <a href="{{ route('f.category.index', $hc->slug) }}">{{ $hc->title }}</a>
                                        <ul class="sub-menu">
                                            @foreach ($hc->header_subCategories as $hsc)
                                                <li class="menu-item">
                                                    <a href="{{ route('f.category.index', [$hc->slug, $hsc->slug]) }}">{{ $hsc->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <li class="menu-item"><a href="{{ route('f.category.index', $hc->slug) }}">{{ $hc->title }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Begin right corner buttons -->
                    <div id="logo_right_button">

                        <!-- Begin search icon -->
                        <a href="javascript:void(0);" id="search_icon"><i class="fa fa-search"  data-bs-toggle="modal" data-bs-target="#searchModal"></i></a>
                        <!-- End side menu -->

                        <!-- Begin search icon -->
                        <a href="javascript:void(0);" id="mobile_nav_icon"></a>
                        <!-- End side menu -->
                    </div>
                    <!-- End right corner buttons -->
                </div>
            </div>
            <!-- End main nav -->
        </div>
    </div>
</div>
