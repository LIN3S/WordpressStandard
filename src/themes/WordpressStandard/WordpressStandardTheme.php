<?php

/*
 * This file is part of the Wordpress Standard project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard;

use WordpressStandard\Configuration\Assets;
use WordpressStandard\Configuration\ImageSizes;
use WordpressStandard\Configuration\Menus;
use LIN3S\WPFoundation\Configuration\Theme\Theme;
use TimberMenu;

/**
 * Final class of theme. Declares all stuff related to the template. Its responsibility
 * is just to centralise all customization. If you need to add some customization create a class and
 * call its constructor here. For more info about how this theme is structured read README.md
 * located in the theme root.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class WordpressStandardTheme extends Theme
{
    const VERSION = '0.1';
    const LANG = 'WordpressStandard';

    /**
     * {@inheritdoc}
     */
    public function classes()
    {
        new Assets();
        new ImageSizes();
        new Menus();
    }

    /**
     * {@inheritdoc}
     */
    public function context(array $context)
    {
        $context['headerMenu'] = new TimberMenu(Menus::MENU_HEADER);

        return $context;
    }

    /**
     * {@inheritdoc}
     */
    public function templates($templates)
    {
    }
}
