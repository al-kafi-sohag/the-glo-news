
@empty(!$main_news)
<div class="two_third div_wrapper aspect32" style="background-image: url({{ storage_url($main_news->image) }});">
    <div class="post_header">
        <div class="post_detail post_date">
            <span class="post_info_author">
                {{-- <span class="gravatar">
                    <img
                        alt=""
                        src="{{ asset('frontend/img/default/reporter-avatar.jpg') }}"

                        class="avatar avatar-60 photo"
                        height="60"
                        width="60"
                        loading="lazy"
                    />
                </span> --}}
                {{ optional($main_news->author)->name }}
            </span>
            <span class="post_info_date">
                {{ newsTimeFormate($main_news->post_date) }}
            </span>
        </div>
        <h2>
            <a href="{{ route('f.news', $main_news->slug) }}" title="{{ $main_news->title }}">
                {{ strLimit($main_news->title) }}
            </a>
        </h2>
    </div>
</div>
@endempty
