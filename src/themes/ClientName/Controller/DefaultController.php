<?php

namespace ClientName\Controller;

use Timber;

class DefaultController
{
    public function indexAction() {
        $context = Timber::get_context();
        Timber::render('pages/index.twig', $context);
    }

    public function notFoundAction() {
        $context = Timber::get_context();
        Timber::render('pages/404.twig', $context);
    }
} 