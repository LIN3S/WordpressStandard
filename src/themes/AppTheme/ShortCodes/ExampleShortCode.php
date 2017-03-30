<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-present LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppTheme\ShortCodes;

/**
 * Very basic example of ShortCode class. Loads all the short codes
 * when this class is instantiate with "add_shortcode" internal method.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class ExampleShortCode
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_shortcode('example', [$this, 'exampleShortCode']);
    }

    /**
     * The callback example short code method.
     *
     * @param string|array $attributes The attributes param, can be string but often is an array
     * @param string       $content    The content
     *
     * @return string
     */
    public function exampleShortCode($attributes, $content = '')
    {
        return $content;
    }
}
