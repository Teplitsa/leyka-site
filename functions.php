<?php
/**
 * functions and definitions
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die();
}

# old pages redirects
if(preg_match("/\/instruction\/?$/", $_SERVER['REQUEST_URI'])) {
    wp_redirect('/docs/what-is-leyka/', 301);
    exit;
}

if(preg_match("/\/leyka-standalone\/?$/", $_SERVER['REQUEST_URI'])) {
    wp_redirect('/step/step-setup-on-wp/', 301);
    exit;
}

if(preg_match("/\/for-developers\/?$/", $_SERVER['REQUEST_URI'])) {
    wp_redirect('/docs/sistemnye-trebovaniya/', 301);
    exit;
}

# set conts
const LL_FUNDRAIZING_ADVICES_SLUG = 'fundraising_advices';
const LL_FORCE_THEME_MOD_SETUP = false;

require_once( get_template_directory() . '/core/utils.php' );
require_once( get_template_directory() . '/core/hooks.php' );
require_once( get_template_directory() . '/core/class-cssjs.php' );
require_once( get_template_directory() . '/core/customizer.php' );

// WP libs to operate with files and media
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );
require_once( get_template_directory() . '/core/class-mediamnt.php' );
require_once( get_template_directory() . '/core/class-import.php' );

// Include modules
foreach (glob(get_template_directory() . '/modules/*') as $module_file) {
    if(is_dir($module_file)) {
        $php_filename = basename($module_file) . '.php';
        $php_file = $module_file . '/' . $php_filename;
    } else {
        $php_file = $module_file;
    }
    
    if(is_file($php_file) && preg_match('/.*\.php$/', $php_file)) {
        require( $php_file );
    }
}

// theme setup
function ll_setup() {
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'll_setup', 9 );
