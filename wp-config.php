<?php

require_once(dirname(__FILE__) . '/wp-config-custom.php');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/core/');

define('WP_CONTENT_DIR', realpath(ABSPATH.'../src/'));
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/core');
define('WP_CONTENT_URL', WP_HOME . '/src');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
