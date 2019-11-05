<?php

class LL_Steps_Service {
    static $post_type = 'step';
    static $category_tax = 'step_cat';
    
    static $main_steps_cat = 'main-steps';
    static $no_site_cat = 'no-site-steps';
    static $tilda_site_cat = 'tilda-steps';
    
    function get_category_steps($cat) {
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

    function get_next_category_step($current_step_post, $cat) {
        $steps = $this->get_category_steps($cat);
        $next_step = null;
        foreach($steps as $step) {
            if($next_step) {
                $next_step = $step;
                break;
            }
            elseif($step->ID == $current_step_post->ID) {
                $next_step = $step;
            }
        }
        
        if(!$next_step) {
            $next_step = $current_step_post;
        }
        
        return $next_step;
    }
    
    function get_prev_category_step($current_step_post, $cat) {
        $steps = $this->get_category_steps($cat);
        $prev_step = null;
        foreach($steps as $step) {
            if($step->ID == $current_step_post->ID) {
                break;
            }
            $prev_step = $step;
        }
        
        if(!$prev_step) {
            $prev_step = $current_step_post;
        }
        
        return $prev_step;
    }
    
    function get_category_first_step($cat) {
        $steps = $this->get_category_steps($cat);
        return !empty($steps) ? $steps[0] : null;
    }
    
    function get_current_category() {
        if(!session_id()) session_start();
        $cat = !empty($_SESSION['ll-set-steps-cat']) ? $_SESSION['ll-set-steps-cat'] : self::$main_steps_cat;
        return $cat;
    }
    
    function set_current_category($cat) {
        if(!session_id()) session_start();
        $_SESSION['ll-set-steps-cat'] = $cat;
    }
    
    function get_other_categories($cat) {
        $exclude_term = get_term_by('slug', $cat, self::$category_tax);
        $terms = get_terms( self::$category_tax, array(
            'hide_empty' => true,
            'exclude' => array( $exclude_term->term_id ),
        ) );
        return $terms;
    }
    
} // class end

class LL_Steps_Hooks {
    public static function register_post_type() {
        
        register_post_type(LL_Steps_Service::$post_type, array(
            'labels' => array(
                'name'               => 'Шаги',
                'singular_name'      => 'Шаг',
                'menu_name'          => 'Шаги',
                'name_admin_bar'     => 'Добавить шаг',
                'add_new'            => 'Добавить новый',
                'add_new_item'       => 'Добавить шаг',
                'new_item'           => 'Новый шаг',
                'edit_item'          => 'Редактировать шаг',
                'view_item'          => 'Просмотр шага',
                'all_items'          => 'Все шаги',
                'search_items'       => 'Искать шаги',
                'parent_item_colon'  => 'Родительский шаг:',
                'not_found'          => 'Шаги не найдены',
                'not_found_in_trash' => 'В Корзине шаги не найдены'
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
            'menu_icon'           => 'dashicons-rest-api',
            'supports'            => array('title', 'excerpt', 'editor', 'page-attributes'),
            'taxonomies'          => array(LL_Steps_Service::$category_tax),
        ));
        
    }
    
    public static function register_custom_taxonomy() {
        register_taxonomy(LL_Steps_Service::$category_tax, array(LL_Steps_Service::$post_type,), array(
            'labels' => array(
                'name'                       => 'Категории шагов',
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
    
    public static function setup_steps_cat() {
        global $post;
        
        if(!$post) {
            return;
        }
        
        $steps_service = new LL_Steps_Service();
        $steps_category_switcher = array(
            'step-setup-on-wp' => LL_Steps_Service::$main_steps_cat,
            'step-setup-on-knd' => LL_Steps_Service::$no_site_cat,
            'step-setup-on-tilda-etc' => LL_Steps_Service::$tilda_site_cat,
        );
        foreach($steps_category_switcher as $page_slug => $category_slug) {
            if(is_singular( LL_Steps_Service::$post_type ) && $post->post_name == $page_slug) {
                $steps_service->set_current_category($category_slug);
            }
        }
    }
    
} // class end

add_action('init', 'LL_Steps_Hooks::register_custom_taxonomy', 20);
add_action('init', 'LL_Steps_Hooks::register_post_type', 20);
add_action('wp', 'LL_Steps_Hooks::setup_steps_cat', 20);