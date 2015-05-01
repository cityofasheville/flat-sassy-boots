<?php
/**
 * The template for displaying all pages.
 *
 * The is custom front page template
 *
 * @package Flat Sassy Boots
 */

get_header(); ?>

  <div id="primary" class="content-area" style = "width : 100%">
    <main id="main" class="site-main " role="main">

    <div id = "home"  style = "background-color : #3498db; width : 100%; margin : 0 auto; width : 100%;">
      <div class="col-xs-12">
        <div class="col-lg-6 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-9 col-sm-offset-1 col-xs-12">
          <h1 class="hidden-xs" style = "margin-top : 10%; color : #fff; font-size : 100px; font-weight : 700"> <?php echo get_bloginfo('name'); ?></h2>
          <h2 class="visible-xs" style = "margin-top : 10%; color : #fff;font-weight : 700"> <?php echo get_bloginfo('name'); ?></h4>
          <h2 class="hidden-xs" style = "color : #2c3e50"><?php echo get_bloginfo('description'); ?></h2>
          <h5 class="visible-xs" style = "color : #2c3e50"><?php echo get_bloginfo('description'); ?></h5>
          <?php get_search_form( true ); ?> 
          <div class="front-page-navigation col-xs-12">
            <?php  wp_nav_menu( array( 'theme_location' => 'front-page-menu' ) );?>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="col-xs-12" style = "margin-top : 100px">
            <?php dynamic_sidebar( 'front-page-widget-area' ); ?>
          </div>
          
        </div>
      </div>

    </div><!-- /.container -->
    <div class="container" style = "background : #1EA0DE; margin : 0 auto; width : 100%; min-height : 70px">
      <div class="col-lg-9" style = "background : #1EA0DE; padding : 20px; border-radius : 4px">
        <?php RssNewsDisplay(1); ?> 
      </div>
      <div class="col-lg-3 text-center">
        <a href="http://coablog.ashevillenc.gov/" target = "_blank">
          <img style = "margin : 0 auto; margin-top : 10px" src="http://coablog.avlcloud.com/wp-content/uploads/2014/12/city-source-logo-2.gif">
        </a>
      </div>
      
    </div><!-- /.container -->


    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
