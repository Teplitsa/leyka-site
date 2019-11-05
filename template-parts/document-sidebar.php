<?php

$docs_service = new LL_Docs_Service();
$categories = $docs_service->get_categories();

if(is_search()) {
    $page_permalink = '';
}
else {
    $page_permalink = get_the_permalink();
}

// active category
$other_term = new WP_Term(new stdClass());
$other_term->name = get_theme_mod("other_documents_set_title");
$other_term->id = null;
$categories[] = $other_term;

foreach($categories as $term){
    $docs = $docs_service->get_category_docs($term->term_id);
    $term->is_active = false;
    $term->docs = $docs;
	foreach($docs as $post_item) {
	   if(get_the_permalink($post_item) == $page_permalink) {
	       $term->is_active = true;
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
		<h4><?php echo $term->name?></h4>
		<div class="category-docs">
		<?php foreach($term->docs as $post_item){?>
			<a href="<?php echo get_the_permalink($post_item);?>" class="<?php if(get_the_permalink($post_item) == $page_permalink){?>active<?php }?>"><?php echo get_the_title($post_item);?></a>
		<?php }?>
		</div>
	</div>
	<?php }?>
	
</div>
