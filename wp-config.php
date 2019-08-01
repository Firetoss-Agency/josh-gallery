<?php

// If a local config file exists
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
	// Use these settings on the local server
 	include( dirname( __FILE__ ) . '/wp-config-local.php' );
} else {
	// Otherwise use the settings below on staging/production
    define('WP_HOME', 'http://allisonjosh.green');
    define('WP_SITEURL', WP_HOME);
    
    // ** MySQL settings ** //
    /** The name of the database for WordPress */
    define('DB_NAME', 'allisonj_wpdb');
    
    /** MySQL database username */
    define('DB_USER', 'allisonj_dbuser');
    
    /** MySQL database password */
    define('DB_PASSWORD', '?2k.K61YoRpQ');
    
    /** MySQL hostname */
    define('DB_HOST', 'localhost');
    
    /** Define the environment, for Roots/Sage */
    define('WP_ENV', 'production');

}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don\'t change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'MykjnNR32REYIa/NXmfwAaiEHpjt6GF9ZQrHAtBtbdfI4lT9ph+XKZdpTGPOkiX+uRQ1qzA5vtNaPSnu366j+A==');
define('SECURE_AUTH_KEY',  'kEEIHtCFj2PX3Rf+UHXqhKw/x35eQdTP1D5gAJ8Ie4yUbAQE0m1n8gEL385QBn2zARPcvcFLNVXFG1n01rUiKQ==');
define('LOGGED_IN_KEY',    '6d8S5bRjuqrFgfEswHeHL9Jg5nR4KxATtkQTX/o7XRWaz1MKKp1M72maowy4hW6xjCuLBDW3FYd56EXHIJKGnA==');
define('NONCE_KEY',        'QLVUsWd9MMO+7JOMsBnuj+bYjxVtofYpsLRVj3mfF7Y+JDDU514Nkv9ylDy26onHJKL1ejT7kOT5CcabXDXcEg==');
define('AUTH_SALT',        'iYTaDH5s3sQUXEZLgBtYy+fVxGqWaRS4Z9zBVxdq9k+/mr78kMbDo9/sF+llzJZM63sNuX8rje+PBh5Htb7/KQ==');
define('SECURE_AUTH_SALT', 'R17ASEFalXOcNzOA70Lc8W3iHHJ0iQXEEGQKB1U/neSgeXS7pLXUS2u2aLJdo0k80cQN6cQcGRuETIwXszHSVw==');
define('LOGGED_IN_SALT',   'Q0lSTyIQKD7LmRJPMt5+p/Gcn7tA9r2bmn/L9q13eSuK6MngJwPrdsVzAkQG4S5U5OsRdMi8ZWPtotOesA/wJQ==');
define('NONCE_SALT',       'pjASL8fPDfeEOIB5jie20Y9BjRT3KZmahUdlNUHWugSFVl9EKJvSv4gQdzVI7ECrcgshjK23R97qwRzP/X2eQw==');

$table_prefix = 'ft_';

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', false );
define( 'AUTOMATIC_UPDATER_DISABLED', false );
define( 'WP_AUTO_UPDATE_CORE', true );
// define( 'WPCF7_AUTOP', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
