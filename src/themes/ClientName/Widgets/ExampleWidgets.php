<?php

namespace Bizkarra\Widgets;

class ExampleWidgets
{
    public function __construct()
    {
        add_action('widgets_init', [$this, 'addWidgetArea']);
    }

    public function addWidgetArea()
    {
        register_sidebar([
            'name'          => 'Example widgets',
            'id'            => 'example-widgets',
            'before_widget' => '<section class="">',
            'after_widget'  => '</section>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>',
        ]);
    }
}
