<?php
$tax_slug = 'videokurs';
$term = get_term_by('slug', 'videokurs', 'capability_cat');
//var_dump($term);
if ( $term ) { 

	$args = array(
		'post_type'      => 'capability',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'capability_cat',
				'field'    => 'slug',
				'terms'    => array( $tax_slug ),
			)
		),
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) : ?>

	<div class="ll-section-video-course">
		<div class="container">
			<h3><?php echo esc_html( $term->description ); ?></h3>
			<div class="ll-video-course-list slick-slider">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="ll-video-course-item">
						<a href="<?php echo get_post_meta( get_the_ID(), 'll_capability_link_url', true ); ?>" class="ll-video-course-link" target="_blank">
							<?php the_post_thumbnail(); ?>
							<span class="ll-video-course-button">
								<svg width="44" height="50" viewBox="0 0 44 50" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M42 21.5359C44.6667 23.0755 44.6667 26.9245 42 28.4641L5.99999 49.2487C3.33333 50.7883 -2.44188e-06 48.8638 -2.30729e-06 45.7846L-4.9024e-07 4.21539C-3.55644e-07 1.13618 3.33333 -0.788313 6 0.751288L42 21.5359Z" fill="currentColor"/>
								</svg>
							</span>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>

	<?php
	endif;
	wp_reset_postdata();
}
