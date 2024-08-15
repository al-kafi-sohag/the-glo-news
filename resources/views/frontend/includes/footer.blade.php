<div class="footer_bar">
    <div id="footer" class="">
        <ul class="sidebar_widget three">
            <li id="text-2" class="widget widget_text">
                <div class="textwidget">
                    <p><img src="{{ asset('frontend/img/logo_white.png') }}" alt="" style="max-width: 230px; height: auto;"></p>
                    <p>Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla</p>
                    <div style="margin-top: 15px;">
                        <div class="social_wrapper shortcode light large">
                            <ul>
                                <li class="facebook">
                                    <a target="_blank" title="Facebook" href="#" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li class="twitter">
                                    <a target="_blank" title="Twitter" href="singleblog.html" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li class="youtube">
                                    <a target="_blank" title="Youtube" href="#" rel="noopener noreferrer"><i class="fa-brands fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>


            <li id="" class="">
                <ul class="">
                    <li>
                        <a href="{{ route('f.home') }}">Home</a>
                    </li>
                    <li>
                        <a href="">About Us</a>
                    </li>
                    <li>
                        <a href="">Advertisement</a>
                    </li>
                    <li>
                        <a href="{{ route('f.contact') }}">Contact Us</a>
                    </li>
                </ul>
            </li>



        </ul>
    </div>
    <br class="clear">

    <div class="footer_bar_wrapper">
        <div class="menu-top-menu-container">
            <ul id="footer_menu" class="footer_nav">
                <li class="menu-item"><a href="index.html">Home</a></li>
                <li class="menu-item"><a href="index.html">Advertisement</a></li>
                <li class="menu-item"><a href="shop_fullwidth.html">Cart</a></li>
                <li class="menu-item"><a href="contact.html">Contact</a></li>
                <li class="menu-item">
                    @if (auth()->user())
                    <a target="_blank" href="{{ route('b.dashboard') }}">Dashboard</a>
                    @else
                    <a target="_blank" href="{{ route('login') }}">Login</a>
                    @endif
                </li>
            </ul>
        </div>
        <div id="copyright">© Copyright {{ config('app.name') }} - Developed by <a href="https://www.linkedin.com/in/al-kafi-sohag" target="_blank">Al Kafi Sohag</a></div>
        <a id="toTop" style="opacity: 0.5; visibility: visible;"><i class="fa fa-angle-up"></i></a>
    </div>
</div>
