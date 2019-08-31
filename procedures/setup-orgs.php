<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'procedures-common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

// add fitler tag
$fundraising_advices_tag = array('slug' => LL_FUNDRAIZING_ADVICES_SLUG, 'name' => "Советы фандрайзинга");
$term = get_term_by( 'slug', $fundraising_advices_tag['slug'], 'post_tag' );
if($term === false) {
    wp_insert_term( $fundraising_advices_tag['name'], 'post_tag', $fundraising_advices_tag );
}

$post_list = array(
    array(
        'post_title' => 'Агентство Социальной Информации', 
        'thumbnail' => 'org-logo-001.png',
        'menu_order' => 1,
    ),
    array(
        'post_title' => 'Центр равных возможностей для детей-сирот «Вверх»',
        'thumbnail' => 'org-logo-002.png',
        'menu_order' => 2,
    ),
    array(
        'post_title' => 'РООИ «Перспектива»',
        'thumbnail' => 'org-logo-006.png',
        'menu_order' => 3,
    ),
    array(
        'post_title' => 'Фонд помощи взрослым «Живой»',
        'thumbnail' => 'org-logo-005.png',
        'menu_order' => 4,
    ),
    array(
        'post_title' => 'Wikimedia',
        'thumbnail' => 'org-logo-004.png',
        'menu_order' => 5,
    ),
    array(
        'post_title' => 'Агентство Социальной Информации',
        'thumbnail' => 'org-logo-001.png',
        'menu_order' => 6,
    ),
    array(
        'post_title' => 'Wikimedia',
        'thumbnail' => 'org-logo-004.png',
        'menu_order' => 7,
    ),
    array(
        'post_title' => 'Комитет «Гражданское содействие»',
        'thumbnail' => 'org-logo-003.png',
        'menu_order' => 8,
    ),
    array(
        'post_title' => 'Агентство Социальной Информации',
        'thumbnail' => 'org-logo-001.png',
        'menu_order' => 9,
    ),
    array(
        'post_title' => 'Центр равных возможностей для детей-сирот «Вверх»',
        'thumbnail' => 'org-logo-002.png',
        'menu_order' => 10,
    ),
    array(
        'post_title' => 'Фонд помощи взрослым «Живой»',
        'thumbnail' => 'org-logo-005.png',
        'menu_order' => 11,
    ),
);

foreach($post_list as $post) {
    $post['post_type'] = LL_Orgs_Service::$post_type;
    $post['post_status'] = 'publish';
    
    $post_id = wp_insert_post($post);
    
    if(!empty($post['thumbnail'])) {
        $attachment_id = TST_Import::get_instance()->maybe_import_local_file( get_template_directory() . "/data/orgs/" . $post['thumbnail'] );
        set_post_thumbnail($post_id, $attachment_id);
    }
}