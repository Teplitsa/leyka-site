<?php

$docs_service = new LL_Docs_Service();
$categories = $docs_service->get_categories();
$docs_faq_page = ll_get_post(LL_Docs_Service::$docs_faq_slug, 'page');
$docs_faq_term_slug = get_query_var('ll_docs_faq_cat');

if(is_search()) {
    $page_permalink = '';
}
else {
    $page_permalink = get_the_permalink();
}

foreach($categories as $term){
    if($term->slug == LL_Docs_Service::$docs_faq_slug) {
        $docs = $docs_service->get_categories($term->term_id);
    }
    else {
        $docs = $docs_service->get_category_docs($term->term_id);
    }
    
    $term->is_active = false;
    $term->docs = $docs;
	foreach($docs as $post_item) {
	    if($term->slug == LL_Docs_Service::$docs_faq_slug) {
	        if($docs_faq_term_slug) {
	            $term->is_active = true;
	        }
        }
        else {
            if(get_the_permalink($post_item) == $page_permalink) {
                $term->is_active = true;
            }
        }
    }
}

?>

<div class="docs-useful-links">
	<a href="<?php echo get_theme_mod('ll_label_docs_page_sidebar_useful_link1_url')?>"><?php echo get_theme_mod('ll_label_docs_page_sidebar_useful_link1_title')?></a>
	<a href="<?php echo get_theme_mod('ll_label_docs_page_sidebar_useful_link2_url')?>"><?php echo get_theme_mod('ll_label_docs_page_sidebar_useful_link2_title')?></a>
</div>

<?php get_template_part( 'template-parts/document-search-form' );?>

<div class="docs-categories-mobile-toggle-wrapper">
    <a href="javascript:void(0);" class="docs-categories-mobile-toggle"><svg class="svg-icon"><use xlink:href="#icon-arrow-ios-right" /></svg><span>Содержание раздела</span></a>
</div>

<div class="docs-categories">
	<?php foreach($categories as $term){?>
	<div class="docs-category <?php if($term->is_active){?>active<?php }?>">
		<h4><svg class="svg-icon icon-doc-cat-arrow arrow-right"><use xlink:href="#icon-arrow-micro-right" /></svg><svg class="svg-icon icon-doc-cat-arrow arrow-down"><use xlink:href="#icon-arrow-micro-down" /></svg><?php echo $term->name?></h4>
		<div class="category-docs">
		<?php foreach($term->docs as $post_item){?>
			<?php if($post_item->term_id) {?>
			<a href="<?php echo get_the_permalink($docs_faq_page);?><?php echo $post_item->slug;?>/" class="<?php if($post_item->slug == $docs_faq_term_slug){?>active<?php }?>"><?php echo $post_item->name;?></a>
			<?php } else {?>
			<a href="<?php echo get_the_permalink($post_item);?>" class="<?php if(get_the_permalink($post_item) == $page_permalink){?>active<?php }?>"><?php echo get_the_title($post_item);?></a>
			<?php }?>
		<?php }?>
		</div>
	</div>
	<?php }?>
	
</div>
