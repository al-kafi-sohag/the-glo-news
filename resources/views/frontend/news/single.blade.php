@extends('frontend.layouts.app')

@section('title', $news->title)

@push('css')
@endpush

@section('content')
    <div id="page_content_wrapper" class="single_news">
        <div class="inner d-flex justify-content-between">
            <div class="inner_wrapper w-70">
                <div class="sidebar_content w-100">
                    <div class="post type-post status-publish format-standard has-post-thumbnail">
                        <div class="post_wrapper">
                            <div class="post_content_wrapper">
                                <div class="post_header">
                                    <div class="post_header_title">
                                        @include('frontend.includes.breadcrum')
                                        <h1>{{ $news->title }}</h1>
                                        <div class="post_detail post_date">
                                            <span class="post_info_author">
                                                <a href="{{ route('f.author.news', optional($news->author)->id) }}">
                                                    {{-- <span class="gravatar">
                                                        <img alt="{{ optional($news->author)->name }}"
                                                            src="{{ asset('frontend/img/default/reporter-avatar.jpg') }}"
                                                            class="avatar avatar-60 photo" height="60" width="60"
                                                            loading="lazy" />
                                                    </span> --}}
                                                    {{ optional($news->author)->name }}
                                                    ({{ optional($news->author)->type() }})
                                                </a>
                                            </span>
                                            <span class="post_info_date"> Posted On {{ newsTimeFormate($news->created_at) }}
                                            </span>
                                        </div>
                                        <div class="post_detail post_comment">
                                            <div class="post_info_view"><i class="fa fa-eye"></i>{{ formatView($news->visitors) }}&nbsp;Views</div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="post_divider" />

                                <div class="post_img static w-100">
                                    <img src="{{ storage_url($news->image) }}" alt="{{ $news->title }}" class=""
                                        style="width: 40rem;" />
                                </div>

                                <div class="description ck ck-content inline-block">
                                    {!! $news->description !!}
                                </div>

                                @if (is_array($news->references) && count(json_decode($news->references)) > 0)
                                    <div class="references">
                                        <h6>{{ __('References') }}</h6>
                                        <ul>
                                            @foreach (json_decode($news->references) as $reference)
                                                <li><a href="{{ $reference }}" target="_blank">{{ $reference }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="adevertisement w-25">

                <div class="related_news d-inline-block mt-3 mb-3">
                    <h2 class="widgettitle"><span>{{ __('Related News') }}</span></h2>
                    <ul class="posts blog withthumb">

                        @foreach ($related_news as $rn)
                            <li class="post type-post w-100 d-flex align-items-center">
                                <div class="post_circle_thumb static one_third w-40">
                                    <a href="{{ route('f.news', $rn->slug) }}">
                                        <img src="{{ storage_url($rn->image) }}" class="tg-lazy" alt="{{ $rn->title }}">
                                    </a>
                                </div>
                                <div class="post_title_date two_third last w-60 d-flex flex-column justify-content-center">
                                    <h5>
                                        <a href="{{ route('f.news', $rn->slug) }}">{{ strLimit($rn->title) }}</a>
                                    </h5>
                                    <span class="post_info_date">
                                        {{ newsTimeFormate($rn->post_date ) }}
                                    </span>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="ad-2">
                    {!! get_ads('single_news_page', 1) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('link_script')
@endpush

@push('script')
@endpush
