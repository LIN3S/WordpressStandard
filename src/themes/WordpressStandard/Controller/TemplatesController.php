<?php

/*
 * This file is part of the Wordpress Standard project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordpressStandard\Controller;

use Timber;
use TimberPage;

/**
 * Basic template controller that works in the same way of MVC frameworks like Laravel or Symfony.
 * It uses Timber that renders views with Twig Template engine inside Wordpress.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class TemplatesController
{
    /**
     * Contact action.
     *
     * @return bool|string
     */
    public function contactAction()
    {
        $context = Timber::get_context();
        $context['contact'] = new TimberPage();

        return Timber::render(['pages/templates/contact.twig'], $context);
    }
}
