<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppTheme\Configuration;

use LIN3S\WPFoundation\Configuration\Login\Login as BaseLogin;

/**
 * Final Login class, to configure the WordPress login page.
 *
 * @author Jon Torrado <jontorrado@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class Login extends BaseLogin
{
    /**
     * {@inheritdoc}
     */
    public function logoPath()
    {
        return get_stylesheet_directory_uri() . '/Resources/assets/images/site-login-logo.png';
    }
}
