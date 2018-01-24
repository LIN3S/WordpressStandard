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

namespace App\PostTypes\Post;

use LIN3S\WPFoundation\PostTypes\PostType;

/**
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class PostPostType extends PostType
{
    public const NAME = 'post';

    public function postType() : void
    {
        add_action('init', function () {
            remove_post_type_support(self::NAME, 'editor');
            add_post_type_support(self::NAME, 'page-attributes');
        }, 100);
    }

    public function taxonomyType()
    {
    }

    public function fields()
    {
        new PostPostFields();
    }

    public static function singleSerialize($postType)
    {
        return $postType;
    }
}
