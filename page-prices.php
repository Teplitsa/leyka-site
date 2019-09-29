<?php
/**
 * The main template file.
 */

$page_templates = new LL_Page_Templates();
$prices_service = new LL_Price_Service();

get_header();?>

<?php $page_templates->show_header(get_post());?>

<div class="ll-page-content container">
	<section class="ll-sidebar">
		<div class="ll-prices-description"><?php echo nl2br(get_theme_mod('ll_label_quick_start_price_description'));?></div>
	</section>
	
	<section class="ll-content quick-start-price">
		<div class="ll-price">
			<div class="price">
    			<h4><?php echo get_theme_mod('ll_label_quick_start_price_title');?></h4>
    			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_quick_start_price_price'));?><sup><?php echo get_theme_mod('ll_label_quick_start_price_currency');?></sup></h3>
    			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
			</div>
			<ul class="points">
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point1');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point2');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point3');?></span></li>
			</ul>
		</div>
	</section>
</div>

<div class="ll-page-content container">
	<section class="ll-sidebar">
		<div class="ll-prices-description"><?php echo nl2br(get_theme_mod('ll_label_quick_start_price_description'));?></div>
	</section>
	
	<section class="ll-content other-prices">
		<div class="ll-price">
			<div class="price">
    			<h4><?php echo get_theme_mod('ll_label_price1_title');?></h4>
    			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_price1_price'));?><sup><?php echo get_theme_mod('ll_label_other_prices_currency');?></sup></h3>
			</div>
			<ul class="points">
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price1_point1');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price1_point2');?></span></li>
			</ul>
			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
		</div>
		
		<div class="ll-price">
			<div class="price">
    			<h4><?php echo get_theme_mod('ll_label_price2_title');?></h4>
    			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_price2_price'));?><sup><?php echo get_theme_mod('ll_label_other_prices_currency');?></sup></h3>
			</div>
			<ul class="points">
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price2_point1');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price2_point2');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price2_point3');?></span></li>
			</ul>
			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
		</div>
		
		<div class="ll-price">
			<div class="price">
    			<h4><?php echo get_theme_mod('ll_label_price3_title');?></h4>
    			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_price3_price'));?><sup><?php echo get_theme_mod('ll_label_other_prices_currency');?></sup></h3>
			</div>
			<ul class="points">
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price3_point1');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price3_point2');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price3_point3');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price3_point4');?></span></li>
			</ul>
			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
		</div>
		
	</section>
</div>

<section class="leyka-howtostart container-fluid">
	<div class="container">
		<svg><use xlink:href="#pic-howtostart-ill" /></svg>
	</div>
</section>

<?php get_footer();