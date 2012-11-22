<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //

if (isset($_SERVER["CLEARDB_DATABASE_URL"])) {
 $db = parse_url($_SERVER["CLEARDB_DATABASE_URL"]);
 define("DB_NAME", trim($db["path"],"/"));
 define("DB_USER", $db["user"]);
 define("DB_PASSWORD", $db["pass"]);
 define("DB_HOST", $db["host"]);
}
else {
 /** The name of the database for WordPress */
 define('DB_NAME', 'wp_mtz');

 /** MySQL database username */
 define('DB_USER', 'wp_mtz');

 /** MySQL database password */
 define('DB_PASSWORD', 'password');

 /** MySQL hostname */
 define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'IG-_LZzaUpii{1|> Nrduw([Gempr#xTn#l<|+$T,%dUk*/A,>@A|PVJ;-C]W93~');
define('SECURE_AUTH_KEY',  '{,)}^NRLZPJL.~H5=n-1jKe2elB(>g1R*d=XO}$R7B3r&6&^B`3J1Y*JY3<cwcyj');
define('LOGGED_IN_KEY',    'J]8s!@sBid n yeJX&qF6,3l3L]us@1Mrl N0!U_sg!=6i@vKm^F&q3& ::+Mpz7');
define('NONCE_KEY',        'mnQcmC%/HKmxzSMxo AnaNe7j!~gRM=-l&^lJ.;x-(U[p@%Yp5ju7=|AY f:&6Uf');
define('AUTH_SALT',        ';t0Tkt%hXLWZS+ce4wN2^@%aH*i!M/,WLW?WTJ-+UB/{-/5[0G1[^,2pKe2d+])j');
define('SECURE_AUTH_SALT', 'lXj%#sSM[^|}k@IO= 4:G7+3(=n_]J4R2F|u-vi#eHbv%P#eA@ @VcD)hI4o_h!d');
define('LOGGED_IN_SALT',   'bS4pWh/d;MyPziE7)yB7ny>+DRdg92=3AT9yEQ`1P`SzK1t6mcx3Vh;[+D:T1jsp');
define('NONCE_SALT',       '`dRA][6eWekYX2C,cS:nqfx=))wB&ftqCdOItA(4P1x5cH~-%`NY; PO0ACbYH8f');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'es_AR');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
