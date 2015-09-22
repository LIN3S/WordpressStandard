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

use LIN3S\WPFoundation\Configuration\Translations\Translations as BaseTranslations;

/**
 * Final Translations class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class Translations extends BaseTranslations
{
    /**
     * {@inheritdoc}
     */
    public function translations()
    {
        return [
            'Welcome'        => __('Welcome', 'WordPress Standard'),
            'Page not found' => __('Page not found', 'WordPress Standard'),
        ];
    }
}
