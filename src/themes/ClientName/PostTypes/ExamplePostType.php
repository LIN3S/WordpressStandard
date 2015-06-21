<?php

namespace ClientName\PostTypes;

use ClientName\ClientNameTheme;

class ExamplePostType
{
    const NAME = 'example';

    const TAXONOMY_TYPE_CATEGORY = 'example_category';

    public function __construct()
    {
        add_action('init', [$this, 'registerPostType']);
        add_action('init', [$this, 'categoryTypeTaxonomy']);
    }

    public function registerPostType()
    {
        register_post_type(self::NAME,
            [
                'labels'      => [
                    'name'          => __('Example', ClientNameTheme::LANG),
                    'singular_name' => __('Example', ClientNameTheme::LANG)
                ],
                'public'      => true,
                'has_archive' => true,
                'supports'    => ['title', 'editor', 'thumbnail', 'excerpt']
            ]
        );
    }

    public function categoryTypeTaxonomy()
    {
        $args = [
            'labels'       => [
                'name'          => __('Example category', ClientNameTheme::LANG),
                'singular_name' => __('Example category', ClientNameTheme::LANG)
            ],
            'sort'         => true,
            'hierarchical' => true
        ];

        register_taxonomy(self::TAXONOMY_TYPE_CATEGORY, self::NAME, $args);
    }
}
