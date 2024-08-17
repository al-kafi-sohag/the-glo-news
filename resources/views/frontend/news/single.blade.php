@extends('frontend.layouts.app')

@section('title', $news->title)

@push('css')
@endpush

@section('content')
<div id="page_content_wrapper" class="">
    <div class="inner">
        <div class="inner_wrapper">
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
                                            <a href="">
                                                <span class="gravatar">
                                                    <img alt="{{ optional($news->author)->name }}"
                                                        src="{{ asset('frontend/img/default/reporter-avatar.jpg') }}" class="avatar avatar-60 photo"
                                                        height="60" width="60" loading="lazy"/>
                                                </span>
                                                {{ optional($news->author)->name }} ({{ optional($news->author)->type() }})
                                            </a>
                                        </span>
                                        <span class="post_info_date"> Posted On {{ newsTimeFormate($news->created_at) }} </span>
                                    </div>
                                    <div class="post_detail post_comment">
                                        <div class="post_info_view"><i class="fa fa-eye"></i>0.0k&nbsp;Views</div>
                                    </div>
                                </div>
                            </div>

                            <hr class="post_divider" />

                            <div class="post_img static w-100">
                                <img src="{{ storage_url($news->image) }}" alt="{{ $news->title }}" class="" style="width: 40rem;height: 25rem !important;object-fit:contain" />
                            </div>

                            <div class="description ck ck-content">
                                {!! $news->description !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('link_script')
@endpush

@push('script')
@endpush
