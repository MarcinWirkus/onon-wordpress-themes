<?php get_header(); ?>

<div class="container-fluid">

	<div class="row page">
		<div class="col-md-9">

<!-- pierwsza pętla -->


				<?php
				$args = array(
					'posts_per_page' => '1',
					'ignore_sticky_posts' => true
				);

				$query = new WP_query ( $args );
				if ( $query->have_posts() ) {

				?>

				<?php while ( $query->have_posts() ) : $query->the_post(); /* start the loop */ ?>

					<?php
		      $thumb1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
		      $url = $thumb1['0'];
		      ?>

						<div class="col-md-12 featuredpost">
							<div class="header" style="background-image:url(<?=$url?>);">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="text">
								<?php the_excerpt(); ?>
							</div>
						</div>

						<?php // End the loop.
						endwhile;
						rewind_posts();
						} ?>


<!-- druga pętla -->

<?php while ( have_posts() ) : the_post(); ?>

					<div class="col-md-4">
						<?php
						$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium_large' );
						$url2 = $thumb2['0'];
						?>

						<div class="frontpost">
							<div class="header" style="background-image:url(<?=$url2?>);">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="time"><em><?php the_time('l, j F Y'); ?></em></div>
							</div>
							<div class="text">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>

<?php // End the loop.
					endwhile; ?>






			<div class="row">
				<div class="col-md-12 text-center">
					<?php the_posts_pagination(array(
					'screen_reader_text' => ' '
				)); ?>
				</div>
			</div>

		</div>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>

	<?php get_footer(); ?>
