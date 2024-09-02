
<div class="inner_wrapper">
    <div class="sidebar_content  two_cols mixed">
        <div class="ppb_subtitle_left"><h5 class="single_subtitle">All The Latest News</h5></div>

        <div class="filter clearfix gdlr-core-filterer-wrap gdlr-core-js  gdlr-core-item-pdlr gdlr-core-style-text gdlr-core-center-align">
            <ul>
                {{-- <li><a href="javascript:void(0)" class="news_type active" data-filter="all">All</a></li> --}}
                <li><a href="javascript:void(0)" class="news_type active" data-filter="latest" >Latest</a></li>
                <li><a href="javascript:void(0)" class="news_type" data-filter="popular" >Popular</a></li>
                <li><a href="javascript:void(0)" class="news_type" data-filter="trending" >Trending</a></li>
            </ul>
        </div>

        <div class="">
            <div id="" class="row latest_news mt-2 mb-2">

            </div>

        </div>
    </div>
    @include('frontend.home.includes.featured_categories')
</div>

