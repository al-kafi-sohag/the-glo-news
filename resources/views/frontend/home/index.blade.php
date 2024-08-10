@extends('frontend.layouts.app')

@section('title', 'Homapage')

@push('link_css')
@endpush

@section('content')

    <div class="ppb_wrapper">
        @include('frontend.home.includes.trending')

        <div class="ppb_blog_grid_with_posts one nopadding" style="padding-top: 0 !important; padding: 0px 0 0px 0;">
            <div class="standard_wrapper">
                @include('frontend.home.includes.main_news')
                <div class="one_third last">
                    @include('frontend.home.includes.side_news')
                </div>
            </div>
        </div>

        <div class="divider one">&nbsp;</div>

        <div class="one withsmallpadding">
            <div class="page_content_wrapper">
                <div class="inner">
                    @include('frontend.home.includes.latest_news')
                </div>
            </div>
        </div>

        @include('frontend.home.includes.news_slider')

    </div>

@endsection

@push('link_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-advanced-news-ticker/1.0.1/js/newsTicker.min.js" integrity="sha512-hUCYHIUCAbcH/lsBSZV+onLb/krmS8e4hx2GgZKukR8AzeuE5x8gPInKEMULL6Ya5xG0vLYwSNuUgWHsES1QkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endpush

@push('script')
<script>
    $(document).ready(function () {
        $("#trending_news").newsTicker({
            row_height: 36,
            max_rows: true,
            duration: 3000,
            autostart: 1,
            prevButton: $("#trending_news_prev"),
            nextButton: $("#trending_news_next"),
            pauseOnHover: true,
        });

    });
</script>
@endpush
