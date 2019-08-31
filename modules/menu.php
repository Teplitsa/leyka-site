<?php

class LL_Menu_Service {

    function setup_and_clean_menu($menu_name) {
        $menu_object = wp_get_nav_menu_object( $menu_name );
        if($menu_object) {
            $menu_id = $menu_object->term_id;
        }
        else {
            $menu_id = wp_create_nav_menu( $menu_name );
        }
        
        $items = wp_get_nav_menu_items( $menu_id );
        if($items) {
            foreach($items as $item) {
                wp_delete_post( $item->ID, true );
            }
        }
        
        return $menu_id;
    }
    
    function custom_nav_menu_item( $title, $url, $order, $parent = 0, $target = '' ){
        $item = new stdClass();
        $item->ID = -1000000 - $order;
        $item->db_id = $item->ID;
        $item->title = $title;
        $item->url = $url;
        $item->menu_order = $order;
        $item->menu_item_parent = $parent;
        $item->type = '';
        $item->object = '';
        $item->object_id = '';
        $item->classes = array();
        $item->target = $target;
        $item->attr_title = '';
        $item->description = '';
        $item->xfn = '';
        $item->status = '';
        return $item;
    }
}

function ll_custom_nav_menu_items( $items, $menu ){
    $menu_service = new LL_Menu_Service();
    
    if ( $menu->slug == 'primary' ){
        $items[] = $menu_service->custom_nav_menu_item( get_theme_mod('ll_label_install_leyka_caption'), get_theme_mod('ll_install_leyka_url'), 1000, 0, "_blank" );
    }
    
    return $items;
}
add_filter( 'wp_get_nav_menu_items', 'll_custom_nav_menu_items', 20, 2 );