<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "The Reporter 24", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description' =>
                'Beyond borders. Beyond bias. Global news delivered daily. The Reporter 24 is a professional news portal headquartered in Bangladesh with international coverage.',

            'separator' => ' | ',

            'keywords' => [
                'Breaking News',
                'World News',
                'Bangladesh News',
                'International News',
                'Latest News',
                'Onjective Reporting',
                'In-depth Analysis',
                'The Reporter 24',
                'News Portal',
                'Global News',
                'Politics',
                'Business',
                'Technology',
                'Sports',
                'Entertainment'
            ],
            'canonical' => 'full',
            'robots' => 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1',
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => '9QAQ-4ow970gAY8NZND6nm33rsjky6XXaTtdxCRoh7U',
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [

        'defaults' => [
            'title'       => 'The Reporter 24',
            'description' => 'Beyond borders. Beyond bias. Global news delivered daily.',
            'url'         => null,
            'type'        => 'article',
            'site_name'   => 'The Reporter 24',
            'images'      => [
                'https://thereporter24.com/frontend/img/logo.webp'
            ],
        ],
    ],

    'twitter' => [
        'defaults' => [
            'card' => 'summary_large_image',
            'site' => '@TheReporter24',
        ],
    ],

    'json-ld' => [

            'defaults' => [
                'title'       => 'The Reporter 24',
                'description' => 'Beyond borders. Beyond bias. Global news delivered daily.',
                'url'         => null,
                'type'        => 'NewsMediaOrganization',

                'images' => [
                    'https://thereporter24.com/frontend/img/logo.webp'
                ],
            ],
        ],
];
