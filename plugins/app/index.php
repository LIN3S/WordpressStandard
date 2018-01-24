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

/*
 * Plugin Name: App
 * Plugin URI: http://lin3s.com
 * Author: LIN3S
 * Author URI: http://lin3s.com
 */

include WP_CONTENT_DIR . '/vendor/autoload.php';

new \App\App();
