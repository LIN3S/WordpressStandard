<?php

namespace ClientName\ShortCodes;

class ExampleShortCode
{
    public function __construct()
    {
        add_shortcode('example', array($this, 'registerShortcode'));
    }

    public function registerShortcode($attrs, $content = "")
    {
        return $content;
    }
} 