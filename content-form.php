<?php
/**
 * @package Flat Sassy Boots
 */
?>

<article class = "" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header col-xs-12">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <div class="entry-meta">
      <?php flat_sassy_boots_posted_on(); ?>
    </div><!-- .entry-meta -->
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php 
      if (has_post_thumbnail()) {
        echo '<div class="single-post-thumbnail clear">';
        echo the_post_thumbnail('large-thumb');
        echo '</div>';
      }
    ?>
    <div class="">
      <div class="col-xs-12 well" style = "background : white; border : 2px solid #ecf0f1">
        

        <?php echo '<script src="'; ?>
        <?php the_field('link_to_form'); ?>
        <?php echo '"></script>'; ?>
        
          
      </div>
    
    </div>
    

  </div><!-- .entry-content -->


</article><!-- #post-## -->