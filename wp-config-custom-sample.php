<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */

define('WP_MEMORY_LIMIT',     '64M');

define('DB_NAME',             'database_name_here');
define('DB_USER',             'username_here');
define('DB_PASSWORD',         'password_here');
define('DB_HOST',             'localhost');
define('DB_CHARSET',          'utf8');
define('DB_COLLATE',          '');

define('WPLANG',                     '');       // '': default (English); 'es_ES': Spanish
define('WP_DEBUG',                   true);
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISALLOW_FILE_EDIT',         true);
define('DISALLOW_FILE_MODS',         true);

define('AUTH_KEY',           'Put your unique phrase here');
define('SECURE_AUTH_KEY',    'Put your unique phrase here');
define('LOGGED_IN_KEY',      'Put your unique phrase here');
define('NONCE_KEY',          'Put your unique phrase here');
define('AUTH_SALT',          'Put your unique phrase here');
define('SECURE_AUTH_SALT',   'Put your unique phrase here');
define('LOGGED_IN_SALT',     'Put your unique phrase here');
define('NONCE_SALT',         'Put your unique phrase here');

define('MAILER_HOST',        'smtp.mandrillapp.com');
define('MAILER_PORT',        587);
define('MAILER_USERNAME',    'Put the username here');
define('MAILER_PASSWORD',    'Put the password here');
define('MAILER_TO',          'The receiver email address');
define('MAILER_FROM',        'The email address that will be shown to the receiver');
define('MAILER_FROM_NAME',   'The name that will be shown to the receiver');

define('TRANSLATION_DOMAIN', 'Put your translation domain');
define('XMLRPC_ENABLED', false);
