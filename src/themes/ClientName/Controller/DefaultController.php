<?php

namespace ClientName\Controller;

use Timber;
use TimberPage;

class DefaultController
{
    public function indexAction()
    {
        $context = Timber::get_context();

        return Timber::render('pages/index.twig', $context);
    }

    public function pageAction()
    {
        $context = Timber::get_context();
        $context['page'] = new TimberPage();

        return Timber::render('pages/default.twig', $context);
    }

    public function NotFoundAction()
    {
        $context = Timber::get_context();

        return Timber::render('pages/404.twig', $context);
    }
}
