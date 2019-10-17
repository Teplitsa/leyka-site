<?php

add_filter( 'body_class', 'll_body_classes' );
function ll_body_classes( $classes ) {
    if ( is_page() ) {
        $qo = get_queried_object();
        $classes[] = 'slug-' . $qo->post_name;
    }
    
    $classes[] = 'leyka-landing';
    
    return $classes;
}

add_action( 'init', 'll_add_excerpts_to_pages' );
function ll_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}

add_shortcode( 'su_note', '__return_false' );

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );