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

use LIN3S\WPFoundation\PostTypes\Fields\Fields;

/**
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class PostPostFields extends Fields
{
    public function fields() : void
    {
        // This method is used to invoke the ACF's "acf_add_local_field_group"
        // api method, check it out its documentation.
    }

    public function connector() : array
    {
        return [
            [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => PostPostType::NAME,
                ],
            ],
        ];
    }
}
