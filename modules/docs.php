<?php

class LL_Docs_Service {
    static $post_type = 'document';
    static $category_tax = 'doc_cat';
    static $term_meta_order = 'll_doc_cat_order';
    static $docs_faq_slug = 'docs-faq';
    
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
        elseif ($cat === null) {
            $params['tax_query'] = array(
                array(
                    'taxonomy' => self::$category_tax,
                    'operator' => 'NOT EXISTS'
                ),
            );
        }
        
        $posts = get_posts($params);
        
        return $posts;
    }
    
    function get_categories($parent_cat = 0) {
        $docs_faq_term = get_term_by('slug', self::$docs_faq_slug, self::$category_tax);
        
        $terms = get_terms( self::$category_tax, array(
            'hide_empty' => true,
            'parent' => $parent_cat,
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_key' => LL_Docs_Service::$term_meta_order,
            'exclude' => array($docs_faq_term->term_id),
        ) ); 
        
        if(!$parent_cat) {
            // active category
            $other_term = new WP_Term(new stdClass());
            $other_term->name = get_theme_mod("other_documents_set_title");
            $other_term->id = null;
            $terms[] = $other_term;
            
            $terms[] = $docs_faq_term;
        }
        
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

    public static function category_order_metabox() {
        $prefix = 'll_doc_cat_order_';
        
        $cmb_term = new_cmb2_box( array(
            'id'               => $prefix . 'edit',
            'object_types'     => array( 'term' ),
            'taxonomies'       => array( LL_Docs_Service::$category_tax ),
            'new_term_section' => true,
        ) );
        
        $cmb_term->add_field( array(
            'name'     => esc_html__( 'Category order', 'll' ),
//             'description'     => '',
            'id'       => LL_Docs_Service::$term_meta_order,
            'type'     => 'text_small',
            'default'  => '',
            'on_front' => false,
        ) );
        
    }
    
    public static function register_cmb2_metabox() {
        $cmb2_box = new_cmb2_box( array(
            'id'            => 'll_doc_metabox',
            'title'         => esc_html__( 'Doc options', 'll' ),
            'object_types'  => array( LL_Docs_Service::$post_type ), // Post type
        ) );
        
        $cmb2_box->add_field( array(
            'name' => esc_html__( 'Learn more link title', 'll' ),
            'id'   => 'll_faq_learn_more_link_title',
            'type' => 'text',
        ) );
        
        $cmb2_box->add_field( array(
            'name' => esc_html__( 'Learn more link URL', 'll' ),
            'id'   => 'll_faq_learn_more_link_url',
            'type' => 'text',
        ) );
    }
    
    public static function insert_rewrite_rules(array $rules) {
        $rules = array(
            '^' . LL_Docs_Service::$docs_faq_slug . '/([^/]+)/?$' => 'index.php?pagename=docs-faq&ll_docs_faq_cat=$matches[1]',
        ) + $rules;
        
        return $rules;
    }
    
    public static function insert_rewrite_query_vars(array $vars) {
        array_push($vars, 'll_docs_faq_cat');
        return $vars;
    }
    
    public static function init_routing() {
        add_filter('rewrite_rules_array', 'LL_Docs_Hooks::insert_rewrite_rules');
        add_filter('query_vars', 'LL_Docs_Hooks::insert_rewrite_query_vars');
    }

} // class end

add_action('init', 'LL_Docs_Hooks::register_custom_taxonomy', 20);
add_action('init', 'LL_Docs_Hooks::register_post_type', 20);
add_action('init', 'LL_Docs_Hooks::init_routing', 20);

add_action( 'cmb2_admin_init', 'LL_Docs_Hooks::category_order_metabox' );
add_action( 'cmb2_admin_init', 'LL_Docs_Hooks::register_cmb2_metabox' );

// templates
class LL_Docs_Templates {
    
    function show_list($list) {
        ?>
    	<ul class="faq-list">
    		<?php foreach($list as $post):?>
    			<?php $this->show_list_item($post);?>
    		<?php endforeach;?>
    	</ul>
        <?php
    }
    
    function show_list_item($post) {
        $learn_more_link_url = get_post_meta($post->ID, 'll_faq_learn_more_link_url', true);
        $learn_more_link_title = get_post_meta($post->ID, 'll_faq_learn_more_link_title', true);
        ?>
        <a name="ask<?php echo $post->ID;?>"></a>
		<li>
			<h4><?php echo get_the_title($post);?></h4>
			<div class="answer">
				<?php echo apply_filters('the_content', get_post_field('post_content', $post));?>
				<?php if($learn_more_link_url && $learn_more_link_title):?>
    			<div class="link">
    				<a href="<?php echo $learn_more_link_url?>" target="_blank"><?php echo $learn_more_link_title;?><svg class="svg-icon"><use xlink:href="#icon-arrow-line-right" /></svg></a>
    			</div>
    			<?php endif;?>
			</div>
			<a href="#ask<?php echo $post->ID;?>" data-ask="ask<?php echo $post->ID;?>" id="expand-ask<?php echo $post->ID;?>" class="btn-expand"><svg class="faq-plus"><use xlink:href="#icon-faq-plus" /></svg><svg class="faq-minus"><use xlink:href="#icon-faq-minus" /></svg></a>
			<a href="#" class="btn-expand expand-sm"><svg><use xlink:href="#icon-galka-down" /></svg></a>
		</li>
		<?php
    }
    
}