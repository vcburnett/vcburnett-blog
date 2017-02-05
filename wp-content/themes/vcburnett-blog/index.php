<?php get_header(); ?>

<div class="wrap">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div id="wrapper">

				<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); ?>

						<!-- post -->
								<div class="vcb-post">
									<?php
										$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
										echo '<div class="vcb-post-img" style="background-image: url('. $url.')"></div>';
									?>
									
									<div class="vcb-post-text">
										<h1><?php the_title(); ?></h1>
										<p><?php the_excerpt(); ?></p>
										<a href="<?php echo get_permalink(); ?>" class="post-links">Read More</a>
									</div>
								</div><!-- end post -->

				<?php		} // end while
					} // end if
				?>

			</div>

			<div id="home-pagination">
				<div id="home-bar-end"></div>
				<a href="javascript:void(0);">Previous</a>
				<a href="javascript:void(0);">Next</a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->

<?php get_footer();
