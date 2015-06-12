<?php
/**
 * The template for displaying all single posts.
 *
 * @package Flat Sassy Boots
 */

get_header(); ?>

  <div id="primary" class="content-area container">
    <main id="main" class="site-main col-md-10 col-md-offset-1" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content', 'form' ); ?>
      <!-- 
            <?php the_post_navigation(); ?>
       -->
      <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      ?>

    <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->


<?php get_footer(); ?>
