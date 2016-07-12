<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppTheme\Controller;

use Timber\Post;
use Timber\Timber;

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

        return Timber::render('pages/index.html.twig', $context);
    }

    /**
     * Not found action.
     *
     * @return bool|string
     */
    public function notFoundAction()
    {
        $context = Timber::get_context();

        return Timber::render('pages/404.html.twig', $context);
    }

    /**
     * Page action.
     *
     * @return bool|string
     */
    public function pageAction()
    {
        $context = Timber::get_context();
        $context['page'] = new Post();

        return Timber::render('pages/default.html.twig', $context);
    }

    /**
     * Attachment action.
     *
     * @return bool|string
     */
    public function attachmentAction()
    {
        $context = Timber::get_context();
        $context['attachment'] = Timber::get_post();
        $context['attachment_image'] = wp_attachment_is_image($context['attachment']->ID);

        return Timber::render('pages/attachment/show.html.twig', $context);
    }
}
