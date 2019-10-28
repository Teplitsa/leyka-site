<?php

class LL_Docs_Service {
    static $post_type = 'document';
    static $category_tax = 'doc_cat';
    
    function get_category_docs( $cat ) {
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
                    'field' => 'id',
                    'terms' => $cat,
                ),
            );
        }
        
        $posts = get_posts($params);
        
        return $posts;
    }
    
    function get_categories() {
        $terms = get_terms( self::$category_tax, array(
            'hide_empty' => true,
        ) );
        return $terms;
    }
    
} // class end

class LL_Docs_Hooks {
    public static function register_post_type() {
        
        register_post_type(LL_Docs_Service::$post_type, array(
            'labels' => array(
                'name'               => 'Документация',
                'singular_name'      => 'Документация',
                'menu_name'          => 'Документация',
                'name_admin_bar'     => 'Добавить документ',
                'add_new'            => 'Добавить новый',
                'add_new_item'       => 'Добавить документ',
                'new_item'           => 'Новый документ',
                'edit_item'          => 'Редактировать документ',
                'view_item'          => 'Просмотр документации',
                'all_items'          => 'Вся документация',
                'search_items'       => 'Искать документацию',
                'parent_item_colon'  => 'Родительский документ:',
                'not_found'          => 'Документы не найдены',
                'not_found_in_trash' => 'В Корзине документы не найдены'
            ),
            'public'              => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_nav_menus'   => false,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'capability_type'     => 'post',
            'has_archive'         => true,
            'rewrite'             => array('slug' => 'docs', 'with_front' => false),
            'hierarchical'        => false,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-admin-post',
            'supports'            => array('title', 'editor', 'page-attributes'),
            'taxonomies'          => array(LL_Docs_Service::$category_tax),
        ));
        
    }
    
    public static function register_custom_taxonomy() {
        register_taxonomy(LL_Docs_Service::$category_tax, array(LL_Docs_Service::$post_type,), array(
            'labels' => array(
                'name'                       => 'Категории документов',
                'singular_name'              => 'Категория',
                'menu_name'                  => 'Категории',
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
            //             'rewrite'           => array('slug' => 'org_category', 'with_front' => false),
        ));
    }
    
} // class end

add_action('init', 'LL_Docs_Hooks::register_custom_taxonomy', 20);
add_action('init', 'LL_Docs_Hooks::register_post_type', 20);