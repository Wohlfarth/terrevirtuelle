<?php
/** 
 * The base configurations of the WordPress.
 *
 **************************************************************************
 * Do not try to create this file manually. Read the README.txt and run the 
 * web installer.
 **************************************************************************
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. 
 *
 * This file is used by the wp-config.php creation script during the
 * installation.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tv');

/** MySQL database username */
define('DB_USER', 'terrevirtuelle');

/** MySQL database password */
define('DB_PASSWORD', 'diana69');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('VHOST', 'yes'); 
$base = '/';
define('DOMAIN_CURRENT_SITE', 'terrevirtuelle.com' );
define('PATH_CURRENT_SITE', '/' );
define('BLOGID_CURRENT_SITE', '1' );

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'd00ebf198caf3c4f0017ad3a13f7374a0ac42ddac412bf2a3ff05ee0a0c7c54e');
define('SECURE_AUTH_KEY', '52ddfc1b29df88f7109148d20e4d7c9f8da8dc2bf2e2e2ffc35f63ab818afcb2');
define('LOGGED_IN_KEY', '6b8434f5eff88fe346287968f31a29b75095a4fb8fe4f6972368d97d3667fa70');
define('NONCE_KEY', '44be2e55e2081c26a796fee131e3fc0e85e4c568c81020cc451cf45bd03cf64f');
define('AUTH_SALT', 'f03e056b2957fa9d6c473506c88340899d9211f4a2ca0c462a6ad0f362c7920d');
define('LOGGED_IN_SALT', '989bd3d79df8ff535a02de030553fa03975c6f27eab6de70fb15d800796c8deb');
define('SECURE_AUTH_SALT', '05b1bdf26537b934b2eb6ba2444172b3f5684ab2d906824c0be3a7b742bb08d6');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

// double check $base
if( $base == 'BASE' )
	die( 'Problem in wp-config.php - $base is set to BASE when it should be the path like "/" or "/blogs/"! Please fix it!' );

// uncomment this to enable wp-content/sunrise.php support
//define( 'SUNRISE', 'on' );

// uncomment to move wp-content/blogs.dir to another relative path
// remember to change WP_CONTENT too.
// define( "UPLOADBLOGSDIR", "fileserver" );

// If VHOST is 'yes' uncomment and set this to a URL to redirect if a blog does not exist or is a 404 on the main blog. (Useful if signup is disabled)
// For example, the browser will redirect to http://examples.com/ for the following: define( 'NOBLOGREDIRECT', 'http://example.com/' );
// define( 'NOBLOGREDIRECT', '' );
// On a directory based install you can use the 404 handler.

// Location of mu-plugins
// define( 'WPMU_PLUGIN_DIR', '' );
// define( 'WPMU_PLUGIN_URL', '' );
// define( 'MUPLUGINDIR', 'wp-content/mu-plugins' );

// Uncomment to disable the site admin bar
//define( 'NOADMINBAR', 1 );

define( "WP_USE_MULTIPLE_DB", false );

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
