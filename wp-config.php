<?php

require_once(dirname(__FILE__) . '/wp-config-custom.php');

$table_prefix = 'wp_';

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/core/');
}

define('WP_CONTENT_DIR', realpath(ABSPATH . '../src/'));
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/core');
define('WP_CONTENT_URL', WP_HOME . '/src');

require_once(ABSPATH . 'wp-settings.php');
