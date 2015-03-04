<?php
/**
 * @package Flat Sassy Boots
 */
?>

<article class = "container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
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
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'flat-sassy-boots' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php flat_sassy_boots_entry_footer(); ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
