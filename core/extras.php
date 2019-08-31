<?php

add_filter( 'body_class', 'lkl_body_classes' );
function lkl_body_classes( $classes ) {
    if ( is_page() ) {
        $qo = get_queried_object();
        $classes[] = 'slug-' . $qo->post_name;
    }
    
    $classes[] = 'leyka-landing';
    
    return $classes;
}
