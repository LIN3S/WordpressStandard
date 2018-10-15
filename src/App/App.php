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

use App\Configuration\Login;
use LIN3S\WPFoundation\Configuration\Menus\Menus;
use LIN3S\WPFoundation\Configuration\Theme\Theme;
use LIN3S\WPFoundation\Configuration\Translations\Translations;

class App extends Theme
{
    const MENU_MAIN = 'main_menu';
    const MENU_FOOTER = 'footer';

    public function classes() : void
    {
        new Login();
        new Menus([
            App::MENU_MAIN => Translations::trans('Main menu'),
            App::MENU_FOOTER => Translations::trans('Footer'),
        ]);

        new Fields();
        new PostTypes();
        new Taxonomies();
    }

    public function context(array $context) : array
    {
        return $context;
    }

    public function templates($templates)
    {
        return $templates;
    }
}
