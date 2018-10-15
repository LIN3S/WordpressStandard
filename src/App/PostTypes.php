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
use LIN3S\WPFoundation\PostTypes\PostType;

class PostTypes
{
    const PAGE = 'page';
    const POST = 'post';
    const EXAMPLE_POST_TYPE = 'example_post_type';

    public function __construct()
    {
        $baseOptions = [
            'public'       => true,
            'show_in_rest' => true,
            'supports'     => ['title', 'thumbnail', 'editor', 'excerpt'],
        ];

        new PostType(
            self::EXAMPLE_POST_TYPE,
            array_merge($baseOptions, ['labels' => $this->labels('PostExample', 'PostsExample')])
        );
    }

    private function labels(string $singular, string $plural)
    {
        return [
            'name'               => Translations::trans(sprintf('%s', $plural)),
            'singular_name'      => Translations::trans(sprintf('%s', $singular)),
            'menu_name'          => Translations::trans(sprintf('%s', $plural)),
            'name_admin_bar'     => Translations::trans(sprintf('%s', $singular)),
            'all_items'          => Translations::trans(sprintf('All %s', $plural)),
            'add_new'            => Translations::trans(sprintf('New %s', $singular)),
            'add_new_item'       => Translations::trans(sprintf('Add New %s', $singular)),
            'edit_item'          => Translations::trans(sprintf('Edit %s', $singular)),
            'new_item'           => Translations::trans(sprintf('New %s', $singular)),
            'view_item'          => Translations::trans(sprintf('View %s', $singular)),
            'search_items'       => Translations::trans(sprintf('Search %s', $singular)),
            'not_found'          => Translations::trans(sprintf('No %s found', $plural)),
            'not_found_in_trash' => Translations::trans(sprintf('No %s found in trash', $plural)),
            'parent_item_colon'  => Translations::trans(sprintf('Parent %s', $singular)),
        ];
    }
}
