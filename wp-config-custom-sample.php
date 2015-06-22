<?php

define('WP_MEMORY_LIMIT', '64M');

define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WPLANG', ''); // '': default (English); 'es_ES': Spanish

define('WP_DEBUG', true);
define('WP_AUTO_UPDATE_CORE', false);

define('AUTH_KEY', 'put your unique phrase here');
define('SECURE_AUTH_KEY', 'put your unique phrase here');
define('LOGGED_IN_KEY', 'put your unique phrase here');
define('NONCE_KEY', 'put your unique phrase here');
define('AUTH_SALT', 'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT', 'put your unique phrase here');
define('NONCE_SALT', 'put your unique phrase here');

define('NVL_SMTP_FORCE', true);                     // Force to use SMTP
define('NVL_SMTP_FROM_NAME', 'Gorka');              // Sender name
define('NVL_SMTP_FROM_EMAIL', 'gorka@lin3s.com');   // Sender email
define('NVL_SMTP_USER', 'igarcia@lin3s.com');       // Gmail user to send email via SMTP
define('NVL_SMTP_PASS', 'pass');                    // Gmail user password
define('NVL_SMTP_HOST', 'smtp.mandrillapp.com');
define('NVL_SMTP_PORT', 587);
define('NVL_SMTP_SECURE', 'tsl');
