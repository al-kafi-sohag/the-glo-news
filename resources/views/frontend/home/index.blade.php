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

        $('.news_type').on('click', function () {
            $('.news_type').removeClass('active');
            $(this).addClass('active');
            loading_screen(true);

            var type = $(this).data('filter');

            let url = "{{ route('f.latest.get', ':type') }}";
            let _url = url.replace(':type', type);

            $.ajax({
                url: _url,
                method: 'GET',
                dataType: 'json',

                success: function(data) {
                    loading_screen(false);
                    let result = ``;
                    if(data.news.length > 0) {
                        data.news.forEach(element => {
                            result += `
                                        <div id="post-${element.id}" class="col-md-6 post type-post status-publish format-standard has-post-thumbnail hentry category-buzz category-food category-style tag-food tag-nature">
                                            <div class="post_wrapper">
                                                <div class="post_content_wrapper">
                                                    <div class="post_header">
                                                        <div class="post_img static small">
                                                            <a href="${element.url}">
                                                                <div class="post_icon_circle"><i class="fa fa-image"></i></div>
                                                                <img src="${element.image}" alt="${element.title}" class="">
                                                            </a>
                                                        </div>
                                                        <br class="clear">

                                                        <div class="post_header_title">
                                                            <h5>
                                                                <a href="${element.url}" title="${element.title}">
                                                                    ${element.cropped_title}
                                                                </a>
                                                            </h5>
                                                            <div class="post_detail post_date">
                                                                <span class="post_info_author">
                                                                    <a href="javascript:void(0)">${element.author.name}</a>
                                                                </span>
                                                                <span class="post_info_date">${element.creation_date}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            `;
                        });
                    }else{
                        result = `<div class="no_result">
                                    <img src="{{ asset('frontend/img/default/no-result-found.png') }}" alt="No result found">
                                  </div>
                                `
                    }

                    $('.latest_news').html(result);
                },
                error: function(xhr, status, error) {
                    loading_screen(false);
                    console.error('Error fetching admin data:', error);
                }
            });
        });



        $('.news_type[data-filter="latest"]').click();
    });

    function loading_screen(status=false){
        if(status){
            $('.latest_news').html('<div class="loading-div"><img src="{{ asset('frontend/img/default/loading.gif') }}" alt="loading"></div>');
        }else{
            $('.latest_news').html('');
        }
    }

</script>
@endpush
