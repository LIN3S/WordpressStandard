<?php

define('WP_MEMORY_LIMIT', '64M');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_AUTO_UPDATE_CORE', false);

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ ordPress.org secret-key
 * service} You can change these at any point in time to invalidate all existing cookies. This will force all users to
 * have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'put your unique phrase here');
define('SECURE_AUTH_KEY', 'put your unique phrase here');
define('LOGGED_IN_KEY', 'put your unique phrase here');
define('NONCE_KEY', 'put your unique phrase here');
define('AUTH_SALT', 'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT', 'put your unique phrase here');
define('NONCE_SALT', 'put your unique phrase here');

/**
 * Configure email on dev environment.
 */
define('NVL_SMTP_FORCE', true);                     // Force to use SMTP
define('NVL_SMTP_FROM_NAME', 'Gorka');              // Sender name
define('NVL_SMTP_FROM_EMAIL', 'gorka@lin3s.com');   // Sender email
define('NVL_SMTP_USER', 'igarcia@lin3s.com');       // Gmail user to send email via SMTP
define('NVL_SMTP_PASS', 'pass');                    // Gmail user password
define('NVL_SMTP_HOST', 'smtp.mandrillapp.com');
define('NVL_SMTP_PORT', 587);
define('NVL_SMTP_SECURE', 'tsl');

// If you define this constant, every sended emails will arrive to this address
// define('CALL_ME_EMAIL_TO', 'email@email.com');
