<?php

class LL_News_Service {
    const CATEGORY_KIND_META_NAME = 'll_news_category_kind';
    const CATEGORY_KIND_META_VALUE_HOT = 'hot';

	function get_short_list( $num = 3 ) {
		$posts = get_posts( array( 
		    'post_type' => 'post', 
		    'posts_per_page' => $num,
		    'tax_query' => array(
		        array(
		            'taxonomy' => 'post_tag',
		            'field' => 'slug',
		            'terms' => LL_FUNDRAIZING_ADVICES_SLUG,
		            'operator' => 'NOT IN',
		        ),
		    ),
		) );
		return $posts;
	}

	function get_short_fundraising_advices_list( $num = 3 ) {
	    $posts = get_posts( array(
	        'post_type' => 'post',
	        'posts_per_page' => $num,
	        'tax_query' => array(
	            array(
	                'taxonomy' => 'post_tag',
	                'field' => 'slug',
	                'terms' => LL_FUNDRAIZING_ADVICES_SLUG,
	                'operator' => 'IN',
	            ),
	        ),
	    ) );
	    return $posts;
	}

	function get_news_category($newsPost) {
	    $categories = wp_get_post_terms( $newsPost->ID, 'category' );
	    return count($categories) ? $categories[0] : NULL;
	}
	
	function get_news_category_kind($category) {
	    return get_term_meta($category->term_id, LL_News_Service::CATEGORY_KIND_META_NAME, true);
	}
	
} // class end


function ll_category_kind_metabox() {
    $prefix = 'll_news_category_';
    
    $cmb_term = new_cmb2_box( array(
        'id'               => $prefix . 'edit',
        'object_types'     => array( 'term' ),
        'taxonomies'       => array( 'category' ),
        'new_term_section' => true,
    ) );
    
    $cmb_term->add_field( array(
        'name'     => esc_html__( 'Category kind', 'll' ),
        'description'     => esc_html__( 'Hot will be highlighted on home page', 'll' ),
        'id'       => $prefix . 'kind',
        'type'     => 'select',
        'default'  => '',
        'options'  => array(
            ''    => esc_html__('Usual', 'll'),
            'hot' => esc_html__('Hot', 'll'),
        ),
        'on_front' => false,
    ) );
    
}
add_action( 'cmb2_admin_init', 'll_category_kind_metabox' );
