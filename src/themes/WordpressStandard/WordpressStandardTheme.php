<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard;

use LIN3S\WPFoundation\Configuration\Mailer\Mailer;
use LIN3S\WPFoundation\Configuration\Theme\Theme;
use LIN3S\WPFoundation\Twig\TranslationTwig;
use WordpressStandard\Configuration\Assets;
use WordpressStandard\Configuration\Login;
use WordpressStandard\Configuration\Menus;
use Timber\Menu;

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
    /**
     * {@inheritdoc}
     */
    public function classes()
    {
        new Assets();
        new Login();
        new Mailer();
        new Menus();

        new TranslationTwig();
    }

    /**
     * {@inheritdoc}
     */
    public function context(array $context)
    {
        $context['headerMenu'] = new Menu(Menus::MENU_HEADER);

        return $context;
    }

    /**
     * {@inheritdoc}
     */
    public function templates($templates)
    {
        return $templates;
    }
}
