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
        <table class="table table-striped">
          <tbody>
            <tr>
              <?php if (get_field('subject') != ''): ?>
              <td><strong>Subject</strong></td>
              <td><?php the_field('subject'); ?></td>
              <?php endif ?>
            </tr>
            <tr>
              <?php if (get_field('manual') != ''): ?>
              <td><strong>Manual</strong></td>
              <td><?php the_field('manual'); ?></td>
              <?php endif ?>
            </tr>
            <tr>
              <?php if (get_field('effective_date') != ''): ?>
              <td><strong>Effective Date</strong></td>
              <td><?php the_field('effective_date'); ?></td>
              <?php endif ?>
            </tr>
            <?php if (get_field('filing_instructions') != ''): ?>
              <tr>              
                <td><strong>Filling Instruction</strong></td>
                <td><?php the_field('filing_instructions'); ?></td>  
              </tr>
            <?php endif ?>

    

            <?php if (get_field('policy_number') != ''): ?>
              <tr>              
                <td><strong>Policy Number</strong></td>
                <td><?php the_field('policy_number'); ?></td>  
              </tr>
            <?php endif ?>

            <?php if (get_field('policy_revision') != ''): ?>
              <tr>              
                <td><strong>Policy Revision</strong></td>
                <td><?php the_field('policy_revision'); ?></td>  
              </tr>
            <?php endif ?>
            
            <?php if (get_field('addendum_number') != ''): ?>
              <tr>              
                <td><strong>Addendum Number</strong></td>
                <td><?php the_field('addendum_number'); ?></td>  
              </tr>
            <?php endif ?>

            <?php if (get_field('addendum_number') != ''): ?>
              <tr>              
                <td><strong>Addendum Revision</strong></td>
                <td><?php the_field('addendum_revision'); ?></td>  
              </tr>
            <?php endif ?>

           


            <?php 
            $city_manager_approval = get_field('city_manager_approval');
            if ($city_manager_approval[0] == 'Yes'): ?>
              <tr>              
                <td><strong><i class = "fa fa-check-circle text-success"></i> Approved by City Manager</strong></td>
                <td><?php the_field('city_manager'); ?></td>  
              </tr>
            <?php endif ?>

            <?php if (get_field('issued_by') != ''): ?>
              <tr>              
                <td><strong>Issued By</strong></td>
                <td><?php the_field('issued_by'); ?></td>  
              </tr>
            <?php endif ?>
            
          </tbody>
        </table>
      </div>
      <?php the_content(); ?>
    </div>
    

    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'flat-sassy-boots' ),
        'after'  => '</div>',
      ) );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer col-xs-12">

    <?php flat_sassy_boots_entry_footer(); ?>

  </footer><!-- .entry-footer -->
</article><!-- #post-## -->