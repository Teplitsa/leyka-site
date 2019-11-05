<?php
require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

$content_cleaner = new LL_Old_Content_Cleaner();

// clean docs
$posts = get_posts( array(
    'post_type' => LL_Docs_Service::$post_type,
    'posts_per_page' => -1,
) );

foreach($posts as $post) {
    $post_data = array(
        'ID' => $post->ID,
        'post_content' => $content_cleaner->clean_content($post->post_content),
    );
    wp_update_post($post);
}

// clean pages
$posts = get_posts( array(
    'post_type' => 'page',
//     'include'   => array(3016),
    'posts_per_page' => -1,
) );

foreach($posts as $post) {
    $post_data = array(
        'ID' => $post->ID,
        'post_content' => $content_cleaner->clean_content($post->post_content),
    );
    wp_update_post($post_data);
}

// clean posts
$posts = get_posts( array(
    'post_type' => 'post',
    'posts_per_page' => -1,
) );

foreach($posts as $post) {
    $post_data = array(
        'ID' => $post->ID,
        'post_content' => $content_cleaner->clean_content($post->post_content),
    );
    wp_update_post($post);
}