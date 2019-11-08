<?php

// core
class LL_Capability_Service {
    public static $number = 6;
    static $post_type = 'capability';
    static $category_tax = 'capability_cat';
    static $main_capabilites_cat = 'main-capabilities';
    static $new_capabilites_cat = 'new-capabilities';
    static $meta_capability_link_url = 'll_capability_link_url';
    static $meta_capability_link_title = 'll_capability_link_title';
    
    function get_capabilities($cat) {
        $params = array(
            'post_type' => self::$post_type,
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        
        if($cat) {
            $params['tax_query'] = array(
                array(
                    'taxonomy' => self::$category_tax,
                    'field' => 'slug',
                    'terms' => $cat,
                ),
            );
        }
        
        $posts = get_posts($params);
        
        return $posts;
    }
    
} // class end

class LL_Capability_Hooks {
    public static function register_post_type() {
        
        register_post_type(LL_Capability_Service::$post_type, array(
            'labels' => array(
                'name'               => 'Возможности',
                'singular_name'      => 'Возможность',
                'menu_name'          => 'Возможности',
                'name_admin_bar'     => 'Добавить возможность',
                'add_new'            => 'Добавить новую',
                'add_new_item'       => 'Добавить возможность',
                'new_item'           => 'Новая возможность',
                'edit_item'          => 'Редактировать возможность',
                'view_item'          => 'Просмотр возможности',
                'all_items'          => 'Все возможности',
                'search_items'       => 'Искать возможности',
                'parent_item_colon'  => 'Родительский шаг:',
                'not_found'          => 'Возможности не найдены',
                'not_found_in_trash' => 'В Корзине возможности не найдены'
            ),
            'public'              => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_nav_menus'   => false,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'capability_type'     => 'post',
            'has_archive'         => true,
            'rewrite'             => array('slug' => 'step', 'with_front' => false),
            'hierarchical'        => false,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-analytics',
            'supports'            => array('title', 'excerpt', 'editor', 'page-attributes', 'thumbnail'),
            'taxonomies'          => array(LL_Capability_Service::$category_tax),
        ));
    }
    
    public static function register_custom_taxonomy() {
        register_taxonomy(LL_Capability_Service::$category_tax, array(LL_Capability_Service::$post_type,), array(
            'labels' => array(
                'name'                       => 'Категории воможностей',
                'singular_name'              => 'Категория',
                'menu_name'                  => 'Категории возможностей',
                'all_items'                  => 'Все категории',
                'edit_item'                  => 'Редактировать категорию',
                'view_item'                  => 'Просмотреть',
                'update_item'                => 'Обновить категорию',
                'add_new_item'               => 'Добавить новую категорию',
                'new_item_name'              => 'Название новой категории',
                'parent_item'                => 'Родительская категория',
                'parent_item_colon'          => 'Родительская категория:',
                'search_items'               => 'Искать категории',
                'popular_items'              => 'Часто используемые',
                'separate_items_with_commas' => 'Разделять запятыми',
                'add_or_remove_items'        => 'Добавить или удалить категории',
                'choose_from_most_used'      => 'Выбрать из часто используемых',
                'not_found'                  => 'Не найдено'
            ),
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'query_var'         => true,
        ));
    }
    
    public static function register_cmb2_metabox() {
        $cmb2_box = new_cmb2_box( array(
            'id'            => 'll_capability_metabox',
            'title'         => esc_html__( 'Capability options', 'll' ),
            'object_types'  => array( LL_Capability_Service::$post_type ),
        ) );
        
        $cmb2_box->add_field( array(
            'name' => esc_html__( 'Learn more URL', 'll' ),
            'id'   => LL_Capability_Service::$meta_capability_link_url,
            'type' => 'text',
        ) );

        $cmb2_box->add_field( array(
            'name' => esc_html__( 'Learn more link title', 'll' ),
            'id'   => LL_Capability_Service::$meta_capability_link_title,
            'type' => 'text',
        ) );
        
    }
    
}

add_action('init', 'LL_Capability_Hooks::register_custom_taxonomy', 20);
add_action('init', 'LL_Capability_Hooks::register_post_type', 20);
add_action( 'cmb2_admin_init', 'LL_Capability_Hooks::register_cmb2_metabox' );
