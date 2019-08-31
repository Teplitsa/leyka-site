<?php

class LL_Orgs_Service {
    static $post_type = 'org';
    
    function get_short_list( $num = 11 ) {
        $posts = get_posts( array(
            'post_type' => self::$post_type,
            'posts_per_page' => $num,
            'orderby' => 'menu_order',
            'order' => 'ASC', 
        ) );
        return $posts;
    }
    
} // class end

function ll_orgs_custom_post_type() {
    
    register_post_type(LL_Orgs_Service::$post_type, array(
        'labels' => array(
            'name'               => 'Организации',
            'singular_name'      => 'Организация',
            'menu_name'          => 'Организации',
            'name_admin_bar'     => 'Добавить организация',
            'add_new'            => 'Добавить новый',
            'add_new_item'       => 'Добавить организация',
            'new_item'           => 'Новый организация',
            'edit_item'          => 'Редактировать организация',
            'view_item'          => 'Просмотр организаций',
            'all_items'          => 'Все организации',
            'search_items'       => 'Искать организации',
            'parent_item_colon'  => 'Родительский организация:',
            'not_found'          => 'Организации не найдены',
            'not_found_in_trash' => 'В Корзине организации не найдены'
        ),
        'public'              => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => false,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => false,
        'capability_type'     => 'post',
        'has_archive'         => false,
        //'rewrite'             => array('slug' => 'project', 'with_front' => false),
        'hierarchical'        => false,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-building',
        'supports'            => array('title', 'thumbnail', 'page-attributes'),
        'taxonomies'          => array(),
    ));
    
}
add_action('init', 'll_orgs_custom_post_type', 20);