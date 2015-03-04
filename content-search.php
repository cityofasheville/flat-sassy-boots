<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flat Sassy Boots
 */
?>

<article class = "col-xs-12 well" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if (has_post_thumbnail()) {
		    echo '<div class="small-index-thumbnail clear">';
		    echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'my-simone') . get_the_title() . '" rel="bookmark">';
		    echo the_post_thumbnail('index-thumb');
		    echo '</a>';
		    echo '</div>';
		}
	?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<!-- <div class="entry-summary well" style = "background : white">
		<?php the_excerpt(); ?>
	</div> --><!-- .entry-summary -->
	<footer class="entry-footer continue-reading">
    <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'my-simone') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right fa-lg"></i></a>'; ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->
