<?php

namespace ClientName\ShortCodes;

class ExampleShortCode
{
    public function __construct()
    {
        add_shortcode('example', [$this, 'registerShortCode']);
    }

    public function registerShortCode($attrs, $content = "")
    {
        return $content;
    }
}
