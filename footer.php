<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Flat Sassy Boots
 */
?>

	</div><!-- #content -->


	<footer id="colophon" class="site-footer col-xs-12       " role="contentinfo">
    <?php get_sidebar('footer'); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'flat-sassy-boots' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'flat-sassy-boots' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'flat-sassy-boots' ), 'Flat Sassy Boots', '<a href="https://github.com/carlyleec" rel="designer">Cameron Carlyle</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
