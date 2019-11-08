<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

$prices_url = get_the_permalink(ll_get_post('prices', 'page'));

//page
$posts_data = array(
    array(
        'post_title' => 'Демо-зона',
        'post_name' => 'demo-zone',
        'post_excerpt' => '',
        'post_content' => '',
        'meta' => array('ll_page_super_title' => 'Лейка'),
    ),
);
LL_Setup_Utils::setup_posts_data($posts_data, 'page');

ll_set_theme_mod_safe('ll_label_demo_want_to_see', "Хотите увидеть как это работает?");
ll_set_theme_mod_safe('ll_label_demo_watch_demo', "Посмотрите нашу демо-зону");
ll_set_theme_mod_safe('ll_label_demo_access', "Демо-доступ");
