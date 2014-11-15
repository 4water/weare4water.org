<?php

/* Private Configuration File
** DO NOT COMMIT TO REPOSITORY
**
** Copy file contents to a new file named wp-config-development.php to get started
**
*/

/* Domain */
define('DOMAIN', 				'weare4water.org');

/* Database Configuration */
define('DB_NAME', 				'4water_development');
define('DB_USER', 				'root');
define('DB_PASSWORD',			'root');

define('WP_POST_REVISIONS', 	0);

/* SMTP Configuration */
define('WPMS_MAIL_FROM_NAME',	'the name from which emails should appear');
define('WPMS_MAIL_FROM',		'the email address used to send emails');
define('WPMS_SMTP_USER',		'the email address used to send emails');
define('WPMS_SMTP_PASS',		'the password for that email');

/* Keys & Salts
** https://api.wordpress.org/secret-key/1.1/salt/
*/
define('AUTH_KEY',        		'replace this from the url above');
define('SECURE_AUTH_KEY', 		'replace this from the url above');
define('LOGGED_IN_KEY',   		'replace this from the url above');
define('NONCE_KEY',       		'replace this from the url above');
define('AUTH_SALT',       		'replace this from the url above');
define('SECURE_AUTH_SALT',		'replace this from the url above');
define('LOGGED_IN_SALT',  		'replace this from the url above');
define('NONCE_SALT',      		'replace this from the url above');

// API Keys
define('WPCOM_API_KEY', 		'replace this from the listed url'); 	// https://apikey.wordpress.com/
define('MC_API_KEY', 			'');									// https://us3.admin.mailchimp.com/account/api/

/* Debug Configuration */
define('WP_DEBUG', 				false);
define('WP_DEBUG_LOG', 			false);
define('WP_DEBUG_DISPLAY', 		false);
define('SCRIPT_DEBUG', 			false);
define('SAVEQUERIES', 			false);

/* Performancing Configuration */
define('WP_CACHE',				false);
define('COMPRESS_CSS', 			false);
define('COMPRESS_SCRIPTS', 		false);
define('CONCATENATE_SCRIPTS', 	false);
define('ENFORCE_GZIP', 			false);