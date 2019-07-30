<?php

// If a local config file exists
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
	// Use these settings on the local server
 	include( dirname( __FILE__ ) . '/wp-config-local.php' );
} else {
	// Otherwise use the settings below on staging/production
	define('WP_HOME', 'http://josh-gallery.ftscorch.com');
	define('WP_SITEURL', WP_HOME);

	// ** MySQL settings ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'db_josh-gallery');

	/** MySQL database username */
	define('DB_USER', 'forge');

	/** MySQL database password */
	define('DB_PASSWORD', '4S0acP0xO3YZM8T1kGnP');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');

	/** Define the environment, for Roots/Sage */
	define('WP_ENV', 'production');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don\'t change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         '+fOTlQKJSFU9xeKor+dmur4Hvaj1q62D/YstKxbuUrsDs7yF2Y5iowTnRZ52u2GklLfmclsNrHegORiCAcopQQ==');
define('SECURE_AUTH_KEY',  '9EELQQmx9W+b+Va6IFSH/94koWB5c5dtnz0XGRizsUZFpvgqjzrYlGB+wJ8kxGgIt1pwdk7EJyk/dRel1udeMA==');
define('LOGGED_IN_KEY',    '+gV24IULN5zi/npfbuW5Dw9XconFDL32Md3Gn600CRAYFCH2qFyqz/oR++SeZY3H8owdBbS4s670L1CJZ/D2Sg==');
define('NONCE_KEY',        'Xksebchd16Ll+16b8xRj/Fk1UY2bpNc218OGgVE8iY2uJLSXhvhLohJ3EZOK/TmL5lgbhLHCBtIHe/4pghrnMA==');
define('AUTH_SALT',        'Yn+dckBz1pMt8ewyfalup2gaSYINrudIIeUq7mehhwX1MXWIisLEUeiTuNf9G+YT7JTSf937rEx8AklYaFs7Ow==');
define('SECURE_AUTH_SALT', 'GCEl5NEXbdIifY6XnGY6YifZgZpMAf1ixKl+9r46j/e1FYaRmwMasOkwk96XjfpaA4vC6Kj3f9k7GDK1f/8IcQ==');
define('LOGGED_IN_SALT',   'k1q42gNvfPtIAEvIem4ghj6BJv4GQjP2YZWIb1PuhdePyulhkbsiAHK77OtEXDt6n08mwy/6E6bKq8mcSRbaPQ==');
define('NONCE_SALT',       'a8haYK9PVqareL8pOSGm0t4kfk6abzdHNNlWs3YvWUnvpapPx8YsJfhMoxXMc8iGbbXjqdf3ZAuVfkUb/SLw6A==');

$table_prefix = 'ft_';

define( 'WP_DEBUG', false );
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
