<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

include WP_CONTENT_DIR . '/../vendor/autoload.php';

\Timber::$locations = [
    get_template_directory() . '/Resources/views',
    get_template_directory() . '/Resources/build',
];

new \WordpressStandard\WordpressStandardTheme();
