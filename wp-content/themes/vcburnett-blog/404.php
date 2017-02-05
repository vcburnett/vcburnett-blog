<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- wrapper -->
			<div id="wrapper">
				<div id="content-wrapper">

					<div id="error-wrap">
						<div id="error-txt">
							<h1>Wheeeeere is my mind?</h1>
							<p>Swimming in the Caribean with the little fishies? Hmmm... while I look for it, you can look for something else below...</p>
						</div>

						<div id="error-img">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/wheres-my-head.png" alt="Victor Burnett with no head">
						</div>
					</div>

					<div id="search404">
						<?php get_search_form(); ?>
					</div>

				</div>

				<!-- Header image -->
				<div id="content-header-image"></div>
				<!-- end Header image -->

			</div><!-- end wrapper -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
