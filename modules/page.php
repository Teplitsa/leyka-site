<?php

class LL_Page_Service {
    static $post_type = 'faq';
    
    public static function register_cmb2_metabox() {
        $cmb2_box = new_cmb2_box( array(
            'id'            => 'll_page_options_metabox',
            'title'         => esc_html__( 'Page options', 'll' ),
            'object_types'  => array( self::$post_type ), // Post type
        ) );
        
        $cmb2_box->add_field( array(
            'name' => esc_html__( 'Page super title', 'll' ),
            'id'   => 'll_page_super_title',
            'type' => 'text',
        ) );
    }
    
} // class end

add_action( 'cmb2_admin_init', 'LL_Page_Service::register_cmb2_metabox' );


// templates
class LL_Page_Templates {
    
    function show_header($post) {
        $super_title = get_post_meta($post->ID, 'll_page_super_title', true);
        ?>
        
        <div class="ll-page-header">
            <span class="ll-supheader"><?php echo $super_title;?></span>        
            <h1 class="ll-header"><?php echo get_the_title($post);?></h1>
            
            <?php if(trim($post->post_excerpt)):?>
        	<div class="ll-subheader"><?php echo nl2br(get_the_excerpt($post));?></div>
            <?php endif;?>
        </div>
        
        <?php
    }
    
}