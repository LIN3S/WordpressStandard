<?php

namespace App;

use LIN3S\WPFoundation\Configuration\Translations\Translations;
use LIN3S\WPFoundation\PostTypes\Taxonomy;

class Taxonomies
{
    const EXAMPLE_POST_CATEGORY = 'example_post_category';

    public function __construct()
    {
        new Taxonomy(self::EXAMPLE_POST_CATEGORY, PostTypes::EXAMPLE_POST_TYPE,  [
            'labels'       => [
                'name'          => Translations::trans('Categories'),
                'singular_name' => Translations::trans('Category'),
            ],
            'sort'         => true,
            'hierarchical' => true,
        ]);
    }
}
