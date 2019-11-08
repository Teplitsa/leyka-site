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

// add categories
$categories = array(
    array('slug' => LL_Capability_Service::$main_capabilites_cat, 'name' => "Главные возможности"),
    array('slug' => LL_Capability_Service::$new_capabilites_cat, 'name' => "Новые функции"),
);
LL_Setup_Utils::setup_terms_data($categories, LL_Capability_Service::$category_tax);

$posts_data = array(
    array(
        'post_title' => 'Более 24 способов приема платежей',
        'post_name' => 'capability-many-payment-ways',
        'post_excerpt' => '',
        'post_content' => 'Лейка – это плагин для Wordpress’a. Но установить его не трудно, тем более у нас есть подробная видео-инструкция',
        'thumbnail_path' => '/data/capabilities/screen-cap1.png',
        'menu_order' => 1,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$main_capabilites_cat),
        ),
    ),
    array(
        'post_title' => 'Юридические и физические лица',
        'post_name' => 'capability-fizur',
        'post_excerpt' => '',
        'post_content' => 'Лейка – это плагин для Wordpress’a. Но установить его не трудно, тем более у нас есть подробная видео-инструкция',
        'thumbnail_path' => '/data/capabilities/screen-cap2.png',
        'menu_order' => 2,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$main_capabilites_cat),
        ),
    ),
    array(
        'post_title' => 'Регулярные и разовые платежи',
        'post_name' => 'capability-recurring-donations',
        'post_excerpt' => '',
        'post_content' => 'Лейка – это плагин для Wordpress’a. Но установить его не трудно, тем более у нас есть подробная видео-инструкция',
        'thumbnail_path' => '/data/capabilities/screen-cap3.png',
        'menu_order' => 3,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$main_capabilites_cat),
        ),
    ),
    array(
        'post_title' => 'Личный кабинет донора при регулярных платежах',
        'post_name' => 'capability-donor-account',
        'post_excerpt' => '',
        'post_content' => 'Лейка – это плагин для Wordpress’a. Но установить его не трудно, тем более у нас есть подробная видео-инструкция',
        'thumbnail_path' => '/data/capabilities/screen-cap4.png',
        'menu_order' => 4,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$main_capabilites_cat),
        ),
    ),
    array(
        'post_title' => 'Dashboard: Вся отчетность на одном экране',
        'post_name' => 'capability-reports',
        'post_excerpt' => '',
        'post_content' => 'Лейка – это плагин для Wordpress’a. Но установить его не трудно, тем более у нас есть подробная видео-инструкция',
        'thumbnail_path' => '/data/capabilities/screen-cap5.png',
        'menu_order' => 5,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$main_capabilites_cat),
        ),
    ),
    array(
        'post_title' => 'Data Layer',
        'post_name' => 'capability-stats',
        'post_excerpt' => '',
        'post_content' => 'Cчитаю, что нам тоже нужно ее оформить по-другому. Мне очень нравится как сделано здесь',
        'thumbnail_path' => '/data/capabilities/icon-cap-stats.png',
        'menu_order' => 1,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$new_capabilites_cat),
        ),
    ),
    array(
        'post_title' => 'Раздел «Доноры»',
        'post_name' => 'capability-donors',
        'post_excerpt' => '',
        'post_content' => 'Cчитаю, что нам тоже нужно ее оформить по-другому. Мне очень нравится как сделано здесь',
        'thumbnail_path' => '/data/capabilities/icon-cap-crm.png',
        'menu_order' => 2,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$new_capabilites_cat),
        ),
    ),
    array(
        'post_title' => 'Пакеты поддержки',
        'post_name' => 'capability-support',
        'post_excerpt' => '',
        'post_content' => 'Cчитаю, что нам тоже нужно ее оформить по-другому. Мне очень нравится как сделано здесь',
        'thumbnail_path' => '/data/capabilities/icon-cap-questions.png',
        'menu_order' => 3,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$new_capabilites_cat),
        ),
    ),
    array(
        'post_title' => 'Градусники',
        'post_name' => 'capability-progress-bar',
        'post_excerpt' => '',
        'post_content' => 'Cчитаю, что нам тоже нужно ее оформить по-другому. Мне очень нравится как сделано здесь',
        'thumbnail_path' => '/data/capabilities/icon-cap-packing.png',
        'menu_order' => 4,
        'tax_terms' => array(
            LL_Capability_Service::$category_tax => array(LL_Capability_Service::$new_capabilites_cat),
        ),
    ),
);
LL_Setup_Utils::setup_posts_data($posts_data, LL_Capability_Service::$post_type);

// common
// for($i = 1; $i <= LL_Capability_Service::$number; $i++) {
//     ll_set_theme_mod_safe('ll_label_capability'.$i.'_title', "Широкий набор платежных систем и опций");
    
//     ll_set_theme_mod_safe('ll_label_capability'.$i.'_description', "Лейка – это плагин для Wordpress’a. Но установить его не трудно, тем более у нас есть подробная видео-инструкция");
    
//     ll_set_theme_mod_safe('ll_label_capability'.$i.'_link_title', "Как активировать?");
    
//     ll_set_theme_mod_safe('ll_label_quick_start'.$i.'_link_url', site_url("/"));
// }

ll_set_theme_mod_safe('ll_label_capability_new_caps_title', "Но это не всё! Мы постоянно добавляем новый функционал");
