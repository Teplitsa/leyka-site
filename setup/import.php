<?php

// docs

$posts = get_posts( array(
    'post_type' => LL_Docs_Service::$post_type,
    'posts_per_page' => -1,
) );

foreach($posts as $post) {
    
}