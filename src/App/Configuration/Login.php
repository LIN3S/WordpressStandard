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

namespace App\Configuration;

use LIN3S\WPFoundation\Configuration\Login\Login as BaseLogin;

/**
 * @author Jon Torrado <jontorrado@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class Login extends BaseLogin
{
    public function logoPath() : string
    {
        return get_stylesheet_directory_uri() . '/../../themes/app/assets/images/site-login-logo.png';
    }
}
