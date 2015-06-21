<?php

namespace ClientName\Configuration;

class Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'includeScripts']);
    }

    public function includeScripts()
    {
        wp_enqueue_script('app', get_template_directory_uri() . '/Resources/assets/js/app.js', ['jquery'], '1.0.0', true);
    }
}
