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
use App\Configuration\Menus;
use LIN3S\WPFoundation\Configuration\Theme\Theme;

class App extends Theme
{
    public function classes() : void
    {
        new Login();
        new Menus();
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
