@extends('frontend.layouts.app')

@section('title', 'Terms and Conditions')

@push('css')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .tc-content .card {
            border-radius: 10px;
            border: 1px solid #e9ecef;
        }

        .tc-content p {
            text-align: justify;
            line-height: 1.8;
            color: #6c757d;
        }

        .tc-content h3.h5 {
            font-weight: 600;
            color: #343a40;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 10px;
        }

        .tc-content .blockquote {
            background-color: #fff3cd;
            border-left: 5px solid #ffc107;
            margin: 20px 0;
            padding: 20px;
            font-size: 1rem;
            font-style: italic;
            color: #856404;
        }

        .tc-content .blockquote p {
            text-align: left;
        }

        .tc-content a {
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
                <h1><span>Terms & Conditions</span></h1>
            </div>
        </div>
    </div>


    <div class="container py-5 tc-content">
        <div class="card shadow">
            <div class="card-body p-5">
                <p>Welcome to {{ config('app.name') }}! These Terms and Conditions govern your access to and use of our
                    website, <a href="{{ config('app.url') }}">www.thereporter24.com</a>, and any related services provided
                    by us. By using our site, you agree to abide by the following terms. If you do not agree to these terms,
                    please refrain from accessing or using our website.</p>

                <h3 class="h5 mt-4 mb-3">1. Acceptance of Terms</h3>
                <p>By accessing or using {{ config('app.name') }}, you agree to these Terms and Conditions in full. If you
                    disagree with any part of these terms, you must not use our website.</p>

                <h3 class="h5 mt-4 mb-3">2. Use of Website</h3>
                <p>The content and services offered on <a href="{{ config('app.url') }}">www.thereporter24.com</a> are for
                    personal and informational use only. You may not use this website for any unlawful purpose or in any way
                    that may damage or impair the website's functionality. This includes engaging in any activity that could
                    disrupt the site's functionality or servers.</p>

                <h3 class="h5 mt-4 mb-3">3. Content Ownership</h3>
                <p>All content, including but not limited to articles, images, videos, graphics, logos, and trademarks
                    displayed on {{ config('app.name') }}, is owned by or licensed to us and is protected by intellectual
                    property laws. You may not use, copy, distribute, or modify any content from this website without
                    obtaining written permission from the website owner.</p>

                <h3 class="h5 mt-4 mb-3">4. Accuracy of Information</h3>
                <p>While we make every effort to ensure the accuracy and timeliness of the content we publish,
                    {{ config('app.name') }} does not guarantee that the information is always accurate, complete, or
                    current. We are not responsible for any errors or omissions, nor for any actions taken in reliance on
                    the information provided on this site.</p>

                <h3 class="h5 mt-4 mb-3">5. Third-Party Links</h3>
                <p>Our website may contain links to external websites that are not under our control. These links are
                    provided for your convenience and do not signify endorsement of the content on those sites. We are not
                    responsible for the availability or content of third-party websites and cannot be held liable for any
                    loss or damage resulting from your use of those sites.</p>

                <h3 class="h5 mt-4 mb-3">6. Advertisements and Third-Party Services</h3>
                <p>{{ config('app.name') }} may display advertisements from third parties, including but not limited to
                    Google AdSense. These third-party advertisers may use cookies to collect data and deliver relevant ads
                    based on your browsing behavior. By using our website, you consent to the collection of such data by
                    third-party advertisers. Please review their privacy policies for more details.</p>

                <h3 class="h5 mt-4 mb-3">7. Privacy and Data Collection</h3>
                <p>Your privacy is important to us. Please refer to our Privacy Policy to learn how we collect, use, and
                    protect your personal information when you interact with our site.</p>

                <h3 class="h5 mt-4 mb-3">8. Limitation of Liability</h3>
                <p>{{ config('app.name') }} will not be liable for any direct, indirect, incidental, or consequential
                    damages that result from the use of or inability to use the website. This includes damages caused by
                    viruses, errors, interruptions, or any other issues that may arise while using the site.</p>

                <h3 class="h5 mt-4 mb-3">9. Changes to Terms</h3>
                <p>We reserve the right to update or modify these Terms and Conditions at any time. Any changes will be
                    posted on this page, and the updated date will be indicated at the top of this document. Your continued
                    use of the website after any changes signifies your acceptance of the modified terms.</p>

                <h3 class="h5 mt-4 mb-3">10. Governing Law</h3>
                <p>These Terms and Conditions are governed by the laws of Bangladesh, without regard to its conflict of law
                    principles. Any disputes arising under or in connection with these terms shall be resolved in the
                    appropriate courts of Bangladesh.</p>

                <h3 class="h5 mt-4 mb-3">11. Contact Information</h3>
                <p>If you have any questions or concerns about these Terms and Conditions, please contact us via our <a
                        href="{{ route('f.contact.index') }}">Contact Page.</a></p>

                <div class="alert alert-info mt-4">
                    <h4 class="alert-heading text-center">Thank You!</h4>
                    <p>On behalf of the team at {{ config('app.name') }}, we appreciate you taking the time to review our
                        Terms and Conditions. We value your visit to our site and are committed to providing you with
                        accurate, timely, and engaging content. If you have any questions or require further clarification,
                        please do not hesitate to <a href="{{ route('f.contact.index') }}">contact us</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('link_script')
@endpush

@push('script')
@endpush
