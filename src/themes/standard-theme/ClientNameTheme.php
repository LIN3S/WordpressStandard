<?php

namespace ClientName;

/**
 * Class ClientName
 *
 * Declares all stuff related to the template. Its responsibility is just to centralise all customization. If you need
 * to add some customization create a class and call its constructor here.
 *
 * For more info about how this theme is structured read README.md located in the theme root
 */
class ClientNameTheme
{

    const VERSION = '0.1';
    const LANG = 'client-name';

    /**
     * Registers all customization classes
     */
    public function __construct()
    {
        //Initialize here all dependencies such as Configuration, Menus, PostTypes...

        add_filter('timber_context', array($this, 'initializeContext'));
    }


    public function initializeContext($data)
    {
        return $data;
    }
}
