<?php

/*
 * This file is part of the Wordpress Standard project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard\Widgets\Areas;

use LIN3S\WPFoundation\Configuration\Translations\Translations;
use LIN3S\WPFoundation\Widgets\Areas\WidgetArea;

/**
 * Very basic example of widget area class. Initializes
 * the widget area defined into widget area method.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class ExampleWidgetArea extends WidgetArea
{
    /**
     * {@inheritdoc}
     */
    public function widgetArea()
    {
        register_sidebar([
            'name'          => Translations::trans('Example widgets'),
            'id'            => 'example-widgets',
            'before_widget' => '<section class="">',
            'after_widget'  => '</section>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>',
        ]);
    }
}
