<?php
/**
 * functions and definitions
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die();
}

const LL_FUNDRAIZING_ADVICES_SLUG = 'fundraising_advices';

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
    add_theme_support('post-thumbnails');
}
add_action( 'after_setup_theme', 'll_setup', 9 );
