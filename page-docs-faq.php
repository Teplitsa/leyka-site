<?php
/**
 * The main template file.
 */

$page_templates = new LL_Page_Templates();

$page_title = get_theme_mod('ll_label_docs_page_title');
$page_super_title = get_theme_mod('ll_label_docs_page_super_title');

$docs_faq_term_slug = get_query_var('ll_docs_faq_cat');
$docs_faq_term = $docs_faq_term_slug ? get_term_by('slug', $docs_faq_term_slug, LL_Docs_Service::$category_tax) : null;

$docs_service = new LL_Docs_Service();
$docs_tempaltes = new LL_Docs_Templates();
$docs = $docs_service->get_category_docs($docs_faq_term->term_id);

get_header();?>

<?php $page_templates->show_header_no_h1($page_title, $page_super_title);?>

<div class="ll-page-content container">
	<section class="ll-sidebar">
		<?php get_template_part( 'template-parts/document-sidebar' );?>
	</section>
	
	<section class="ll-content">
		<?php get_template_part( 'template-parts/document-search-form' );?>
		<h1 class="post-title"><?php echo $docs_faq_term->name;?></h1>		
		<section class="leyka-faq-list">
			<?php $docs_tempaltes->show_list($docs);?>
		</section>
	</section>
</div>

<?php get_template_part( 'template-parts/section-howtostart' );?>

<?php get_footer();