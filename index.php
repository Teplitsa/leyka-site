<?php
/**
 * The main template file
 *
 */
$page_templates = new LL_Page_Templates();

$page_title = get_theme_mod('ll_label_search_results');
$page_super_title = __('Search');

get_header();?>

<?php $page_templates->show_header_no_h1($page_title, $page_super_title);?>

<div class="ll-page-content container">
	<section class="ll-sidebar">
		<?php get_template_part( 'template-parts/document-sidebar' );?>
	</section>

	<section class="ll-content">
		<?php get_template_part( 'template-parts/document-search-form' );?>
	
			<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();
				?>
				
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="post-excerpt">
		<?php the_excerpt(); ?>
	</div><!-- .<?php echo $class; ?> -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->				
				<?php 
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination(
				array(
					'prev_text'          => __( 'Previous page' ),
					'next_text'          => __( 'Next page' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page' ) . ' </span>',
				)
			);
			?>
	
	</section>
</div>
	
<?php get_template_part( 'template-parts/section-howtostart' );?>

<?php
get_footer();
