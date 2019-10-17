<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

$setup_on_wp_url = add_query_arg(array('ll-set-steps-cat' => LL_Steps_Service::$main_steps_cat), get_the_permalink(ll_get_post('step-setup-on-wp', LL_Steps_Service::$post_type)));
$setup_on_tilda_url = add_query_arg(array('ll-set-steps-cat' => LL_Steps_Service::$tilda_site_cat), get_the_permalink(ll_get_post('step-setup-on-tilda-etc', LL_Steps_Service::$post_type)));
$setup_on_knd_url = add_query_arg(array('ll-set-steps-cat' => LL_Steps_Service::$no_site_cat), get_the_permalink(ll_get_post('step-setup-on-knd', LL_Steps_Service::$post_type)));

$capabilities_url = get_the_permalink(ll_get_post('capabilities', 'page'));
$orgs_url = get_the_permalink(ll_get_post('orgs', 'page'));
$prices_url = get_the_permalink(ll_get_post('prices', 'page'));
$itv_paseka_url = get_the_permalink(ll_get_post('itv-paseka', 'page'));
$faq_url = get_the_permalink(ll_get_post('faq', 'page'));
$docs_url = get_the_permalink(ll_get_post('sistemnye-trebovaniya', LL_Docs_Service::$post_type));

$menu_service = new LL_Menu_Service();

$menu_id = $menu_service->setup_and_clean_menu('primary');

$item_data = array(
    'menu-item-title' => "Для WordPress'a",
    'menu-item-url' => $setup_on_wp_url,
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Tilda, Wix и другое",
    'menu-item-url' => $setup_on_tilda_url,
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 10,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Помощь",
    'menu-item-url' => $faq_url,
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
    'menu-item-url' => $capabilities_url,
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Уже установили",
    'menu-item-url' => $orgs_url,
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 10,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Тарифы на услуги",
    'menu-item-url' => $prices_url,
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
    'menu-item-url' => $setup_on_wp_url,
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Для Tilda, Wix и другие платформы",
    'menu-item-url' => $setup_on_tilda_url,
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
    'menu-item-url' => $docs_url,
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 1,
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Помощь на «IT-волонтёр»",
    'menu-item-url' => $itv_paseka_url,
    'menu-item-status' => 'publish',
    'menu-item-type' => 'custom',
    'menu-item-position' => 10,
    'menu-item-target' => '_blank',
);
wp_update_nav_menu_item($menu_id, 0, $item_data);

$item_data = array(
    'menu-item-title' => "Сделать сайт на «Кандинском»",
    'menu-item-url' => $setup_on_knd_url,
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
