<div class="ppb_blog_ticker one nopadding" style="padding: 20px 0 20px 0;">
    <div class="standard_wrapper">
        <div class="newsticker_label"><i class="fa fa-bolt"></i>Trending</div>
        <ul id="trending_news" class="newsticker">
            @foreach ($trending_news as $tn)
            <li>
                <a title="{{ $tn->title }}" href="{{ route('f.news', $tn->slug) }}">{{  strLimit($tn->title, 150)  }}</a>
            </li>
            @endforeach
        </ul>
        <div class="newsticker_nav">
            <a href="javascript:void(0);" id="trending_news_prev" class="newsticker_prev">Prev</a>
            <a href="javascript:void(0);" id="trending_news_next" class="newsticker_next">Next</a>
        </div>
    </div>
</div>
