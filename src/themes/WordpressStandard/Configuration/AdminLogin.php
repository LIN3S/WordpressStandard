<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard\Configuration;

/**
 * Final AdminLogin class, to configure the admin login page.
 *
 * @author Jon Torrado <jontorrado@gmail.com>
 */
final class AdminLogin
{
    /**
     * AdminLogin constructor.
     */
    public function __construct()
    {
        add_action('login_enqueue_scripts', [$this, 'loginLogo']);
        add_filter('login_headerurl', [$this, 'loginUrl']);
        add_filter('login_headertitle', [$this, 'loginTitle']);
    }

    function loginLogo() {
        $css = '<style type="text/css">';
        $css .= '#login h1 a, .login h1 a {';
        $css .= 'background-image: url(' . get_stylesheet_directory_uri() .'/Resources/assets/images/site-login-logo.png);';
        $css .= 'background-size: 179px;';
        $css .= 'width: 179px;';
        $css .= '}';
        $css .= '</style>';

        echo $css;
    }

    function loginUrl() {
        return home_url();
    }

    function loginTitle() {
        return get_bloginfo();
    }
}
