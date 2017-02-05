<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

					<?php the_content(); ?>

				</div><!-- end the Content -->
				</div><!-- enc Content 960 -->
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