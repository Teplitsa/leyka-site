<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

switch_theme( 'leyka-landing' );
update_option( 'date_format', 'd F Y');
update_option( 'show_on_front', 'posts');


wp_insert_user(array('user_login' => 'admin', 'user_pass' => 'leykatest', 'role' => 'administrator')) ;