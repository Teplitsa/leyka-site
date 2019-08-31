<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'procedures-common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

$menu_service = new LL_Menu_Service();

$menu_id = $menu_service->setup_and_clean_menu('primary');

$item_data = array(
    'menu-item-title' => "Для WordPress'a",
    'menu-item-url' => "https://leyka.te-st.ru/leyka-standalone/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Tilda, Wix и другое",
    'menu-item-url' => "https://leyka.te-st.ru/faq/#ask4",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 10,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Помощь",
    'menu-item-url' => "https://leyka.te-st.ru/support/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 20,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "GitHub",
    'menu-item-url' => "https://github.com/Teplitsa/leyka",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 30,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "WordPress",
    'menu-item-url' => "https://ru.wordpress.org/plugins/leyka/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 40,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);


// footer menu1
$menu_id = $menu_service->setup_and_clean_menu('footer1');

$item_data = array(
    'menu-item-title' => "Возможности Лейки",
    'menu-item-url' => "https://leyka.te-st.ru/vozmozhnosti/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Уже установили",
    'menu-item-url' => "https://leyka.te-st.ru/instruction/#page-item-394",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 10,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Тарифы на услуги",
    'menu-item-url' => "https://te-st.ru/about/ads/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 20,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

// footer menu2
$menu_id = $menu_service->setup_and_clean_menu('footer2');

$item_data = array(
    'menu-item-title' => "Для Wordpress’a",
    'menu-item-url' => "https://leyka.te-st.ru/leyka-standalone/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Для Tilda, Wix и другие платформы",
    'menu-item-url' => "https://leyka.te-st.ru/faq/#ask4",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 10,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Новости",
    'menu-item-url' => "/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 20,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

// footer menu3
$menu_id = $menu_service->setup_and_clean_menu('footer3');

$item_data = array(
    'menu-item-title' => "Документация",
    'menu-item-url' => "https://leyka.te-st.ru/instruction/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Помощь на «IT-волонтёр»",
    'menu-item-url' => "https://itv.te-st.ru/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 10,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Сделать сайт на «Кандинском»",
    'menu-item-url' => "https://knd.te-st.ru/install/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 20,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Чат разработчиков",
    'menu-item-url' => "https://t.me/leykadev",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 30,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Школа фандрейзера",
    'menu-item-url' => "/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 40,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

// footer menu4
$menu_id = $menu_service->setup_and_clean_menu('footer4');

$item_data = array(
    'menu-item-title' => "GitHub",
    'menu-item-url' => "https://github.com/Teplitsa/leyka",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "WordPress",
    'menu-item-url' => "https://ru.wordpress.org/plugins/leyka/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 10,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Условия использования",
    'menu-item-url' => "https://leyka.te-st.ru/sla/",
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 20,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

// $item_data = array(
//     'menu-item-title' => "",
//     'menu-item-url' => "",
//     'menu-item-status' => 'publish',
//     'menu-item-type' => 'custom',
//     'menu-item-position' => 0,
//     'menu-item-target' => '_blank',
// );
// wp_update_nav_menu_item($menu_id, 0, $item_data);
