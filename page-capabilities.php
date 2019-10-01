<?php
/**
 * The main template file.
 */

$page_templates = new LL_Page_Templates();
$prices_service = new LL_Price_Service();

get_header();?>

<?php $page_templates->show_header(get_post());?>

<div class="ll-page-content container">
	<div class="ll-content ll-content-fuild">
	<?php for($i = 1; $i <= LL_Capability_Service::$number; $i++){?>
		<div class="ll-capability">
			<img alt="" src="<?php echo get_template_directory_uri();?>/assets/img/screen-cap<?php echo $i?>.png" />
			<div class="ll-info">
        		<h2><?php echo get_theme_mod('ll_label_capability'.$i.'_title');?></h2>
        		<p><?php echo get_theme_mod('ll_label_capability'.$i.'_description');?></p>
        		<a href="<?php echo get_theme_mod('ll_label_capability'.$i.'_link_url');?>"><?php echo get_theme_mod('ll_label_capability'.$i.'_link_title');?></a>
        		<span class="ll-num"><?php echo $i;?></span>
			</div>
		</div>
	<?php }?>
	</div>
</div>

<section class="leyka-howtostart container-fluid">
	<div class="container">
		<svg><use xlink:href="#pic-howtostart-ill" /></svg>
    	<p><?php echo nl2br(get_theme_mod('ll_label_quick_start_needed'));?></p>
    	<a href="<?php echo get_theme_mod('ll_quick_start_know_how_to_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_know_how_to');?></a>
	</div>
</section>

<?php get_footer();