<?php
/**
 * The main template file
 *
 */
$page_templates = new LL_Page_Templates();

$steps_service = new LL_Steps_Service();
$step_category = $steps_service->get_current_category();
$main_steps = $steps_service->get_category_steps($step_category);

$next_step = $steps_service->get_next_category_step($post, $step_category);
$prev_step = $steps_service->get_prev_category_step($post, $step_category);

$page_permalink = get_the_permalink();

get_header();?>

<?php $page_templates->show_page_header($post);?>

<div class="ll-page-content container step-content">

	<section class="ll-sidebar">
		<?php get_template_part( 'template-parts/step-sidebar' );?>
	</section>

	<section class="ll-content">
		<div class="post-content">
		<?php echo apply_filters('the_content', get_post_field('post_content', $post));?>
		</div>
		
		<div class="nav-prev-next">
    		<a href="<?php echo get_the_permalink($prev_step);?>" class="prev-step"><svg class="svg-icon"><use xlink:href="#icon-arrow-line-right" /></svg>Предыдущий шаг</a>
    		<a href="<?php echo get_the_permalink($next_step);?>" class="btn btn-primary next-step">Следующий шаг<svg class="svg-icon"><use xlink:href="#icon-arrow-line-right" /></svg></a>
		</div>
	</section>
	
	<svg class="icon-drop drop1 color004"><use xlink:href="#icon-drop-004" /></svg>
	<svg class="icon-drop drop2 color004"><use xlink:href="#icon-drop-005" /></svg>
	<svg class="icon-drop drop3 color006"><use xlink:href="#icon-drop-lg-003" /></svg>	
</div>

<div class="ll-page-content container steps-map">

	<section class="ll-content">	
        <div class="main-steps">
        	<h4>Следуй простым шагам, чтобы начать собирать пожертвования</h4>
    		<div class="connection-line" id="steps-connection-line"></div>
        	<div class="steps-list">
            	<?php foreach($main_steps as $post_item){?>
        		<div class="step-item <?php if(get_the_permalink($post_item) == $page_permalink){?>active<?php }?>">
            		<img class="step-ill" src="<?php echo get_template_directory_uri();?>/assets/img/step-small-<?php echo $post_item->menu_order?>.svg" />
            		<span class="step-check"></span>
            		<h5><a href="<?php echo get_the_permalink($post_item);?>">Шаг <?php echo $post_item->menu_order;?></a></h5>
            		<h6><a href="<?php echo get_the_permalink($post_item);?>"><?php echo $post_item->post_title;?></a></h6>
        		</div>
            	<?php }?>
        	</div>
        	
        	<div class="nav-container nav-mobile">
            	<nav>
            		<a class="active" href="#"> </a>
            		<a href="#"> </a>
            		<a href="#"> </a>
            		<a href="#"> </a>
            		<a href="#"> </a>
            	</nav>
        	</div>
        	
        </div>		
	</section>
	
</div>

<?php
get_footer();
