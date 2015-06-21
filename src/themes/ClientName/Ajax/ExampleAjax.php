<?php

namespace ClientName\Ajax;

class ExampleAjax
{
    public function __construct()
    {
        add_action('wp_ajax_nopriv_example', [$this, 'callbackExample']);
        add_action('wp_ajax_example', [$this, 'callbackExample']);
    }

    public function callbackExample()
    {
    }
}
