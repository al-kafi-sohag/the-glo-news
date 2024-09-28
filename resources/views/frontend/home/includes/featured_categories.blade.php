
<div class="sidebar_wrapper">
    <div class="sidebar">
        <div class="content">
            <ul class="sidebar_widget">
                <li id="grand_news_category-5" class="widget Grand_News_Category">
                    <h2 class="widgettitle"><span>{{ __('Categories') }}</span></h2>
                    {{-- <div class="category_description">Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis</div> --}}
                    <ul class="category">

                        @foreach ($featured_categories as $fc)
                        <li>
                            <a href="{{ route('f.category.index', $fc->slug) }}" class="category_title">{{ $fc->title }}</a>
                            <div class="category_count">{{ $fc->posts_count }}</div>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li id="grand_news_custom_ads-5" class="widget Grand_News_Custom_Ads">


                    {!! get_ads('homepage', 1) !!}
                </li>
            </ul>
        </div>
    </div>
</div>
