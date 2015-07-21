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
        $this->addScript('app');
    }
}
