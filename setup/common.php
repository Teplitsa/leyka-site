<?php /** Leyka - common utility functions for procedures running. */

function ll_get_wp_core_path() {

    $current_script_dir = dirname(__FILE__);
    do {
        if(file_exists($current_script_dir.'/wp-load.php')) {
            return $current_script_dir;
        }
    } while($current_script_dir = realpath("$current_script_dir/.."));

    return null;

}

require_once ll_get_wp_core_path().'/wp-load.php';
