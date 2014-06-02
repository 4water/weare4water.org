<?php

if ( !defined('ABSPATH') )				define('ABSPATH', dirname(__FILE__) . '/');

/* Set Server Booleans */
define('IS_DEVELOPMENT', 				$_SERVER['SERVER_ADDR'] == '127.0.0.1');
define('IS_STAGING', 					strpos($_SERVER['SCRIPT_FILENAME'], 'staging') != false);
define('IS_PRODUCTION', 				strpos($_SERVER['SCRIPT_FILENAME'], 'live') != false);

/* Server-Specific Configuration */
if 		(IS_DEVELOPMENT)				require ABSPATH . '../wp-config-development.php';
elseif 	(IS_STAGING)					require ABSPATH . '../wp-config-staging.php';
else 									require ABSPATH . '../wp-config-production.php';

/* Server-Generic Configuration */
define('DB_HOST', 						'localhost');
define('DB_CHARSET', 					'utf8');
define('DB_COLLATE', 					'');
$table_prefix = 'ft_';
define('CUSTOM_USER_TABLE',				$table_prefix . 'users');

define('WP_SITEURL', 					'http://'.DOMAIN.'/');
define('WP_HOME', 						'http://'.DOMAIN);
define('WP_CONTENT_URL',				DOMAIN . '/content');
define('WP_CONTENT_DIR',				realpath(ABSPATH.'../content'));
define('WPCACHEHOME', 					WP_CONTENT_DIR . '/plugins/wp-super-cache/');
define('CORE_UPGRADE_SKIP_NEW_BUNDLED',	true );

define('MULTISITE', 					true);
define('SUNRISE', 						true); // supports nested urls like /salsa/glasgow
define('SUBDOMAIN_INSTALL', 			false);
define('DOMAIN_CURRENT_SITE', 			DOMAIN);
define('PATH_CURRENT_SITE', 			'/');
define('SITE_ID_CURRENT_SITE', 			1);
define('BLOG_ID_CURRENT_SITE', 			1);

define('WPMS_ON', 						true);
define('WPMS_MAILER', 					'smtp');
define('WPMS_SMTP_HOST', 				'smtp.gmail.com');
define('WPMS_SMTP_PORT', 				465);
define('WPMS_SSL', 						'ssl');
define('WPMS_SET_RETURN_PATH', 			'false');
define('WPMS_SMTP_AUTH', 				true);

define( 'WPLANG', '' );

require_once(ABSPATH . 'wp-settings.php');