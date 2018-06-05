<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'wordpress_production');
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Yankees5a');

/** MySQL hostname */
define('DB_HOST', 'docker_mysql');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p)KImffSsWvV8>-|#`%wRx{NM/l5R9}mrZl:.N9yRj~ ds&jKz+HG96=PvL/Dz~E');
define('SECURE_AUTH_KEY',  'wo}kR=V(AQys6%*<$GjT5&#7el+bGvjowdNZAYgvk4W0ePk0G$OzLTI-R~=-Geb>');
define('LOGGED_IN_KEY',    'Si]+7i2{1`BlGVQzZYkogy[2ocy}KO73]qY?=8x/Fi&qKE)7P{APKF8EA{E{ R)-');
define('NONCE_KEY',        'u.%_Cf%{#(DIP{MKz!g1Q!VB0S27dq2I+0{xqV1jn*iOy^>q;aNu0K[o%QZ)K.ch');
define('AUTH_SALT',        '+.%I.sB*$tC(g{+^H9#c2EO+[d`W7+1`$O${,{}}^G r`K=wRY_!5qae_G_;C+s4');
define('SECURE_AUTH_SALT', 'n0b75xD/^ W|~Sjyku~LVEvIpS|@`~d9]L{Y[1<;$IA[AwSl($&}N!>8UD&64y]e');
define('LOGGED_IN_SALT',   'S]-BqhO!(,3C;RO)g4D(xC3VJBeSvA)s(E|$K%%Z98]Ifl(f.S= 2Z`biu.-;y*.');
define('NONCE_SALT',       'Ub]nn6<},6+S]dp)p+z}#&Z8pEwMfg*q7NJ@{+hNe0RBx7iSr]>$EiIjh#LxJ4@u');

define('FORCE_SSL_ADMIN', true);
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

#define('WP_HOME',$_SERVER['SERVER_ADDR']);
#define('WP_SITEURL',$_SERVER['SERVER_ADDR']);

define( 'WP_SITEURL', 'http://faviosmom.com'); 
define( 'WP_HOME', 'http://faviosmom.com');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
