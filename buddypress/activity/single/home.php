<div id="buddypress">
	<?php do_action( 'template_notices' ); ?>

	<div class="activity no-ajax col-xs-12" role="main">
		<?php if ( bp_has_activities( 'display_comments=threaded&show_hidden=true&include=' . bp_current_action() ) ) : ?>

			<ul id="activity-stream" class="activity-list item-list col-xs-12" style = "margin-top : 20px">
			<?php while ( bp_activities() ) : bp_the_activity(); ?>

				<?php bp_get_template_part( 'activity/entry' ); ?>

			<?php endwhile; ?>
			</ul>

		<?php endif; ?>
	</div>
</div>