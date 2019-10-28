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

<?php get_template_part( 'template-parts/section-howtostart' );?>

<?php
get_footer();
