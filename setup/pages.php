<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

$prices_url = get_the_permalink(ll_get_post('prices', 'page'));

//page
$posts_data = array(
//     array(
//         'post_title' => 'SLA',
//         'post_name' => 'sla',
//         'post_excerpt' => '',
//         'post_content' => '',
//         'meta' => array('ll_page_super_title' => 'Лейка'),
//     ),
);
LL_Setup_Utils::setup_posts_data($posts_data, 'page');

// sla
$post = ll_get_post('sla', 'page');
update_post_meta($post->ID, 'll_page_super_title', 'Лейка');

// supprt
$post = ll_get_post('support', 'page');
update_post_meta($post->ID, 'll_page_super_title', 'Поддержка');
$post_data = array(
    'ID' => $post->ID,
    'post_title' => 'Напишите нам',
    'post_content' => str_replace("<strong>услуги по внедрению и разработке нового функционала</strong>", "<a href=\"" . $prices_url . "\">услуги по внедрению и разработке нового функционала</a>", $post->post_content),
);
wp_update_post($post_data);

