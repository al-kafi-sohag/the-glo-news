<a id="close_mobile_menu" href="javascript:;"></a>
        <div class="mobile_menu_wrapper">
            <a id="close_mobile_menu_button" href="javascript:;"><i class="fa fa-close"></i></a>

            <div class="menu-main-menu-container">
                <ul id="mobile_main_menu" class="mobile_main_nav">

                    @foreach ($headerCategories as $hc)
                        @if ($hc->header_subCategories->count() > 0)
                        <li class="menu-item menu-item-has-children arrow">
                            <a href="">{{ $hc->title }}</a>
                            <ul class="sub-menu">
                                @foreach ($hc->header_subCategories as $hsc)
                                    <li class="menu-item">
                                        <a href="">{{ $hsc->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <li class="menu-item"><a href="">{{ $hc->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- Begin side menu sidebar -->
            <div class="page_content_wrapper">
                <div class="sidebar_wrapper">
                    <div class="sidebar">
                        <div class="content">
                            <ul class="sidebar_widget"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End side menu sidebar -->
        </div>
