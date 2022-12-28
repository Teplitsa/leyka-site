<?php

// core
class LL_Faq_Service {
    static $post_type = 'faq';
    static $category_tax = 'faq_cat';
    static $term_meta_order = 'll_faq_cat_order';
    
    function get_short_list( $num = 100 ) {
        $posts = get_posts( array(
            'post_type' => self::$post_type,
            'posts_per_page' => $num,
            'orderby' => array(
                'menu_order'  => 'ASC',
                'ID'     => 'DESC',
            ),
            'meta_query'    => array(
                array(
                    'll_faq_show_on_main_page' => array(
                        'key'       => 'll_faq_show_on_main_page',
                        'value' => 'on',
                    ),
                )
            ),
        ) );
        return $posts;
    }
    
    function get_all($cat = null) {
        $params = array(
            'post_type' => self::$post_type,
            'posts_per_page' => -1,
            'orderby' => array(
                'menu_order'  => 'ASC',
                'ID'     => 'DESC',
            ),
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

    function get_categories() {
        $terms = get_terms(array(
            'taxonomy' => self::$category_tax,
            'hide_empty' => true,
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key' => self::$term_meta_order,
                    'compare' => 'NOT EXISTS',
                ],
                [
                    'key' => self::$term_meta_order,
                    'compare' => 'EXISTS',
                ],
            ],
        ) );
        
        $terms[] = get_term_by('slug', 'other', self::$category_tax);
        
        return $terms;
    }
    
    // static methods
    public static function register_post_type() {
        
        register_post_type(self::$post_type, array(
            'labels' => array(
                'name'               => 'Вопросы',
                'singular_name'      => 'Вопрос',
                'menu_name'          => 'Вопросы',
                'name_admin_bar'     => 'Добавить вопрос',
                'add_new'            => 'Добавить новый',
                'add_new_item'       => 'Добавить вопрос',
                'new_item'           => 'Новый вопрос',
                'edit_item'          => 'Редактировать вопрос',
                'view_item'          => 'Просмотр вопросов',
                'all_items'          => 'Все вопросы',
                'search_items'       => 'Искать вопросы',
                'parent_item_colon'  => 'Родительский вопрос:',
                'not_found'          => 'Вопросы не найдены',
                'not_found_in_trash' => 'В Корзине вопросы не найдены'
            ),
            'public'              => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_nav_menus'   => false,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => false,
            'capability_type'     => 'post',
            'has_archive'         => false,
            'hierarchical'        => false,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-editor-help',
            'supports'            => array('title', 'editor', 'page-attributes','custom-fields'),
            'taxonomies'          => array(),
        ) );
        
    }
    
    public static function register_custom_taxonomy() {
        register_taxonomy(LL_Faq_Service::$category_tax, array(LL_Faq_Service::$post_type,), array(
            'labels' => array(
                'name'                       => 'Категории вопросов',
                'singular_name'              => 'Категория',
                'menu_name'                  => 'Категории вопросов',
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
            'id'            => 'll_faq_metabox',
            'title'         => esc_html__( 'Faq options', 'll' ),
            'object_types'  => array( self::$post_type ), // Post type
        ) );
        
        $cmb2_box->add_field( array(
            'name' => esc_html__( 'Show on main page', 'll' ),
            'id'   => 'll_faq_show_on_main_page',
            'type' => 'checkbox',
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
    
    public static function category_order_metabox() {
        $prefix = 'll_faq_cat_order_';
        
        $cmb_term = new_cmb2_box( array(
            'id'               => $prefix . 'edit',
            'object_types'     => array( 'term' ),
            'taxonomies'       => array( LL_Faq_Service::$category_tax ),
            'new_term_section' => true,
        ) );
        
        $cmb_term->add_field( array(
            'name'     => esc_html__( 'Category order', 'll' ),
            //             'description'     => '',
            'id'       => LL_Faq_Service::$term_meta_order,
            'type'     => 'text_small',
            'default'  => '',
            'on_front' => false,
        ) );
        
    }
    
} // class end

add_action('init', 'LL_Faq_Service::register_post_type', 20);
add_action('init', 'LL_Faq_Service::register_custom_taxonomy', 20);
add_action( 'cmb2_admin_init', 'LL_Faq_Service::register_cmb2_metabox' );
add_action( 'cmb2_admin_init', 'LL_Faq_Service::category_order_metabox' );

// templates
class LL_Faq_Templates {
    
    function show_faq_category_questions($category, $faq_service) {
        $category_id = null;
        if ( isset( $category->term_id ) ) {
            $category_id = $category->term_id;
            if ( isset( $category->slug ) && $category->slug == 'other' ) {
                $category_id = null;
            }
        }
        $faq_list = $faq_service->get_all($category_id);
        ?>
        <div class="faq-category">
        <?php if ( isset( $category->name ) ) { ?>
            <h2><?php echo esc_html( $category->name ); ?></h2>
        <?php } ?>
        <?php $this->show_list($faq_list);?>
        </div>
        <?php
    }
    
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
			<a href="#ask<?php echo $post->ID;?>" data-ask="ask<?php echo $post->ID;?>" id="expand-ask<?php echo $post->ID;?>" class="btn-expand"><svg><use xlink:href="#icon-galka-right" /></svg></a>
			<a href="#" class="btn-expand expand-sm"><svg><use xlink:href="#icon-galka-down" /></svg></a>
		</li>
		<?php
    }
    
}