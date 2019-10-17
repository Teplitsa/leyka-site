<?php
/**
 * The main template file
 *
 */
$page_templates = new LL_Page_Templates();

get_header();?>

<?php $page_templates->show_page_header($post);?>

<div class="ll-page-content container">
	<section class="ll-content">
	
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        	<div class="post-content">
        		<?php echo apply_filters('the_content', get_post_field('post_content', $post));?>
        	</div>
        </article><!-- #post-<?php the_ID(); ?> -->				
	
	</section>
</div>

<section class="leyka-howtostart container-fluid">
	<div class="container">
		<svg><use xlink:href="#pic-howtostart-ill" /></svg>
    	<p><?php echo get_theme_mod('ll_label_quick_start_needed');?></p>
    	<a href="<?php echo get_theme_mod('ll_quick_start_know_how_to_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_quick_start_know_how_to');?></a>
	</div>
</section>

<?php
get_footer();
