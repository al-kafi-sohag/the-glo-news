@extends('frontend.layouts.app')

@section('title', 'Contact')

@push('css')
@endpush

@section('content')
    <div id="page_caption" class="  ">
        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <div class="post_info_cat">
                    <div class="breadcrumb"><a href="{{ route('f.home') }}">Home</a></div>
                </div>
                <h1><span>Contact</span></h1>
            </div>
        </div>
    </div>


    <div id="page_content_wrapper" class="">
        <div class="inner">
            <div class="inner_wrapper">
                <div class="sidebar_content full_width nopadding">
                    <div class="sidebar_content page_content">
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                            beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                        </p>
                        <p>&nbsp;</p>
                        <div class="one_third" style="">
                            <h5>New York</h5>
                            <p></p>
                            <p>
                                78 Collective Street, Manhattan<br />
                                Kingston, United State
                            </p>
                            <p>
                                +78 (0) 231 908 1433<br />
                                +78 (0) 231 908 1456<br />
                                <a href="#">mail@grandnewstheme.com</a>
                            </p>
                        </div>
                        <div class="one_third" style="">
                            <h5>London</h5>
                            <p></p>
                            <p>
                                67 Collective Street, Yorksheer<br />
                                Kingston, United Kingdom
                            </p>
                            <p>
                                +78 (0) 231 908 1433<br />
                                +78 (0) 231 908 1456<br />
                                <a href="#">mail@grandnewstheme.com</a>
                            </p>
                        </div>
                        <div class="one_third last" style="">
                            <h5>Birmingham</h5>
                            <p></p>
                            <p>
                                89 Collective Street, Manhattan<br />
                                Kingston, United Kingdom
                            </p>
                            <p>
                                +78 (0) 231 908 1433<br />
                                +78 (0) 231 908 1456<br />
                                <a href="#">mail@grandnewstheme.com</a>
                            </p>
                        </div>
                        <p><br class="clear" /></p>
                        <p></p>

                        <div id="reponse_msg">
                            <ul></ul>
                        </div>

                        <form method="post"
                            action="https://max-themes.net/demos/gnews/demo2/contactform/contactengine.php">

                            <input type="text" name="Name" id="Name" placeholder="Name:" class="input" />

                            <input type="text" name="City" id="City" placeholder="City:" class="input" />

                            <input type="text" name="Email" id="Email" placeholder="Email:" class="input" />

                            <textarea name="Message" rows="20" cols="20" id="Message" placeholder="Message:" class="input"></textarea>

                            <input type="submit" name="submit" value="Submit" class="submit-button" />
                        </form>
                    </div>

                    <div class="sidebar_wrapper">
                        <div class="sidebar">
                            <div class="content">
                                <ul class="sidebar_widget">
                                    <li id="grand_news_social_profiles_posts-2"
                                        class="widget Grand_News_Social_Profiles_Posts">
                                        <h2 class="widgettitle"><span>Socials</span></h2>
                                        <div class="textwidget">
                                            <div class="social_wrapper shortcode light small">
                                                <ul>
                                                    <li class="facebook">
                                                        <a target="_blank" title="Facebook" href="#"><i
                                                                class="fa-brands fa-facebook-f"></i></a>
                                                    </li>
                                                    <li class="twitter">
                                                        <a target="_blank" title="Twitter" href="#"><i
                                                                class="fa-brands fa-twitter"></i></a>
                                                    </li>
                                                    <li class="youtube">
                                                        <a target="_blank" title="Youtube" href="#"><i
                                                                class="fab fa-youtube"></i></a>
                                                    </li>
                                                    <li class="vimeo">
                                                        <a target="_blank" title="Vimeo" href="#"><i
                                                                class="fab fa-vimeo-v"></i></a>
                                                    </li>
                                                    <li class="google">
                                                        <a target="_blank" title="Google+" href="#"><i
                                                                class="fab fa-google-plus-g"></i></a>
                                                    </li>
                                                    <li class="pinterest">
                                                        <a target="_blank" title="Pinterest" href="#"><i
                                                                class="fab fa-pinterest-square"></i></a>
                                                    </li>
                                                    <li class="instagram">
                                                        <a target="_blank" title="Instagram" href="#"><i
                                                                class="fab fa-instagram"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li id="grand_news_instagram-2" class="widget Grand_News_Instagram">
                                        Required plugin "Meks Easy Photo Feed Widget" is required. <a href="#">Please
                                            install the plugin here</a>. or read more detailed instruction about
                                        <a href="#" target="_blank">How to setup the plugin here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br class="clear" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br class="clear" />
    <br />




    {{-- <br class="clear" /> --}}
    {{-- <div id="footer_mailchimp_subscription" class="one withsmallpadding ppb_mailchimp_subscription withbg">
        <div class="standard_wrapper">
            <h2 class="ppb_title">Stay Updated</h2>
            <form id="mc4wp-form-2" class="mc4wp-form mc4wp-form-618" method="post" data-id="618"
                data-name="Subscribe">
                <div class="mc4wp-form-fields">
                    <div class="subscribe_tagline">
                        Get the recent popular stories straight into your inbox
                    </div>

                    <div class="subscribe_form">
                        <p>
                            <input type="email" name="EMAIL" placeholder="Email" required="" />
                        </p>

                        <p>
                            <input type="submit" value="Sign up" />
                        </p>
                    </div>
                </div>
                <label style="display: none !important;">Leave this field empty if you're human: <input type="text"
                        name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" /></label>
                <input type="hidden" name="_mc4wp_timestamp" value="1654935580" /><input type="hidden"
                    name="_mc4wp_form_id" value="618" /><input type="hidden" name="_mc4wp_form_element_id"
                    value="mc4wp-form-2" />
                <div class="mc4wp-response"></div>
            </form>
        </div>
    </div> --}}
@endsection

@push('link_script')
@endpush

@push('script')
@endpush
