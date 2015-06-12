<?php
/**
 * The template for displaying all pages.
 *
 * The is custom front page template
 *
 * @package Flat Sassy Boots
 */

get_header(); ?>

  <div id="primary" class="content-area" style = "width : 100%; height : 100%">


    <div id = "home"  class="col-xs-12" style = "background-color : #3498db; width : 100%; height : 100%; margin : 0 auto;">
      <div class="col-xs-12">
        <div class="col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-xs-12">
          <h1 class="hidden-xs" style = "margin-top : 20%; color : #fff; font-size : 100px; font-family: 'Dawning of a New Day', cursive;"> <?php echo get_bloginfo('name'); ?></h2>
          <h2 class="visible-xs" style = "margin-top : 10%; color : #fff; font-family: 'Dawning of a New Day', cursive;"> <?php echo get_bloginfo('name'); ?></h4>
          <h5 style = "color : #ecf0f1;"><?php echo get_bloginfo('description'); ?></h5>
          <?php get_search_form( true ); ?> 
          <div class="front-page-navigation col-xs-12">
            <?php  wp_nav_menu( array( 'theme_location' => 'front-page-menu' ) );?>
          </div>
        </div>
        <div class="col-lg-5 col-md-10 col-md-offset-1 col-xs-12" style = "margin-top : 40px">
            
            <?php dynamic_sidebar( 'front-page-widget-area' ); ?>
   
          
        </div>

      </div>

    </div><!-- /.container -->




  </div><!-- #primary -->

<?php get_footer(); ?>
