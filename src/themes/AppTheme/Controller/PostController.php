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

use Timber\Timber;

/**
 * WordPress base Post controller implementation.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Jon Torrado <jontorrado@gmail.com>
 */
final class PostController
{
    /**
     * Blog posts page.
     *
     * @return bool|string
     */
    public function listAction()
    {
        $context = Timber::get_context();
        $context['posts'] = Timber::get_posts();

        return Timber::render('pages/post/list.twig', $context);
    }

    /**
     * Category list action.
     *
     * @return bool|string
     */
    public function categoryListAction()
    {
        $context = Timber::get_context();
        $context['posts'] = Timber::get_posts();

        return Timber::render('pages/post/category_list.twig', $context);
    }

    /**
     * Show action.
     *
     * @return bool|string
     */
    public function showAction()
    {
        $context = Timber::get_context();
        $context['post'] = Timber::get_post();

        return Timber::render('pages/post/show.twig', $context);
    }
}
