<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard\Configuration;

/**
 * Final image sizes class, its responsibility is to add different thumbnails
 * into WordPress ecosystem with "add_image_size" internal method.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class ImageSizes
{
    /**
     * Constructor.
     */
    public function __construct()
    {
         add_image_size('example_size', 0, 220);
    }
}
