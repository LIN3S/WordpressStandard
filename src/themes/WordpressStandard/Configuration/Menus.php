<?php

/*
 * This file is part of the Wordpress Standard project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard\Configuration;

use LIN3S\WPFoundation\Configuration\Menus\Menus as BaseMenus;
use LIN3S\WPFoundation\Configuration\Translations\Translations;

/**
 * Final Menu class. With menus method are registered the different menus.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class Menus extends BaseMenus
{
    const MENU_HEADER = 'header-menu';

    /**
     * @inheritdoc}
     */
    public function menus()
    {
        register_nav_menus([
            self::MENU_HEADER => Translations::trans('Header menu')
        ]);
    }
}
