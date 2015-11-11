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
    public function assets()
    {
        $this->addScript('fastclick', self::VENDOR . '/fastclick/lib');
        $this->addScript('svg4everybody.min', self::VENDOR . '/svg4everybody/dist');
        $this->addScript('modernizr', self::BUILD_JS, [], '3.0.0', false);

        if (WP_DEBUG) {
            $this->addStylesheet('app', self::CSS);
            $this->addScript('app');
            $this->addScript('cookies');
        } else {
            $this->addStylesheet('app.min', self::CSS);
            $this->addScript('app.min', self::BUILD_JS);
        }
    }
}
