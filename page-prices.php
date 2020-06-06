<?php
/**
 * The main template file.
 */

$page_templates = new LL_Page_Templates();
$prices_service = new LL_Prices_Service();

$submit_status = !empty($_REQUEST['submit_status']) ? $_REQUEST['submit_status'] : null;
$submit_message = !empty($_REQUEST['submit_message']) ? $_REQUEST['submit_message'] : null;
$form_submitted_class = $submit_status ? "form-submitted" : "";

get_header();?>

<?php $page_templates->show_page_header(get_post());?>

<div class="ll-prices-info-page-content <?php echo $form_submitted_class;?>" id="ll-prices-info-page-content">

    <div class="ll-page-content container">
    	<section class="ll-sidebar">
    		<div class="ll-prices-description"><?php echo nl2br(get_theme_mod('ll_label_quick_start_price_description'));?></div>
    	</section>
    	
    	<section class="ll-content quick-start-prices">
    	
    		<div class="quick-start-price">
        		<div class="ll-price">
        			<div class="price">
            			<h4><?php echo get_theme_mod('ll_label_quick_start_price_title');?></h4>
            			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_quick_start_price_price'));?><sup><?php echo get_theme_mod('ll_label_quick_start_price_currency');?></sup></h3>
            			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="1" class="btn btn-primary desktop ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
        			</div>
        			<div class="points">
        				<h4><?php echo get_theme_mod('ll_label_quick_start_price_case');?></h4>
            			<ul>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point1');?></span></li>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point2');?></span></li>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point3');?></span></li>
            			</ul>
        			</div>
        			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="1" class="btn btn-primary mobile ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
        		</div>
    		</div>
    		
    		<div class="quick-start-price extra-work-needed">
        		<div class="ll-price">
        			<div class="price">
            			<h4><?php echo get_theme_mod('ll_label_quick_start_price2_title');?></h4>
            			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_quick_start_price2_price'));?><sup><?php echo get_theme_mod('ll_label_quick_start_price_currency');?></sup></h3>
            			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="2" class="btn btn-primary desktop ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
        			</div>
        			<div class="points">
        				<h4><?php echo get_theme_mod('ll_label_quick_start_price2_case');?></h4>
            			<ul>
            				<li class="extra-work"><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price2_point0');?></span></li>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price2_point1');?></span></li>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price2_point2');?></span></li>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price2_point3');?></span></li>
            			</ul>
        			</div>
        			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="2" class="btn btn-primary mobile ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
        		</div>
    		</div>
    		
    	</section>
    </div>
    
    <div class="ll-page-content container">
    	<section class="ll-sidebar">
    		<div class="ll-prices-description"><?php echo nl2br(get_theme_mod('ll_label_other_prices_description'));?></div>
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
    			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="3" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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
    			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="4" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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
    			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="5" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
    		</div>
    		
    	</section>
    </div>
    
	<?php get_template_part( 'template-parts/section-howtostart' );?>

</div>

<div class="ll-prices-form-page-content <?php echo $form_submitted_class;?> submitted-<?php echo $submit_status;?>" id="ll-prices-form-page-content">
	<section class="ll-form-section container">
		<div class="ll-form-wrapper">
    		<?php if($submit_status) {?>
    			<div class="alert alert-<?php echo esc_html($submit_status);?> ll-form-message"><?php echo get_theme_mod($submit_message);?></div>
    		<?php }?>

            <?php 
                $form_id = get_theme_mod( 'll_price_form_id' );
                if( $form_id ) {
                    echo do_shortcode( '[formidable id=' . $form_id . ']' );
                }
            ?>
		</div>
		
    	<svg class="leyka-pic"><use xlink:href="#pic-skater-sun-mountains" /></svg>
    	<svg class="icon-drop drop1 color004"><use xlink:href="#icon-drop-002" /></svg>
    	<svg class="icon-drop drop2 color004"><use xlink:href="#icon-drop-small-003" /></svg>
	</section>
</div>

<?php get_footer();