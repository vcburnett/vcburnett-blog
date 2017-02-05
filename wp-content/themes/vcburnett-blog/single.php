<?php get_header(); ?>

<div class="wrap">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );

					previous_post_link('&laquo; &laquo; %', '', 'yes'); ?> | <?php next_post_link('% &raquo; &raquo; ', '', 'yes'); ?>

				<section id="vcb-related-articles">

					<h4>Related Articles</h4>

					<?php
						$orig_post = $post;
						global $post;
						$cats = wp_get_post_categories($post->ID);

						if ($cats) {
							$cat_ids = array();
							foreach ($cats as $individual_category) {
								$cat_ids[] = $individual_category->term_id;
							}
							$args = array(
								'cat__in' => $cat_ids,
								'post__not_in' => array($post->ID),
								'posts_per_page' => 4,
								'caller_get_posts' => 1
							);

							$my_query = new wp_query ($args);

							while ($my_query->have_posts()) {
								$my_query->the_post();
								?>

								<div class="vcb-rel-article">
									<a href="<?php the_permalink(); ?>">
										<?php
											$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
											echo '<div class="vcb-rel-art-img" style="background-image: url('. $url.')"></div>';
										?>
									</a>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="mob-off"><?php the_excerpt(); ?></p>
								</div>

							<?php
							}
						};
						$post = $orig_post;
						wp_reset_query();
					?>

				</section><!-- end Related Articles -->


			<?php	endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->

<?php get_footer();
