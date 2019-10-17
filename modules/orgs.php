<?php

class LL_Orgs_Service {
    static $post_type = 'org';
    static $category_tax = 'org_cat';
    static $per_page = 5;
    
    function get_short_list( $num = 11, $org_cat = null ) {
        $posts = get_posts( array(
            'post_type' => self::$post_type,
            'posts_per_page' => $num,
            'orderby' => 'menu_order',
            'order' => 'ASC', 
        ) );
        return $posts;
    }

    function get_page_list( $per_page = 0, $page = 1, $org_cat = null ) {
        if(!$per_page) {
            $per_page = LL_Orgs_Service::$per_page;
        }
        
        $params = array(
            'post_type' => self::$post_type,
            'posts_per_page' => $per_page,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        
        if($page > 1) {
            $params['offset'] = ($page - 1) * $per_page;
        }
        
        if($org_cat) {
            $params['tax_query'] = array(
                array(
                    'taxonomy' => self::$category_tax,
                    'field' => 'id',
                    'terms' => $org_cat,
                ),
            );
        }
        
        $posts = get_posts($params);
        
        return $posts;
    }    
    
    function get_categories( $num = 11, $org_cat = null ) {
        $terms = get_terms( self::$category_tax, array(
            'hide_empty' => false,
        ) );
        return $terms;
    }
    
} // class end

class LL_Orgs_Templates {
    
    function show_list_item($post) {
        $title = get_the_title($post);
        ?>
		<div class="ll-org">
			<div class="org-logo"><img alt="<?php echo $title;?>" title="<?php echo $title;?>" src="<?php echo get_the_post_thumbnail_url( $post, 'thumbnail' );?>" /></div>
		</div>
        <?php
    }
} // class end

class LL_Orgs_Hooks {
    public static function register_post_type() {
        
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
    
    public static function register_custom_taxonomy() {
        register_taxonomy(LL_Orgs_Service::$category_tax, array(LL_Orgs_Service::$post_type,), array(
            'labels' => array(
                'name'                       => 'Категории организаций',
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
    
    public static function load_more_orgs() {
        $orgs_service = new LL_Orgs_Service();
        $orgs_templates = new LL_Orgs_Templates();
        foreach($orgs_service->get_page_list(0, $_REQUEST['paged']) as $post) {
			$orgs_templates->show_list_item($post);
		}
		wp_die();
    }
} // class end

add_action('init', 'LL_Orgs_Hooks::register_custom_taxonomy', 20);
add_action('init', 'LL_Orgs_Hooks::register_post_type', 20);

add_action('wp_ajax_ll_load_more_orgs', 'LL_Orgs_Hooks::load_more_orgs');
add_action('wp_ajax_nopriv_ll_load_more_orgs', 'LL_Orgs_Hooks::load_more_orgs');
