<?php

//include 'NvlImageSizes.php';
//include 'NvlRewriteRules.php';
//include 'NvlScripts.php';
//include 'NvlShortCodes.php';

//include 'postTypes/ExamplePostType.php';

//include 'walkers/ExampleWalker.php';

/**
 * Class NvlTheme
 *
 * Declares all stuff related to the template. Its responsibility is just to centralise all customization. If you need
 * to add some customization create a class and call its constructor here.
 *
 * For more info about how this theme is structured read README.md located in the theme root
 */
class NvlTheme {

    const VERSION = LIN3S_THEME_VERSION;
    const LANG = LIN3S_LANG;

    /**
     * Registers all customization classes
     */
    public function __construct()
    {
        //new NvlImageSizes();
        //new NvlRewriteRules();
        //new NvlShortCodes();

        //Post types
        //new ExamplePostType();

        //Walkers
        //new ExampleWalker();
    }

}