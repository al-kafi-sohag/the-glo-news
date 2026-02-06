<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function setupSEO($title, $description = null, $keywords = null, $image = null, $ogType = 'website', $jsonLdType = 'WebPage', $breadcrumbItems = [])
    {
        // Default values (pull from config where possible, fallback to seotools defaults)
        $siteName        = config('app.name', 'The Reporter 24');
        $siteUrl         = config('app.url', url('/'));
        $defaultDescription = config('seotools.meta.defaults.description',
            'The Reporter 24 is a truly professional news portal committed to objective journalism. Headquartered in Bangladesh, the site has an international footprint focussing on the latest and breaking news across the globe. Motto: Beyond borders. Beyond bias. Global news, delivered daily.'
        );
        $defaultKeywords = config('seotools.meta.defaults.keywords', ['global news', 'breaking news', 'Bangladesh news', 'international news', 'objective journalism']);
        $defaultImage    = asset('frontend/img/logo.webp');

        // Use provided values or fall back to defaults
        $description = $description ?: $defaultDescription;
        $keywords    = $keywords ?: $defaultKeywords;
        $image       = $image ?: $defaultImage;
        $currentUrl  = url()->current();

        // Clean title
        $title = strip_tags($title);

        // === Meta Tags (SEOMeta) ===
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        if ($keywords) {
            SEOMeta::setKeywords($keywords);
        }
        SEOMeta::setCanonical($currentUrl);
        SEOMeta::addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1');
        SEOMeta::addMeta('author', $siteName);
        SEOMeta::addMeta('content-language', 'en');
        SEOMeta::addMeta('geo.region', 'BD'); // Bangladesh
        SEOMeta::addMeta('theme-color', '#099CF4'); // Keep your brand color

        // === OpenGraph ===
        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setSiteName($siteName);
        OpenGraph::setUrl($currentUrl);
        OpenGraph::setType($ogType);
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('locale:alternate', ['en_GB', 'bn_BD']);

        if ($image) {
            OpenGraph::addImage($image, [
                'width'  => 1200,
                'height' => 630,
                'type'   => 'image/webp', // Adjust if your logo is png/jpeg
            ]);
        }

        // === Twitter Card ===
        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);
        TwitterCard::setType('summary_large_image'); // Ideal for news with featured images
        // TwitterCard::setSite('@YourHandle'); // Uncomment when you create an X/Twitter account

        if ($image) {
            TwitterCard::setImage($image);
        }

        // === JSON-LD Structured Data ===
        JsonLd::setType($jsonLdType); // 'WebPage' for general, override with 'NewsArticle' for posts
        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::setUrl($currentUrl);
        JsonLd::addValue('inLanguage', 'en-US');

        if ($image) {
            JsonLd::addImage($image);
        }

        // Publisher: NewsMediaOrganization (recommended for news portals)
        JsonLd::addValue('publisher', [
            '@type' => 'NewsMediaOrganization',
            'name'  => $siteName,
            'url'   => $siteUrl,
            'logo'  => [
                '@type'  => 'ImageObject',
                'url'    => $defaultImage,
                'width'  => 600,
                'height' => 60,
            ],
            'sameAs' => [
                'https://www.facebook.com/TheReporter24News',
            ],
        ]);

        // BreadcrumbList (base is Home, extend with optional items)
        $breadcrumbList = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name'     => 'Home',
                    'item'     => $siteUrl,
                ],
            ],
        ];

        if (!empty($breadcrumbItems)) {
            foreach ($breadcrumbItems as $index => $item) {
                $breadcrumbList['itemListElement'][] = [
                    '@type'    => 'ListItem',
                    'position' => $index + 2,
                    'name'     => $item['name'],
                    'item'     => $item['url'],
                ];
            }
        }

        JsonLd::addValue('breadcrumb', $breadcrumbList);
    }
}
