<?php

class LL_Testimonials_Service {
    static $post_type = 'testimonial';
    
    function get_short_list( $num = 3 ) {
        $posts = get_posts( array(
            'post_type' => self::$post_type,
            'posts_per_page' => $num,
        ) );
        return $posts;
    }
    
} // class end

function ll_testimonials_custom_post_type() {
    
    register_post_type(LL_Testimonials_Service::$post_type, array(
        'labels' => array(
            'name'               => 'Отзывы',
            'singular_name'      => 'Отзыв',
            'menu_name'          => 'Отзывы',
            'name_admin_bar'     => 'Добавить отзыв',
            'add_new'            => 'Добавить новый',
            'add_new_item'       => 'Добавить отзыв',
            'new_item'           => 'Новый отзыв',
            'edit_item'          => 'Редактировать отзыв',
            'view_item'          => 'Просмотр отзывов',
            'all_items'          => 'Все отзывы',
            'search_items'       => 'Искать отзывы',
            'parent_item_colon'  => 'Родительский отзыв:',
            'not_found'          => 'Отзывы не найдены',
            'not_found_in_trash' => 'В Корзине отзывы не найдены'
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
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-quote',
        'supports'            => array('title', 'excerpt', 'editor', 'thumbnail'),
        'taxonomies'          => array(),
    ));
    
}
add_action('init', 'll_testimonials_custom_post_type', 20);