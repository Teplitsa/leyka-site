<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

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
        'post_title' => 'Константин Гришин', 
        'post_content' => 'Мне очень нравится, что я могу использовать Лейку, хотя у меня нет юридического лица. Это удобно. Спасибо разработчикам.',
        'post_excerpt' => 'Блогер',
        'thumbnail' => 'face1.jpg',
    ),
    array(
        'post_title' => 'Виктория Канароева',
        'post_content' => 'Нам очень нравится, что Лейка легко интегрируется с платежными системами. Всего лишь вводишь пару цифр из договора — и все работает. Замечательный продукт.',
        'post_excerpt' => 'Центр «Зеленая дверца»',
        'thumbnail' => 'face2.jpg',
    ),
);

foreach($post_list as $post) {
    $post['post_type'] = LL_Testimonials_Service::$post_type;
    $post['post_status'] = 'publish';
    
    $post_id = wp_insert_post($post);
    
    if(!empty($post['thumbnail'])) {
        $attachment_id = TST_Import::get_instance()->maybe_import_local_file( get_template_directory() . "/data/testimonials/" . $post['thumbnail'] );
        set_post_thumbnail($post_id, $attachment_id);
    }
}