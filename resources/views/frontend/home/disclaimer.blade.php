@extends('frontend.layouts.app')

@section('title', 'Disclaimer')

@push('css')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .disclaimer-content .card {
            border-radius: 10px;
            border: 1px solid #e9ecef;
        }

        .disclaimer-content p {
            text-align: justify;
            line-height: 1.8;
            color: #6c757d;
        }

        .disclaimer-content h3.h5 {
            font-weight: 600;
            color: #343a40;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 10px;
        }

        .disclaimer-content .blockquote {
            background-color: #fff3cd;
            border-left: 5px solid #ffc107;
            margin: 20px 0;
            padding: 20px;
            font-size: 1rem;
            font-style: italic;
            color: #856404;
        }

        .disclaimer-content .blockquote p {
            text-align: left;
        }

        .disclaimer-content a {
            color: #007bff;
        }

        .text-small {
            font-size: 15px
        }
    </style>
@endpush

@section('content')

    <div id="page_caption" class="  ">
        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <div class="post_info_cat">
                    <div class="breadcrumb"><a href="{{ route('f.home') }}">Home</a></div>
                </div>
                <h1><span>Disclaimer</span><span class="text-small"> - Last Updated: {{ $last_update_date ?? 'N/A' }}
                    </span></h1>
            </div>
        </div>
    </div>


    <div class="container py-5 disclaimer-content">
        <div class="card shadow">
            <div class="card-body p-5">

                <p>Welcome to <em>{{ config('app.name', 'The Reporter 24') }}</em>. The information provided on this website
                    is for general
                    informational purposes only. By accessing and using this site, you accept the terms of this disclaimer
                    in full.</p>

                <h3 class="h5 mt-4 mb-3">1. General News Content</h3>
                <p>{{ config('app.name', 'The Reporter 24') }} publishes news and feature stories from around the world.
                    While we strive to ensure the
                    accuracy and timeliness of our reports, we do not guarantee that all content is free from errors or
                    omissions. News may evolve rapidly, and facts may change after publication.</p>
                <p>Readers are encouraged to verify critical information from official sources whenever possible.</p>

                <h3 class="h5 mt-4 mb-3">2. Opinions and Views</h3>
                <p>Articles marked as opinion or commentary reflect the personal views of the authors and do not
                    necessarily represent the editorial stance of {{ config('app.name', 'The Reporter 24') }}. We do not
                    endorse or guarantee the
                    accuracy of opinions published on this platform.</p>

                <h3 class="h5 mt-4 mb-3">3. External Links</h3>
                <p>Our website may contain links to external websites or third-party content for reference and
                    convenience. We do not control or take responsibility for the nature, accuracy, or availability of
                    content found on external sites.</p>

                <h3 class="h5 mt-4 mb-3">4. Gambling and Betting Content</h3>
                <p>From time to time, {{ config('app.name', 'The Reporter 24') }} may publish content that references sports
                    betting odds, match
                    predictions, or market analysis for informational purposes only. We do <em>not encourage gambling</em>
                    and are <em>not affiliated with any betting platforms</em> unless explicitly stated.</p>
                <div class="blockquote mt-3">
                    <p class="mb-0"><em>Gambling involves financial risk. Please bet responsibly. Readers must be 18
                            years or older (or the legal age in their jurisdiction) to participate in any gambling
                            activity.</em></p>
                </div>
                <p class="mt-3">{{ config('app.name', 'The Reporter 24') }} is not liable for any financial loss, injury,
                    or damages resulting from
                    the use of betting-related content.</p>

                <h3 class="h5 mt-4 mb-3">5. No Legal or Financial Advice</h3>
                <p>Nothing on this site constitutes legal, financial, medical, or professional advice of any kind. Readers
                    should consult qualified professionals before making decisions based on the content found here.</p>

                <h3 class="h5 mt-4 mb-3">6. Copyright and Fair Use</h3>
                <p>Unless otherwise stated, all text, images, and media on {{ config('app.name', 'The Reporter 24') }} are
                    either original or used
                    with proper attribution. We respect copyright laws and intellectual property. If you believe your rights
                    have been violated, please contact us immediately for review and resolution.</p>

                <h3 class="h5 mt-4 mb-3">7. Changes to This Disclaimer</h3>
                <p>We reserve the right to update, modify, or remove parts of this disclaimer at any time without prior
                    notice. It is the responsibility of users to review this page periodically for any changes.</p>

                <h3 class="h5 mt-4 mb-3">Contact Us:</h3>
                <p>For any questions or concerns related to this disclaimer, please email us at: <a
                        href="mailto:firozjourno@gmail.com">firozjourno@gmail.com</a></p>
            </div>
        </div>
    </div>
@endsection

@push('link_script')
@endpush

@push('script')
@endpush
