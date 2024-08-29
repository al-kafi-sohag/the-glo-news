@extends('frontend.layouts.app')

@section('title',)

@section('content')

<div id="page_caption" class="  ">
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="post_info_cat">
                <div class="breadcrumb"><a href="{{route('f.home')}}">Home</a> » {{ $category->title }}</div>
            </div>
            <h1><span>Multiple News</span></h1>
        </div>
    </div>
</div>

<div id="page_content_wrapper" class="">
    <div class="inner">
        <div class="inner_wrapper">
            <div class="sidebar_content full_width blog_f three_cols mixed">
                @foreach ($news as $key=>$n)
                    <div id="post-{{$key}}" class="post-{{$key}} post type-post status-publish format-standard has-post-thumbnail hentry category-buzz category-2 Columns category-style tag-food tag-nature">
                        <div class="post_wrapper">
                            <div class="post_content_wrapper">
                                <div class="post_header">
                                    <div class="post_img static small">
                                        <a href="{{route('f.news',$n->post->slug)}}">
                                            <div class="post_icon_circle"><i class="fa fa-image"></i></div>
                                            <img src="{{storage_url($n->post->image)}}" alt="" class="" style="width: 700px; height: 466px;" />
                                        </a>
                                    </div>
                                    <br class="clear" />

                                    <div class="post_header_title">
                                        <h5>
                                            <a href="{{route('f.news',$n->post->slug)}}" title="{{$n->post->title}}">
                                                {{$n->post->title}}
                                            </a>
                                        </h5>
                                        <div class="post_detail post_date">
                                            <span class="post_info_author">
                                                <a href="#">{{$n->post->author->name}}</a>
                                            </span>
                                            <span class="post_info_date">{{ newsTimeFormate($n->post->post_date ) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="pagination"><div class="pagination_page">1</div></div>
            </div>

        </div>
    </div>
</div>

@endsection
