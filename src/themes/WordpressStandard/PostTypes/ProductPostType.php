<?php

/*
 * This file is part of the Wordpress Standard project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard\PostTypes;

use LIN3S\WPFoundation\PostTypes\PostType;

/**
 * Very basic example of PostType class. If you want more info about custom post
 * types, rewrite rules and custom fields you can check self explanatory examples
 * of our WPFoundation library: https://github.com/LIN3S/WPFoundation#posttype
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class ProductPostType extends PostType
{
    const NAME = 'product';
    const TAXONOMY_TYPE_CATEGORY = 'product_category';

    /**
     * {@inheritdoc}
     */
    public function postType()
    {
        register_post_type(self::NAME,
            [
                'labels'      => [
                    'name'          => 'Products',
                    'singular_name' => 'Product'
                ],
                'public'      => true,
                'has_archive' => true,
                'supports'    => ['title', 'editor', 'thumbnail', 'excerpt']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function taxonomyType()
    {
        register_taxonomy(self::TAXONOMY_TYPE_CATEGORY, self::NAME, [
            'labels'       => [
                'name'          => 'Product categories',
                'singular_name' => 'Product category'
            ],
            'sort'         => true,
            'hierarchical' => true
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function serialize($postTypes)
    {
        return $postTypes;
    }
}
