<?php
/**
 * The main template file.
 */

$faq_tempaltes = new LL_Faq_Templates();
$page_templates = new LL_Page_Templates();

$faq_service = new LL_Faq_Service();
$faq_list = $faq_service->get_all();

get_header();?>

<?php $page_templates->show_header(get_post());?>

<section class="leyka-faq-list container">
	<?php $faq_tempaltes->show_list($faq_list);?>
</section>

<section class="leyka-howtostart container-fluid">
	<div class="container">
		<svg><use xlink:href="#pic-howtostart-ill" /></svg>
    	<p><?php echo get_theme_mod('ll_label_quick_start_needed');?></p>
    	<a href="<?php echo get_theme_mod('ll_quick_start_know_how_to_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_know_how_to');?></a>
	</div>
</section>

<?php get_footer();