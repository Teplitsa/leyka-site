<?php

$steps_service = new LL_Steps_Service();
$other_steps_cats = $steps_service->get_other_categories($steps_service->get_current_category());

?>

<div class="steps-sidebar-inner">
	<span>Что если...</span>
	<div class="steps-other-categories">
		<?php foreach($other_steps_cats as $term) {
		    $first_step = $steps_service->get_category_first_step($term->slug);
		    $url = $first_step ? get_the_permalink($first_step) : "";
		    $url = add_query_arg(array('ll-set-steps-cat' => $term->slug), $url)
		?>
		<a href="<?php echo $url;?>"><?php echo $term->name;?></a>
		<?php }?>
	</div>
</div>	
