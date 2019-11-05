<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

//page
$posts_data = array(
    array(
        'post_title' => 'Откройте мир возможностей по сбору пожертвований',
        'post_name' => 'vozmozhnosti',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'meta' => array('ll_page_super_title' => 'Лейка'),
    ),
);

LL_Setup_Utils::setup_posts_data($posts_data, 'page');

// common
for($i = 1; $i <= LL_Capability_Service::$number; $i++) {
    ll_set_theme_mod_safe('ll_label_capability'.$i.'_title', "Широкий набор платежных систем и опций");
    
    ll_set_theme_mod_safe('ll_label_capability'.$i.'_description', "Лейка – это плагин для Wordpress’a. Но установить его не трудно, тем более у нас есть подробная видео-инструкция");
    
    ll_set_theme_mod_safe('ll_label_capability'.$i.'_link_title', "Как активировать?");
    
    ll_set_theme_mod_safe('ll_label_quick_start'.$i.'_link_url', site_url("/"));
}
