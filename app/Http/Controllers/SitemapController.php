<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Spatie\Sitemap\SitemapGenerator;

use Spatie\Sitemap\Tags\Url;

class SitemapController extends BaseController
{

    public function generate() {
            $path = public_path(). '/sitemap.xml';
            SitemapGenerator::create('https://rahwaymainst.com')
            ->hasCrawled(function (Url $url) {
                if (strpos($url->url, 'storage') !== false) {
                    return;
                }
                return $url;
            })
            ->writeToFile($path);
        return "Sitemap generated";
    }
    
}