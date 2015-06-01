<?php

namespace ClientName;

use ClientName\Ajax\ExampleAjax;
use ClientName\Configuration\ImageSizes;
use ClientName\Configuration\Scripts;
use ClientName\Menus\HeaderMenu;
use ClientName\PostTypes\ExamplePostType;
use ClientName\ShortCodes\ExampleShortCode;
use ClientName\Walkers\ExampleWalker;
use TimberMenu;

/**
 * Class ClientName.
 *
 * Declares all stuff related to the template. Its responsibility is just to centralise all customization.
 * If you need to add some customization create a class and call its constructor here.
 * For more info about how this theme is structured read README.md located in the theme root.
 */
class ClientNameTheme
{
    const VERSION = '0.1';
    const LANG = 'client-name';

    /**
     * Registers all customization classes.
     */
    public function __construct()
    {
        // Ajax
        new ExampleAjax();

        // Configuration
        new Scripts();
        new ImageSizes();

        // Menus
        new HeaderMenu();

        // PostTypes
        new ExamplePostType();

        // ShortCodes
        new ExampleShortCode();

        // Walkers
        new ExampleWalker();

        add_filter('timber_context', [$this, 'initializeContext']);
    }

    public function initializeContext($data)
    {
        $data['headerMenu'] = new TimberMenu('header-menu');

        return $data;
    }
}
