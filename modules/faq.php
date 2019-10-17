<?php

// core
class LL_Faq_Service {
    static $post_type = 'faq';
    
    function get_short_list( $num = 4 ) {
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
    
    function get_all() {
        $posts = get_posts( array(
            'post_type' => self::$post_type,
            'posts_per_page' => -1,
            'orderby' => array(
                'menu_order'  => 'ASC',
                'ID'     => 'DESC',
            )
        ) );
        return $posts;
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
            'supports'            => array('title', 'editor'),
            'taxonomies'          => array(),
        ) );
        
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
    
} // class end

add_action('init', 'LL_Faq_Service::register_post_type', 20);
add_action( 'cmb2_admin_init', 'LL_Faq_Service::register_cmb2_metabox' );

// templates
class LL_Faq_Templates {
    
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
			<a href="#" class="btn-expand"><svg><use xlink:href="#icon-galka-right" /></svg></a>
			<a href="#" class="btn-expand expand-sm"><svg><use xlink:href="#icon-galka-down" /></svg></a>
		</li>
		<?php
    }
    
}