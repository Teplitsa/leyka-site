<?php
/**
 * The main template file.
 */

$page_templates = new LL_Page_Templates();
$prices_service = new LL_Price_Service();

get_header();?>

<?php $page_templates->show_header(get_post());?>

<div class="ll-prices-info-page-content" id="ll-prices-info-page-content">

<div class="ll-page-content container">
	<section class="ll-sidebar">
		<div class="ll-prices-description"><?php echo nl2br(get_theme_mod('ll_label_quick_start_price_description'));?></div>
	</section>
	
	<section class="ll-content quick-start-price">
		<div class="ll-price">
			<div class="price">
    			<h4><?php echo get_theme_mod('ll_label_quick_start_price_title');?></h4>
    			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_quick_start_price_price'));?><sup><?php echo get_theme_mod('ll_label_quick_start_price_currency');?></sup></h3>
    			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary desktop ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
			</div>
			<ul class="points">
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point1');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point2');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point3');?></span></li>
			</ul>
			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary mobile ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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
			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
		</div>
		
		<div class="ll-price">
			<div class="price">
    			<h4><?php echo get_theme_mod('ll_label_price2_title');?></h4>
    			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_price2_price'));?><sup><?php echo get_theme_mod('ll_label_other_prices_currency');?></sup></h3>
			</div>
			<ul class="points">
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price1_point1');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price1_point2');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price2_point3');?></span></li>
			</ul>
			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
		</div>
		
		<div class="ll-price">
			<div class="price">
    			<h4><?php echo get_theme_mod('ll_label_price3_title');?></h4>
    			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_price3_price'));?><sup><?php echo get_theme_mod('ll_label_other_prices_currency');?></sup></h3>
			</div>
			<ul class="points">
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price1_point1');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price1_point2');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price2_point3');?></span></li>
				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_price3_point4');?></span></li>
			</ul>
			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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

</div>

<div class="ll-prices-form-page-content" id="ll-prices-form-page-content">
	<section class="ll-prices-form-section container">
		<div class="ll-prices-submit-order-form">
    		<form action="">
                <div class="form-group">
                    <select class="form-control">
                        <option><?php echo get_theme_mod('ll_label_quick_start_price_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_quick_start_price_price'));?><?php echo get_theme_mod('ll_label_quick_start_price_currency');?></option>
                        <option><?php echo get_theme_mod('ll_label_price1_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_price1_price'));?><?php echo get_theme_mod('ll_label_other_prices_currency');?></option>
                        <option><?php echo get_theme_mod('ll_label_price2_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_price2_price'));?><?php echo get_theme_mod('ll_label_other_prices_currency');?></option>
                        <option><?php echo get_theme_mod('ll_label_price3_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_price3_price'));?><?php echo get_theme_mod('ll_label_other_prices_currency');?></option>
                    </select>
                </div>    		
                <div class="form-group">
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Имя">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Фамилия">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Название организации">
                </div>
                <div class="ll-form-explain">
					Ваши личные данные будут использоваться для обработки ваших заказов, упрощения вашей работы с сайтом и для других целей, описанных в нашей <a href="#">политики конфиденциальности</a>
                </div>
                <div class="ll-form-actions">
                    <button type="submit" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></button>
                    <a href="#" class="ll-back-to-prices">Вернуться к тарифам</a>
                </div>		
    		</form>
		</div>
	</section>
	<svg class="leyka-pic"><use xlink:href="#pic-skater-sun-mountains" /></svg>
	<svg class="icon-drop drop1 color004"><use xlink:href="#icon-drop-002" /></svg>
	<svg class="icon-drop drop2 color004"><use xlink:href="#icon-drop-small-003" /></svg>
</div>

<?php get_footer();