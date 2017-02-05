x<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div id="content-wrapper">

			<section id="title">
				<h1><?php the_title(); ?></h1>
				<div id="down-arrow"></div>
			</section>

			<!-- Content -->
			<section id="content">
				<div class="content-960">

				<!-- Social Media top -->
				<section id="sm-wrap">
					<div id="social-media-top">
						<p>Share this on:</p>
						<a href="javascript:void(0);" id="btn-facebook">Facebook</a>
						<a href="javascript:void(0);" id="btn-twitter">Twitter</a>
						<a href="javascript:void(0);" id="btn-google">Google+</a>
						<a href="javascript:void(0);" id="btn-pinterest">Pinterest</a>
					</div>
				</section><!-- end Social Media top -->

				<!-- the Content -->
				<div id="the-content">

					<div class="top-line"></div>
					<p class="date-quote"><?php the_date(); ?></p>

					<p class="vcb-excerpt"><?php the_excerpt(); ?></p>

					<div id="article-food">
						<?php the_content(); ?>
					</div>

					<div id="article-food-stats">
						<div id="ct-top-bar"></div>

						<div id="cook-time-wrap">
							<div id="cook-time">
								<div id="clock">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/clock.png" alt="Cooking Time">
								</div>
								<div id="cook-time-text">
									<p class="ct-titles">Total time</p>
									<p class="ct-total-time"><?php
										$key = "foodTotalTime";
										echo get_post_meta($post->ID, $key, true);
									?></p>
									<p><span class="ct-titles">Prep:</span> <?php
										$key = "foodPrepTime";
										echo get_post_meta($post->ID, $key, true);
									?></p>
									<p><span class="ct-titles">Cook:</span> <?php
										$key = "foodCookTime";
										echo get_post_meta($post->ID, $key, true);
									?></p>
								</div>
							</div>
						</div>

						<div id="cook-level-wrap">
							<div id="cook-level">
								<div id="cook-level-labels">
									<p class="ct-titles">Difficulty:</p>
									<p class="ct-titles">Portions:</p>
									<p class="ct-titles">Calories:</p>
								</div>
								<div id="cook-level-values">
									<p><?php
										$key = "foodDifficulty";
										echo get_post_meta($post->ID, $key, true);
									?></p>
									<p><?php
										$key = "foodPortions";
										echo get_post_meta($post->ID, $key, true);
									?></p>
									<p>~<?php
										$key = "foodCalories";
										echo get_post_meta($post->ID, $key, true);
									?> cals per serving</p>
								</div>
							</div>
						</div>
						
						<p class="caption">* Approximate values</p>

						<a href="http://www.joesfusion.com" id="jf-cta">
							<div id="jf-flame"></div>
							<div id="jf-text">
								<p class="txt-view">View on</p>
								<p class="txt-joes">Joe's Fusion</p>
							</div>
						</a>
					</div>

				</div><!-- end the Content -->
				</div><!-- end Content 960 -->
			</section><!-- end Content -->

			<!-- Categories and Tags -->
			<section id="vcb-categories">

				<h4>Categories</h4>
				<p><?php
					$categories = get_the_category();
					$separator = ', ';
					$output = '';
					if ( ! empty( $categories ) ) {
					    foreach( $categories as $category ) {
					        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					    }
					    echo trim( $output, $separator );
					}
				?></p>

				<h4>Tags</h4>
				<p><?php
					$tags = get_the_tags();
					$separator = ', ';
					$output = '';
					if ( ! empty( $tags ) ) {
					    foreach( $tags as $tag ) {
					        $output .= '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'tag' ), $tag->name ) ) . '">' . esc_html( $tag->name ) . '</a>' . $separator;
					    }
					    echo trim( $output, $separator );
					}
				?></p>

			</section><!-- end Categories and Tags -->

		</div>

		<!-- Header image -->
		<?php 
			$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
			echo '<div class="content-header-image" style="background-image: url('.$url.')"></div>';
		?>
		<!-- end Header image -->

	</div><!-- end wrapper -->

</article><!-- #post-## -->