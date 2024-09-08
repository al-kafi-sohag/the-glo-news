<div class="footer_bar">
    <div id="footer" class="">
        <ul class="sidebar_widget two">
            <li id="text-3" class="widget widget_text d-flex align-items-center">
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

            {{-- <li id="" class="">
                <ul class="">
                    <li>
                        <a href="{{ route('f.home') }}">Home</a>
                    </li>
                    <li>
                        <a href="">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('f.advertisement.index') }}">Advertisement</a>
                    </li>
                    <li>
                        <a href="{{ route('f.contact.index') }}">Contact Us</a>
                    </li>
                </ul>
            </li> --}}
            <li class="location" style="flex-grow: 1; display: flex; align-items: center;">
                <div class="google_map" style="width: 100%;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26727.201267070563!2d90.3643136!3d23.8256128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1295969672d%3A0x3b83273873fbe71f!2sMirpur%2011%20Bazar!5e1!3m2!1sen!2sbd!4v1725380279124!5m2!1sen!2sbd"
                        width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="text-center">
                    </iframe>
                </div>
            </li>
        </ul>
    </div>
    <br class="clear">

    <div class="footer_bar_wrapper">
        <div class="menu-top-menu-container">
            <ul id="footer_menu" class="footer_nav">
                <li class="menu-item"><a href="index.html">Home</a></li>
                <li class="menu-item"><a href="{{ route('f.about.index') }}">About Us</a></li>
                <li class="menu-item"><a href="{{ route('f.advertisement.index') }}">Advertisement</a></li>
                <li class="menu-item"><a href="">Contact</a></li>
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
