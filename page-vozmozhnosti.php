<?php
/**
 * The main template file.
 */

$page_templates = new LL_Page_Templates();

$cap_service = new LL_Capability_Service();
$main_capabilites = $cap_service->get_capabilities(LL_Capability_Service::$main_capabilites_cat);
$new_capabilites = $cap_service->get_capabilities(LL_Capability_Service::$new_capabilites_cat);

get_header();?>

<?php $page_templates->show_page_header(get_post());?>

<div class="ll-page-content container">
	<div class="ll-content ll-content-fuild">
	<?php foreach($main_capabilites as $i => $post){
	    $cap_link_title = get_post_meta($post->ID, LL_Capability_Service::$meta_capability_link_title, true);
	    $cap_link_url = get_post_meta($post->ID, LL_Capability_Service::$meta_capability_link_url, true);
	?>
		<div class="ll-capability">
			<div class="ll-img">
				<img alt="<?php echo esc_html($post->post_title);?>" src="<?php echo get_the_post_thumbnail_url( $post, 'medium_large' );?>" />
			</div>
			<div class="ll-info">
        		<h2><?php echo esc_html($post->post_title);?></h2>
        		<p><?php echo esc_html($post->post_content);?></p>
        		<?php if($cap_link_title && $cap_link_url) {?>
        		<a href="<?php echo $cap_link_url;?>"><?php echo $cap_link_title;?></a>
        		<?php }?>
        		<span class="ll-num"><?php echo $i + 1;?></span>
			</div>
		</div>
	<?php }?>
	</div>
</div>

<div class="ll-page-content container">
	<div class="ll-content ll-new-cap-content">
		<h3><?php echo get_theme_mod('ll_label_capability_new_caps_title');?></h3>
		<div class="ll-new-cap-list">
	<?php foreach($new_capabilites as $i => $post){	?>
		<div class="ll-new-cap">
			<div class="ll-cap-icon">
				<svg class="svg-icon icon-drop color007"><use xlink:href="#icon-drop-006" /></svg>
				<img alt="<?php echo esc_html($post->post_title);?>" src="<?php echo get_the_post_thumbnail_url( $post, 'thumbnail' );?>" />
			</div>
			<div class="ll-info">
        		<h2><?php echo esc_html($post->post_title);?></h2>
        		<p><?php echo esc_html($post->post_content);?></p>
			</div>
		</div>
	<?php }?>
		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/section-howtostart' );?>

<?php get_footer();