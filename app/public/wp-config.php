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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'oxi4d1eNYIaQdQsBa4T45JM/jMhqVypYXobqH/5+leAjTkGlc1vQLLgqeEKv7jFlx09/Wr8NeYUGkUso1nTUnw==');
define('SECURE_AUTH_KEY',  'mJacQPX0u01r9E0sJRFslfXtzHRioIN+BjFC0rE27kRap4s2zjqarwYLRu4XOBu3PDhLcGQ4g1+VVSIIaRikOQ==');
define('LOGGED_IN_KEY',    'Y9tcFViOalvQqVOw9Gz4d7lcA1Em1MpGVTzq7Btfxf8ClcNaoW1hFJi+vICdqTf9Gq0X9LawVKgnr/SkpJr7iQ==');
define('NONCE_KEY',        'TfOF001vbhvrQfhY+MD5jQPQEX7Pe1zutIYesK1oy7EijmtDJowQ5eteYgP8EfkYqBUWFmyHBUDXx5Db68JWDg==');
define('AUTH_SALT',        'v+xdP9EDjKcn2QQ1mZdYM4md6gIhDAuQmPEekuKhP2ItDwfvehxQSr8kf5UI6sshi860jXa4JOuH9p2zS/cvog==');
define('SECURE_AUTH_SALT', 'XXW9jBcqyxvLjNUtYuEBI0BG0MGsz4yvx4qwqcusnt9rQMc8F8eJlMgpz3qOuLHJ9qPWIupPOyucR6mnOox8xw==');
define('LOGGED_IN_SALT',   'wWoimW59Qvur3CkeBEKfErz+gsRCiaxRuE1KoSjpaWPB+hVyAvrd46ZeAYhd2/Sk8/3VLwJJyEzPL1IAZbRJ/g==');
define('NONCE_SALT',       '4WUG4b38+Rh4Zf336IZ6z+SM9ftcs89zQT50FxYNuQzPQbp6sswfPsMRuNN6am3f/d2YYDvHy29t29i47XtePw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
