<?php
/**
 * The main template file.
 */

$faq_tempaltes = new LL_Faq_Templates();
$page_templates = new LL_Page_Templates();

$faq_service = new LL_Faq_Service();
$faq_categories = $faq_service->get_categories();

get_header();?>

<?php $page_templates->show_page_header(get_post());?>


<section class="leyka-faq-list container">
	<?php foreach($faq_categories as $faq_category) {
	    $faq_tempaltes->show_faq_category_questions($faq_category, $faq_service);
	}?>
</section>

<?php get_template_part( 'template-parts/section-howtostart' );?>

<?php get_footer();