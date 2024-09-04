@foreach ($featured_news as $fn)
<div class="post type-post w-100">
    <div class="post_wrapper">
        <div class="post_content_wrapper">
            <div class="post_header search d-flex align-items-center justify-content-between">
                <div class="post_img static one_third w-40">
                    <a href="{{ route('f.news', $fn->slug) }}" title="{{ $fn->title }}">
                        <img src="{{ storage_url($fn->image) }}" alt="{{ $fn->title }}" class="" />
                    </a>
                </div>
                <div class="post_header_title two_third last w-60">
                    <h5>
                        <a href="{{ route('f.news', $fn->slug) }}" title="{{ $fn->title }}">
                            {{ strLimit($fn->title) }}
                        </a>
                    </h5>
                    <span class="post_info_date">
                        <a href="">{{ newsTimeFormate($fn->post_date ) }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
