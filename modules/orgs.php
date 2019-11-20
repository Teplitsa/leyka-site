<?php

class LL_Orgs_Service {
    static $post_type = 'org';
    static $category_tax = 'org_cat';
    static $meta_org_approved = 'll_org_approved';
    static $per_page = 5;
    
    function get_short_list( $num = 11, $org_cat = null ) {
        $posts = get_posts( array(
            'post_type' => self::$post_type,
            'posts_per_page' => $num,
            'orderby' => 'menu_order post_date',
            'order' => 'ASC DESC',
            'meta_query'    => array(
                array(
                    'll_org_approved' => array(
                        'key'       => 'll_org_approved',
                        'value' => 'on',
                    ),
                )
            ),
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
            'orderby' => 'menu_order post_date',
            'order' => 'ASC DESC',
            'meta_query'    => array(
                array(
                    'll_org_approved' => array(
                        'key'       => 'll_org_approved',
                        'value' => 'on',
                    ),
                )
            ),
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
        $url = get_the_excerpt($post);
        ?>
		<div class="ll-org">
			<a class="org-logo" href="<?php echo $url;?>" target="_blank"><img alt="<?php echo $title;?>" title="<?php echo $title;?>" src="<?php echo get_the_post_thumbnail_url( $post, 'medium' );?>" /></a>
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
            'supports'            => array('title', 'excerpt', 'thumbnail', 'page-attributes'),
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
    
    public static function register_cmb2_metabox() {
        $cmb2_box = new_cmb2_box( array(
            'id'            => 'll_org_metabox',
            'title'         => esc_html__( 'Organization options', 'll' ),
            'object_types'  => array( LL_Orgs_Service::$post_type ),
        ) );
        
        $cmb2_box->add_field( array(
            'name' => esc_html__( 'Approved', 'll' ),
            'id'   => LL_Orgs_Service::$meta_org_approved,
            'type' => 'checkbox',
        ) );
        
    }
    
    public static function load_orgs() {
        $orgs_service = new LL_Orgs_Service();
        $orgs_templates = new LL_Orgs_Templates();
        
        $page = $_REQUEST['page'];
        $category_id = !empty($_REQUEST['category_id']) ? (int)$_REQUEST['category_id'] : null;
        
        foreach($orgs_service->get_page_list(0, $page, $category_id) as $post) {
			$orgs_templates->show_list_item($post);
		}
		wp_die();
    }
    
    public static function submit_org() {
        $submit_status = 'error';
        $message = 'll_message_org_submitted_error';
        $is_error = false;
        
        if(empty($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'll_submit_org')) {
            $is_error = true;
        }
        
        if(!$is_error) {
            $org_params = array(
                'post_title' => sanitize_text_field($_POST['title']),
                'post_content' => sanitize_text_field($_POST['description']),
                'post_excerpt' => esc_url_raw($_POST['url']),
                'menu_order' => 100,
            );
            
            $org_params['post_type'] = LL_Orgs_Service::$post_type;
            $org_params['post_status'] = 'publish';
            $post_id = wp_insert_post($org_params);
            
            update_post_meta($post_id, LL_Orgs_Service::$meta_org_approved, '');
            
            if(!empty($_POST['org_category'])) {
                wp_set_object_terms( $post_id, (int)$_POST['org_category'], LL_Orgs_Service::$category_tax, true );
            }
            
            $uploadedfile = $_FILES['logo'];
            if($uploadedfile) {
                $upload_overrides = array( 'test_form' => false );
                $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
                
                if ( $movefile && !isset( $movefile['error'] ) ) {
                    $attachment_id = TST_Import::get_instance()->maybe_import_local_file( $movefile['file'] );
                    set_post_thumbnail($post_id, $attachment_id);
                } else {
                    $message = $movefile['error'];
                }
            }
            
            $org_params['edit_url'] = admin_url('/post.php?post='.$post_id.'&action=edit');
            
            $email_body = preg_replace_callback("/\{(\w*?)\}/", function($match) use ($org_params) {
                return !empty($org_params[$match[1]]) ? $org_params[$match[1]] : "";
            }, get_theme_mod('ll_message_org_submitted_email_body'));
                
            $email_subject = get_theme_mod('ll_message_org_submitted_email_subject');
                
            wp_mail(get_option('admin_email'), $email_subject, $email_body);
            
            $submit_status = 'success';
            $message = 'll_message_org_submitted_ok';
        }
        
        $post = ll_get_post('orgs', 'page');
        $redirect_url = get_the_permalink($post);
        wp_redirect(add_query_arg( array('submit_status' => $submit_status, 'submit_message' => $message), $redirect_url));
    }
    
} // class end

add_action('init', 'LL_Orgs_Hooks::register_custom_taxonomy', 20);
add_action('init', 'LL_Orgs_Hooks::register_post_type', 20);
add_action( 'cmb2_admin_init', 'LL_Orgs_Hooks::register_cmb2_metabox' );

add_action('wp_ajax_ll_load_orgs', 'LL_Orgs_Hooks::load_orgs');
add_action('wp_ajax_nopriv_ll_load_orgs', 'LL_Orgs_Hooks::load_orgs');

add_action('admin_post_ll_submit_org', 'LL_Orgs_Hooks::submit_org');
add_action('admin_post_nopriv_ll_submit_org', 'LL_Orgs_Hooks::submit_org');
