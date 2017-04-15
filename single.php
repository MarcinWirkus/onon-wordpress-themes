<?php get_header(); ?>
<div class="container-fluid">

  <div class="row page singlepost">

    <div class="col-md-7 col-md-offset-2">

      <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
      $url = $thumb['0'];
      ?>

      <div class="header" style="background-image:url(<?=$url?>);">
        <div class="header-meta"><span class="header-meta__author"><?php the_author_link(); ?></span> / <?php the_category(); ?></div>
        <h1><?php the_title(); ?></h1>
      </div>

      <div class="row">
        <div class="col-md-2">
          <div class="time">
            <div class="nameday"><?php the_time('l'); ?></div>
            <div class="day"><?php the_time('j'); ?></div>
            <div class="month"><?php the_time('F Y'); ?></div>
          </div>
          <div class="category">
            <?php the_category( ', ' ); ?>
          </div>
          <div class="tags">
            Tagi: <?php the_tags( '<div class="tag">', '</div><div class="tag">', '</div>' ); ?>
          </div>

        </div>
        <div class="col-md-10">

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>
            <hr>
            <div class="row nextprev">
              <div class="col-md-6 text-left">
                <div class="link"><?php previous_post_link('<strong>%link</strong>'); ?></div>
              </div>
              <div class="col-md-6 text-right">
                <div class="link"><?php next_post_link( '<strong>%link</strong>' ); ?></div>
              </div>
            </div>

            <hr>
            Komentarze:
            <?php comments_template(); ?>


          <?php endwhile; else: ?>
            <p><?php _e('Sorry, this page does not exist.'); ?></p>
          <?php endif; ?>

        </div>
      </div>
    </div>
    <div class="col-md-3">
      <?php get_sidebar(); ?>
    </div>



    <?php get_footer(); ?>
