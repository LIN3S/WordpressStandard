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

namespace App;

use LIN3S\WPFoundation\Configuration\Translations\Translations;
use LIN3S\WPFoundation\PostTypes\Taxonomy;

class Taxonomies
{
    const EXAMPLE_POST_CATEGORY = 'example_post_category';

    public function __construct()
    {
        new Taxonomy(self::EXAMPLE_POST_CATEGORY, PostTypes::EXAMPLE_POST_TYPE, [
            'labels'       => [
                'name'          => Translations::trans('Categories'),
                'singular_name' => Translations::trans('Category'),
            ],
            'sort'         => true,
            'hierarchical' => true,
        ]);
    }
}
