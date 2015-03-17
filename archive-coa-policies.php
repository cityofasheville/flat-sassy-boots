<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flat Sassy Boots
 */

get_header(); ?>

  <div id="primary " class="content-area container" style = "background : #2C3E50; width : 100% ">
    <main id="main" class="site-main col-xs-12" role="main">

 

      <header class="page-header">
         <div class="col-xs-12" >
          <div class="col-lg-6">
            <h1 class = "" style = "">
              
              <span class="fa-stack fa-lg">
                <i style = "color : white" class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-file-text fa-stack-1x" style = "color : #2C3E50"></i>
              </span>
              <strong style = "color : white"> POLICIES</strong>
            </h1>
          </div>
        </div>
      </header><!-- .page-header -->
      <div class="col-xs-12 well" style = "background : white">
     <?php
      
    
 
        // List posts by the terms for a custom taxonomy of any post type
        $post_type = 'coa-policies';
        $tax = 'category';
        $parent_tax_terms = get_terms( $tax, 'orderby=name&order=ASC&parent=251');
      
        if ($parent_tax_terms) {
          foreach ($parent_tax_terms  as $parent_tax_term) {
          
          //
          ?>  
            <div class="col-xs-12" style = " border : 3px solid #ecf0f1; border-radius : 6px; margin-bottom : 10px">
            <h2 class = "text-primary"><?php echo $parent_tax_term->name; ?></h2>
              
              <?php
              if ($parent_tax_term->count == '1') {
                $args = array(
                    'post_type'             => $post_type,
                    "$tax"                  => $parent_tax_term->slug,
                    'post_status'           => 'publish',
                    'posts_per_page'        => -1
                  );

                $my_query = null;
                $my_query = new WP_Query($args);

                if( have_posts() ) : ?>

                  <div class="col-xs-12">

                    <?php while ( have_posts() ) : the_post(); ?>

                      <?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "ids")); ?>
                      
                      <?php if (in_array($parent_tax_term->term_id, $term_list) ): ?>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                          <div class="well">
                            <?php 
                            the_title( sprintf( '<h3 class="text-center"><a href="%s" target = "_blank" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); 
                            ?>
                            
                          </div>
                        </div>
                      <?php endif; // if in_array ?>

                    <?php endwhile; // end of loop ?>
                  </div>

                <?php endif; // if have_posts()
                wp_reset_query();
              }else{

              //Get sub-categories  
              $tax_terms = get_terms( $tax, array(
                'orderby' => 'name',
                 'order' => 'ASC',
                 'parent' => $parent_tax_term->term_id)
              );

              if($tax_terms){
                //Loop over sub-categories         
                foreach ($tax_terms  as $tax_term) {
                  $args = array(
                      'post_type'             => $post_type,
                      "$tax"                  => $tax_term->slug,
                      'post_status'           => 'publish',
                      'posts_per_page'        => -1
                    );

                  $my_query = null;
                  $my_query = new WP_Query($args);

                  if( have_posts() ) : ?>

                    <div class="col-xs-12">
                      <h3><?php echo $tax_term->name; ?></h3>

                      <?php while ( have_posts() ) : the_post(); ?>

                        <?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "ids")); ?>
                        
                        <?php if (in_array($tax_term->term_id, $term_list) ): ?>
                          <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="well">
                              <?php 
                              the_title( sprintf( '<h3 class="text-center"><a href="%s" target = "_blank" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); 
                              ?>
                            </div>
                          </div>
                        <?php endif; // if in_array ?>

                      <?php endwhile; // end of loop ?>
                    </div>

                    <?php endif; // if have_posts()
                    wp_reset_query();
                  }// end foreach #tax_terms
                }
                        
                        
              ?>
              </div>
            <?php  
            }
          } // end foreach #parent_tax_terms
      } // end if tax_terms
?>
      </div>
  


    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
