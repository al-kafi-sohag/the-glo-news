
<div class="inner_wrapper">
    <div class="sidebar_content  two_cols mixed">
        <div class="ppb_subtitle_left"><h5 class="single_subtitle">All The Latest News</h5></div>

        <div class="filter clearfix gdlr-core-filterer-wrap gdlr-core-js  gdlr-core-item-pdlr gdlr-core-style-text gdlr-core-center-align">
            <ul>
                <li><a href="#" class="active" data-filter="*">All</a></li>
                <li><a href="#" data-filter=".class1" >Latest</a></li>
                <li><a href="#" data-filter=".class2" >Popular</a></li>
            </ul>
        </div>

        <div class="">
            <div id="" class="row" data-type="portfolio" data-layout="fitRows">
                @for ($i = 1; $i <= 10; $i++)
                <div id="post-67" class="col-md-6 post-67 post type-post status-publish format-standard has-post-thumbnail hentry category-buzz category-food category-style tag-food tag-nature">
                    <div class="post_wrapper">
                        <div class="post_content_wrapper">
                            <div class="post_header">
                                <div class="post_img static small">
                                    <a href="singleblog.html">
                                        <div class="post_icon_circle"><i class="fa fa-image"></i></div>
                                        <img src="{{ asset('frontend/img/45-700x466.jpg') }}" alt="" class="" style="width: 700px; height: 466px;">
                                    </a>
                                </div>
                                <br class="clear">

                                <div class="post_header_title">
                                    <h5>
                                        <a href="singleblog.html" title="Whistleblower wins $51 million in kickback and bribery case">
                                            Whistleblower wins $51 million in kickback and bribery case
                                        </a>
                                    </h5>
                                    <div class="post_detail post_date">
                                        <span class="post_info_author">
                                            <a href="#">John Philippe</a>
                                        </span>
                                        <span class="post_info_date"> July 22, 2015 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor


            </div>

        </div>
    </div>
    @include('frontend.home.includes.featured_categories')
</div>
