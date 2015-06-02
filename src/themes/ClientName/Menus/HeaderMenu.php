<?php

namespace ClientName\Menus;

use ClientName\ClientNameTheme;

class HeaderMenu
{
    public function __construct()
    {
        add_action('init', [$this, 'registerMenu']);
    }

    public function registerMenu()
    {
        register_nav_menu('header-menu', __('Header menu', ClientNameTheme::LANG));
    }
}
