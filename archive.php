<?php
/**
 * 	Template Name: Archive Page
 * 	The template for the archive page.
 *
 */


	get_header(); ?>

<div class="content">

  <h1>
    <?php the_title(); // this should output Archive Page ?>
  </h1>

  <?php

    // set up our archive arguments
    $archive_args = array(
      post_type => 'post',    // get only posts
      'posts_per_page'=> -1   // this will display all posts on one page
    );

    // new instance of WP_Quert
    $archive_query = new WP_Query( $archive_args );

  ?>

  <div class="loop-archive">

    <?php $date_old = ""; // assign $date_old to nothing to start ?>

    <?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop ?>

      <?php $date_new = get_the_time("F Y"); // get $date_new in "Month Year" format ?>

      <?php if ( $date_old != $date_new ) : // run the check on $date_old and $date_new, and output accordingly ?>
        <h2><?php echo $date_new; ?></h2>
      <?php endif; ?>

      <article <?php post_class(); // output a post article ?>>
        <h4><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <span><?php the_time("jS M, Y"); ?></span>
      </article>

      <?php $date_old = $date_new; // update $date_old ?>

    <?php endwhile; // end the custom loop ?>

  </div>

  <?php wp_reset_postdata(); // always reset post data after a custom query ?>

</div><?php


get_sidebar();
get_footer(); ?>
