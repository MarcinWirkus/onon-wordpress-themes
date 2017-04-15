<?php get_header(); ?>

<div class="container-fluid">

	<div class="row page">
		<div class="col-md-9">

      <h1 class="header-category"><?php single_cat_title(); ?></h1>

			<?php
			$qry[1] = 1;
			$qry[2] = 12;
			$qry['total'] = array_sum($qry);
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$onum = ($qry['total'] * ($paged - 1));
			$offset = ($paged > 1) ? ($onum) : 0;
      $categoryvariable = $cat;
			query_posts("cat=' . $categoryvariable . '&posts_per_page=$qry[total]&paged=$paged&showposts=$qry[1]&offset=$offset");
			if (have_posts()) :
				while (have_posts()) : the_post();

				$thumb1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
				$url = $thumb1['0'];
				?>

					<div class="featured-post">
						<div class="header" style="background-image:url(<?=$url?>);">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="header-meta"><span class="header-meta__author"><?php the_author_link(); ?></span> / <?php the_category(); ?></div>
						</div>
						<div class="text">
							<?php the_excerpt(); ?>
						</div>
					</div>
					<?php

				endwhile;
			endif;

			// Reuse the offset variable (rather then creating a new one), setting to a new value (plus any additional offset)
			// Total in first query, plus any offset, if there is one
			$offset = $qry[1] + (($paged > 1) ? $onum : 0);

			query_posts("cat=' . $categoryvariable . '&posts_per_page=$qry[total]&offset=$offset&showposts=$qry[2]");
			if (have_posts()) :
				while (have_posts()) : the_post();
				?>
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

			<?php
				endwhile;
			endif;

			$offset = ($qry[1] + $qry[2]) + (($paged > 1) ? $onum : 0);

			// Unset the variables (we've finished with them, no reason to hold onto them)
			unset($qry,$offset,$onum);
			?>




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
