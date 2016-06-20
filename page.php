<?php get_header(); ?>
<div class="container">
  <div class="row page">
    <div class="col-md-9">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <p><em><?php the_time('l, j F Y'); ?></em></p>

        <?php the_content(); ?>

        <div class="text-left">
          <?php previous_post_link('<strong>%link</strong>'); ?>
        </div>
        <div class="text-right">
          <?php next_post_link( '<strong>%link</strong>' ); ?>
        </div>

        <hr>

      <?php endwhile; else: ?>
        <p><?php _e('Sorry, this page does not exist.'); ?></p>
      <?php endif; ?>

    </div>
    <div class="col-md-3">
      <?php get_sidebar(); ?>
    </div>

</div>

  <?php get_footer(); ?>
