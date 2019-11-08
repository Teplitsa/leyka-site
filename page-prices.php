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
            			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="quick-start" class="btn btn-primary desktop ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
        			</div>
        			<div class="points">
        				<h4><?php echo get_theme_mod('ll_label_quick_start_price_case');?></h4>
            			<ul>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point1');?></span></li>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point2');?></span></li>
            				<li><svg class="svg-icon"><use xlink:href="#icon-check-lite" /></svg><span><?php echo get_theme_mod('ll_label_quick_start_price_point3');?></span></li>
            			</ul>
        			</div>
        			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="quick-start" class="btn btn-primary mobile ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
        		</div>
    		</div>
    		
    		<div class="quick-start-price extra-work-needed">
        		<div class="ll-price">
        			<div class="price">
            			<h4><?php echo get_theme_mod('ll_label_quick_start_price2_title');?></h4>
            			<h3><?php echo $prices_service->format_price(get_theme_mod('ll_label_quick_start_price2_price'));?><sup><?php echo get_theme_mod('ll_label_quick_start_price_currency');?></sup></h3>
            			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="quick-start-no-wp" class="btn btn-primary desktop ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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
        			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="quick-start-no-wp" class="btn btn-primary mobile ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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
    			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="first-aid" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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
    			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="priority" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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
    			<a href="<?php echo get_theme_mod('ll_label_quick_start_price_submit_url');?>" data-price="analyst" class="btn btn-primary ll-open-make-order-form"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></a>
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
		
    		<form action="<?php echo add_query_arg( array('action' => 'll_submit_order'), admin_url('admin-post.php') );?>" method="post">
    			<?php wp_nonce_field('ll_submit_order', 'nonce');?>
                <div class="form-group">
                    <select class="form-control price-selector">
                        <option value="quick-start"><?php echo get_theme_mod('ll_label_quick_start_price_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_quick_start_price_price'));?><?php echo get_theme_mod('ll_label_quick_start_price_currency');?></option>
                        <option value="quick-start-no-wp"><?php echo get_theme_mod('ll_label_quick_start_price2_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_quick_start_price2_price'));?><?php echo get_theme_mod('ll_label_quick_start_price_currency');?></option>
                        <option value="first-aid"><?php echo get_theme_mod('ll_label_price1_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_price1_price'));?><?php echo get_theme_mod('ll_label_other_prices_currency');?></option>
                        <option value="priority"><?php echo get_theme_mod('ll_label_price2_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_price2_price'));?><?php echo get_theme_mod('ll_label_other_prices_currency');?></option>
                        <option value="analyst"><?php echo get_theme_mod('ll_label_price3_title');?> - <?php echo $prices_service->format_price(get_theme_mod('ll_label_price3_price'));?><?php echo get_theme_mod('ll_label_other_prices_currency');?></option>
                    </select>
                    <input type="hidden" name="price" class="text-price">
                </div>    		
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" placeholder="Имя" required>
                </div>
                <div class="form-group">
                    <input type="text" name="sname" class="form-control" placeholder="Фамилия" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" name="org" class="form-control" placeholder="Название организации" required>
                </div>
                <div class="ll-form-explain">
                	<?php echo get_theme_mod('ll_label_order_form_privacy_policy_explain');?>
                </div>
                <div class="ll-form-actions">
                    <button type="submit" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_price_submit_caption');?></button>
                    <a href="#" class="ll-go-back"><?php echo get_theme_mod('ll_label_back_to_prices_caption');?></a>
                </div>		
    		</form>
		</div>
		
    	<svg class="leyka-pic"><use xlink:href="#pic-skater-sun-mountains" /></svg>
    	<svg class="icon-drop drop1 color004"><use xlink:href="#icon-drop-002" /></svg>
    	<svg class="icon-drop drop2 color004"><use xlink:href="#icon-drop-small-003" /></svg>
	</section>
</div>

<?php get_footer();