<?php
/**
 * @package Flat Sassy Boots
 */
?>

<article class = "" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if (has_post_thumbnail()) {
		    echo '<div class="small-index-thumbnail clear">';
		    echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'flat-sassy-boots') . get_the_title() . '" rel="bookmark">';
		    echo the_post_thumbnail('index-thumb');
		    echo '</a>';
		    echo '</div>';
		}
	?>
	<div class="well col-xs-12">
		<?php the_title( sprintf( '<h3 class="text-center"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

		<?php endif; ?>
	</div><!-- .entry-header -->
	
</article><!-- #post-## -->