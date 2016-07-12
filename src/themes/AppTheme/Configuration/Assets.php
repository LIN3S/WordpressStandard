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

use LIN3S\WPFoundation\Configuration\Assets\Assets as BaseAssets;

/**
 * Final Assets class, it enqueue in a simple way all the scripts and stylesheets.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class Assets extends BaseAssets
{
    /**
     * {@inheritdoc}
     */
    public function developmentAssets()
    {
        $this
            ->addScript('bengor-cookies', self::NPM . '/bengor-cookies/dist/')
            ->addScript('fastclick', self::NPM . '/fastclick/lib')
            ->addScript('svg4everybody.min', self::NPM . '/svg4everybody/dist')
            ->addScript('modernizr', self::BUILD_JS, [], '3.0.0', false)

            ->addStylesheet('app', self::CSS)
            ->addScript('svg')
            ->addScript('app');
    }

    /**
     * {@inheritdoc}
     */
    public function productionAssets()
    {
        $this
            ->addStylesheet('app.min', self::CSS)
            ->addScript('app.min', self::BUILD_JS)
            ->addScript('modernizr', self::BUILD_JS, [], '3.0.0', false);
    }
}
