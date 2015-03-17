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
          <h1 class="hidden-xs" style = "margin-top : 10%; color : #fff; font-size : 100px; font-weight : 700"><i class="fa fa-desktop"></i> ONE AVL</h1>
          <h2 class="hidden-xs" style = "color : #2c3e50">City of Asheville Intranet</h2>
          <h1 class="text-primary text-center visible-xs">City of Asheville Intranet</h1>

          <?php get_search_form( true ); ?> 
          <div class="col-xs-12 visible-md visible-lg hidden-xs visible-sm" style = "margin-top : 10px">
            <a class = "btn btn-primary" href="">EMPLOYEE DIRECTORY</a>
            <a class = "btn btn-primary" href="">EMPLOYEE SELF SERVICE</a>
            <div class="dropdown" style = "display : inline">
              <a class = 'text-muted dropdown-toggle btn btn-primary' href="" data-toggle="dropdown">APPS <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">MUNIS</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">ACCELA</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">MAXIMO</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">GIS</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 text-center visible-xs hidden-sm hidden-md hidden-lg" style = "margin-top : 10px; margin-bottom : 30px">
            <a class = 'btn btn-info col-xs-12' style = "margin-bottom : 5px; opacity : 0.8" href="">EMPLOYEE DIRECTORY</a>
            <a class = 'btn btn-info col-xs-12' style = "margin-bottom : 5px; opacity : 0.8" href="">EMPLOYEE SELF SERVICE</a>
            <div class="dropdown col-xs-12" style = "padding : 0px; opacity : 0.8">
              <a class = 'btn btn-info dropdown-toggle col-xs-12' href="" data-toggle="dropdown">APPS <span class="caret"></span></a>
              <ul class="dropdown-menu text-center" role="menu" aria-labelledby="dropdownMenu1" style = "width : 100% ">
                <li class = "text-center" role="presentation"><a role="menuitem" tabindex="-1" href="#">MUNIS</a></li>
                <li class = "text-center" role="presentation"><a role="menuitem" tabindex="-1" href="#">ACCELA</a></li>
                <li class = "text-center" role="presentation"><a role="menuitem" tabindex="-1" href="#">MAXIMO</a></li>
                <li class = "text-center" role="presentation"><a role="menuitem" tabindex="-1" href="#">GIS</a></li>
              </ul>
            </div>
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
