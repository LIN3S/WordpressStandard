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
use WordpressStandard\PostTypes\ProductPostType;

/**
 * Basic product controller that works in the same way of MVC frameworks like Laravel or Symfony.
 * It uses Timber that renders views with Twig Template engine inside Wordpress.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
final class ProductController
{
    /**
     * Product list action.
     *
     * @return bool|string
     */
    public function listAction()
    {
        $context = Timber::get_context();
        $products = Timber::get_posts();
        $context['products'] = ProductPostType::serialize($products);

        return Timber::render('pages/product/list.twig', $context);
    }

    /**
     * Shows a single product action.
     *
     * @return bool|string
     */
    public function singleAction()
    {
        $context = Timber::get_context();
        $product = Timber::get_post();
        $context['product'] = ProductPostType::serialize($product);

        return Timber::render('pages/product/show.twig', $context);
    }
}
