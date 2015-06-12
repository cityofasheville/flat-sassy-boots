<?php
/**
 * @package Flat Sassy Boots
 */
?>
<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flat Sassy Boots
 */
?>

<div class="col-xs-12">
  <h2><i class="fa fa-folder-o"></i> <?php echo $policy_subsection->name; ?></h2>
  <?php 
    $args = array(
      'post_type'             => 'coa-policies',
      '$tax'                  => $policy_subsection->slug,
      'post_status'           => 'publish',
      'posts_per_page'        => -1
    );

    $my_query = null;
    $my_query = new WP_Query($args);
  
    if( have_posts() ){
      while ( have_posts() ) : the_post(); 
        $term_list = wp_get_post_terms($post->ID, 'policy-category', array("fields" => "ids"));
        if (in_array($policy_subsection->term_id, $term_list) ){
          get_template_part('policy', 'link'); 
        }
      endwhile; // end of loop 
      wp_reset_query();
    }
  ?>
</div>