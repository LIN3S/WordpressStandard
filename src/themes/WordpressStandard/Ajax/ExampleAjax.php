<?php

/*
 * This file is part of the Wordpress Standard project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard\Ajax;

/**
 * Very basic example of Ajax class. It contains calls to "add_action"
 * Wordpress internal method and then its callbacks.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class ExampleAjax
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('wp_ajax_nopriv_example', [$this, 'ajax']);
        add_action('wp_ajax_example', [$this, 'ajax']);
    }

    /**
     * The callback example method.
     */
    public function ajax()
    {
    }
}
