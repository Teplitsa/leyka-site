<?php
/**
 * The main template file.
 */

$faq_tempaltes = new LL_Faq_Templates();
$page_templates = new LL_Page_Templates();

$faq_service = new LL_Faq_Service();
$faq_list = $faq_service->get_all();

get_header();?>

<?php $page_templates->show_page_header(get_post());?>

<section class="leyka-faq-list container">
	<?php $faq_tempaltes->show_list($faq_list);?>
</section>

<?php get_template_part( 'template-parts/section-howtostart' );?>

<?php get_footer();