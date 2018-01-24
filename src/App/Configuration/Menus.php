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

use LIN3S\WPFoundation\Configuration\Menus\Menus as BaseMenus;
use LIN3S\WPFoundation\Configuration\Translations\Translations;

/**
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class Menus extends BaseMenus
{
    private const MAIN = 'main-menu';

    public function menus() : void
    {
        register_nav_menus([
            self::MAIN => Translations::trans('Main menu'),
        ]);
    }
}
