<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-present LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\PostTypes;

use LIN3S\WPFoundation\Configuration\Translations\Translations;
use LIN3S\WPFoundation\PostTypes\PostType;

/**
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class ExamplePostType extends PostType
{
    const NAME = 'example';
    const TAXONOMY_TYPE_CATEGORY = 'example_category';

    /**
     * {@inheritdoc}
     */
    public function postType()
    {
        register_post_type(self::NAME,
            [
                'labels'      => [
                    'name'          => Translations::trans('Example'),
                    'singular_name' => Translations::trans('Example'),
                ],
                'public'      => true,
                'has_archive' => true,
                'supports'    => ['title', 'editor', 'thumbnail', 'excerpt'],
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
                'name'          => Translations::trans('Example category'),
                'singular_name' => Translations::trans('Example category'),
            ],
            'sort'         => true,
            'hierarchical' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function singleSerialize($postType)
    {
        return $postType;
    }
}
