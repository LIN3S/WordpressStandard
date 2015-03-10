<?php

/**
 * Class ExamplePostType
 *
 * Declares new post type with given configuration
 *
 * Create a new class for each post type and remember to declare it in core/main.php
 *
 * BY DEFAULT THIS CLASS IS NOT ENABLED, UNCOMMENT THE LINES RELATED TO THIS FILE IN /core/main.php
 */
class ExamplePostType
{
    /**
     * Calls the actions related to the post type
     */
    public function __construct()
    {
        add_action('init', array($this, 'examplePostType'));
    }

    /**
     * Registers post type.
     *
     * More info about registering custom post types: http://codex.wordpress.org/Function_Reference/register_post_type
     */
    public function examplePostType()
    {
        register_post_type('example',
            array(
                'labels' => array(
                    'name' => __('Example post types'),
                    'singular_name' => __('Example post type')
                ),
                'public' => true,
                'has_archive' => true,
            )
        );
    }
} 