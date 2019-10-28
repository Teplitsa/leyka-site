<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

$itv_logo_id = TST_Import::get_instance()->maybe_import_local_file( get_template_directory() . "/data/logo/logo-itv.png" );
$itv_logo_url = wp_get_attachment_url($itv_logo_id);

$paseka_logo_id = TST_Import::get_instance()->maybe_import_local_file( get_template_directory() . "/data/logo/logo-paseka.png" );
$paseka_logo_url = wp_get_attachment_url($paseka_logo_id);

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
