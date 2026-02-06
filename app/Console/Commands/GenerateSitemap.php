<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.xml for The Reporter 24 including static pages, posts, and categories';

    public function handle()
    {
        $sitemap = Sitemap::create();

        $sitemap->add(
            Url::create(route('f.home'))
                ->setPriority(1.0)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        $sitemap->add(
            Url::create(route('f.about.index'))
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create(route('f.contact.index'))
                ->setPriority(0.7)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create(route('f.advertisement.index'))
                ->setPriority(0.6)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        );

        $sitemap->add(
            Url::create(route('f.tc'))
                ->setPriority(0.5)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        );

        $sitemap->add(
            Url::create(route('f.disclaimer'))
                ->setPriority(0.5)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        );

        Post::activated()
            ->select(['slug', 'image', 'updated_at', 'post_date'])
            ->chunk(500, function ($posts) use ($sitemap) {
                foreach ($posts as $post) {
                    $url = Url::create(route('f.news', $post->slug))
                        ->setPriority(0.9)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setLastModificationDate($post->updated_at ?? $post->post_date);

                    // Add featured image (Google loves this for image search & rich results)
                    if ($post->image) {
                        $imageUrl = storage_url($post->image);
                        $url->addImage($imageUrl, $post->title ?? 'The Reporter 24 News');
                    }

                    $sitemap->add($url);
                }
            });

        Category::activated()
            ->with('subCategories')
            ->get()
            ->each(function ($category) use ($sitemap) {
                // Main category page
                $sitemap->add(
                    Url::create(route('f.category.index', $category->slug))
                        ->setPriority(0.8)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setLastModificationDate(Carbon::now())
                );

                foreach ($category->subCategories as $sub) {
                    if ($sub->status == 1) {
                        $sitemap->add(
                            Url::create(route('f.category.index', [$category->slug, $sub->slug]))
                                ->setPriority(0.7)
                                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                                ->setLastModificationDate(Carbon::now())
                        );
                    }
                }
            });


        // Write to public/sitemap.xml (accessible at yourdomain.com/sitemap.xml)
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at ' . url('/sitemap.xml'));
    }
}
