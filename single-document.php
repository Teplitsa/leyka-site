<?php
/**
 * The main template file.
 */

$page_templates = new LL_Page_Templates();

$page_title = get_theme_mod('ll_label_docs_page_title');
$page_super_title = get_theme_mod('ll_label_docs_page_super_title');

get_header();?>

<?php $page_templates->show_header_no_h1($page_title, $page_super_title);?>

<div class="ll-page-content container">
	<section class="ll-sidebar">
		<?php get_template_part( 'template-parts/document-sidebar' );?>
	</section>
	
	<section class="ll-content">
		<?php get_template_part( 'template-parts/document-search-form' );?>
		<h1 class="post-title"><?php echo get_the_title($post);?></h1>		
		<div class="post-content">
		<?php echo apply_filters('the_content', get_post_field('post_content', $post));?>
		</div>
	</section>
</div>

<section class="leyka-howtostart container-fluid">
	<div class="container">
		<svg><use xlink:href="#pic-howtostart-ill" /></svg>
    	<p><?php echo get_theme_mod('ll_label_quick_start_needed');?></p>
    	<a href="<?php echo get_theme_mod('ll_quick_start_know_how_to_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_know_how_to');?></a>
	</div>
</section>

<?php get_footer();