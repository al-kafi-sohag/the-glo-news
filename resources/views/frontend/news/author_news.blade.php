@extends('frontend.layouts.app')

@section('title', $author->name)

@push('css')
    <style>
        .ads_wrapper{
            text-align: center;
            width: 100%;
            float: left;
        }
    </style>
@endpush

@section('content')

    <div id="page_caption" class="  ">
        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <div class="post_info_cat">
                    <div class="breadcrumb"><a href="{{ route('f.home') }}">Home</a> » {{ $author->name }}</div>
                </div>
                <h1>{{ $author->name }} - {{ $author->type() }}</h1>
            </div>
        </div>
    </div>

    <div id="page_content_wrapper" class="">
        <div class="inner">
            <div class="inner_wrapper">
                <div class="sidebar_content full_width blog_f three_cols mixed">
                    @foreach ($news as $key => $n)
                        <div id="post-{{ $key }}"
                            class="post-{{ $key }} post type-post status-publish format-standard has-post-thumbnail hentry category-buzz category-2 Columns category-style tag-food tag-nature">
                            <div class="post_wrapper">
                                <div class="post_content_wrapper">
                                    <div class="post_header">
                                        <div class="post_img static small">
                                            <a href="{{ route('f.news', $n->slug) }}">
                                                <div class="post_icon_circle"><i class="fa fa-image"></i></div>
                                                <img src="{{ storage_url($n->image) }}" alt="" class=""
                                                    style="width: 700px; height: 466px;" />
                                            </a>
                                        </div>
                                        <br class="clear" />

                                        <div class="post_header_title">
                                            <h5>
                                                <a href="{{ route('f.news', $n->slug) }}" title="{{ $n->title }}">
                                                    {{ $n->title }}
                                                </a>
                                            </h5>
                                            <div class="post_detail post_date">
                                                <span class="post_info_author">
                                                    <a
                                                        href="{{ route('f.author.news', $n->author->id) }}">{{ $n->author->name }}</a>
                                                </span>
                                                <span class="post_info_date">{{ newsTimeFormate($n->post_date) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination-wrapper">
                    {{ $news->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>

@endsection



@push('script')
<script>
    $(document).ready(function() {
        var cols = $('.type-post');
        var adCol = $(`{!! get_ads('author_news_page', 1) !!}`);
        console.log(cols.length);

        cols.each(function(index) {
            if ((index + 1) % 6 === 0) {
                $(this).after(adCol.clone());
            }
        });
        if (cols.length < 6) {
            $('.type-post').last().after(adCol.clone());
        }
    });
</script>
@endpush
