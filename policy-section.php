<?php
/**
 * @package Flat Sassy Boots
 */
?>
<div class="col-sm-12 policy-section">
  <div class="col-xs-12" style = "border : 3px solid rgb(52, 152, 219)  ; border-radius : 6px; margin-bottom : 10px">
    <h1 class = "text-primary"><i class="fa fa-folder-o"></i> <?php echo $policy_section->name; ?></h1>
    <?php 

      $policies_category_term_children = get_term_children($policy_section->term_id, 'policy-category');

      if(empty($policies_category_term_children)){

        //no children, so just loop over links the policies
        
        $args = array(
          'post_type'             => 'coa-policies',
          '$tax'                  => $policy_section->slug,
          'post_status'           => 'publish',
          'posts_per_page'        => -1
        );

        $my_query = null;
        $my_query = new WP_Query($args);
      
        if( have_posts() ){
          while ( have_posts() ) : the_post(); 
            $term_list = wp_get_post_terms($post->ID, 'policy-category', array("fields" => "ids"));
            if (in_array($policy_section->term_id, $term_list) ){
              get_template_part('policy', 'link'); 
            }
          endwhile; // end of loop 
          wp_reset_query();
        }

      }else{

        //there are child categories, so loop over child terms

        foreach ($policies_category_term_children as $policies_category_term_child) {
          //get details about the term
          $policies_category_term_child_term = get_term($policies_category_term_child, 'policy-category');
          
          //set a global variable so that it can be accessed by the template below
          set_query_var( 'policy_subsection', $policies_category_term_child_term );
          //inject the policy-section.php template here
          get_template_part('policy', 'subsection');
        }
        
      }
    ?>
  </div>
</div>