<?php

$steps_service = new LL_Steps_Service();
$other_steps_cats = $steps_service->get_other_categories($steps_service->get_current_category());

$prices_page = ll_get_post('prices', 'page');
$prices_page_url = get_the_permalink($prices_page);

?>

<div class="steps-sidebar-inner">
	<span>Что если...</span>
	<div class="steps-other-categories">
		<?php foreach($other_steps_cats as $term) {
		    $first_step = $steps_service->get_category_first_step($term->slug);
		    $url = $first_step ? get_the_permalink($first_step) : "";
		?>
		<a href="<?php echo $url;?>"><?php echo $term->name;?></a>
		<?php }?>
		<a href="<?php echo $prices_page_url;?>"><?php echo get_theme_mod('ll_label_i_need_installation_assistance');?></a>
	</div>
</div>	
