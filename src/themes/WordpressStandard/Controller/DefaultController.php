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
 * Basic controller that works in the same way of MVC frameworks like Laravel or Symfony.
 * It uses Timber that renders views with Twig Template engine inside Wordpress.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class DefaultController
{
    /**
     * Index action.
     *
     * @return bool|string
     */
    public function indexAction()
    {
        $context = Timber::get_context();

        return Timber::render('pages/index.twig', $context);
    }

    /**
     * Not found action.
     *
     * @return bool|string
     */
    public function notFoundAction()
    {
        $context = Timber::get_context();

        return Timber::render('pages/404.twig', $context);
    }

    /**
     * Page action.
     *
     * @return bool|string
     */
    public function pageAction()
    {
        $context = Timber::get_context();
        $context['page'] = new TimberPage();

        return Timber::render('pages/default.twig', $context);
    }
}