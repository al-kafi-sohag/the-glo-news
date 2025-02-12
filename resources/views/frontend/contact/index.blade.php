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
                        {{-- <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                            beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                        </p> --}}
                        <p>&nbsp;</p>
                        <div class="two_third" style="">
                            <h5>Dhaka</h5>
                            <p>Administrator</p>
                            <p>
                                House- 1/E, Road- 11, Block-G, <br/> Bashundhara Residential Area, Dhaka- 1229
                            </p>
                            <p>
                                <a href="tel:+8801747230572">+8801747230572</a><br />
                                <a href="mailto:firozjourno@gmail.com">firozjourno@gmail.com</a>
                            </p>
                        </div>
                        <p><br class="clear" /></p>
                        <p></p>

                        <div id="reponse_msg">
                            <ul></ul>
                        </div>

                        <form method="post" action="{{ route('f.contact.submit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="Name" placeholder="Name:" class="input"
                                    value="{{ old('name') }}" />
                                @include('backend.partials.form-error', ['field' => 'name'])
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" id="City" placeholder="City:" class="input" value="{{ old('city') }}" />
                                @include('backend.partials.form-error', ['field' => 'city'])
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="Email" placeholder="Email:" class="input" value="{{ old('email') }}" />
                                @include('backend.partials.form-error', ['field' => 'email'])
                            </div>
                            <div class="form-group">
                                <textarea name="message" rows="20" cols="20" id="Message" placeholder="Message:" class="input" value="{{ old('message') }}" ></textarea>
                                @include('backend.partials.form-error', ['field' => 'message'])
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit" class="submit-button" />
                            </div>
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
                                    {{-- <li id="grand_news_instagram-2" class="widget Grand_News_Instagram">
                                        Required plugin "Meks Easy Photo Feed Widget" is required. <a href="#">Please
                                            install the plugin here</a>. or read more detailed instruction about
                                        <a href="#" target="_blank">How to setup the plugin here</a>
                                    </li> --}}
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
@endsection

@push('link_script')
@endpush

@push('script')
@endpush
