
<?php

do_action( 'bp_before_group_header' );

?>


<div id="item-header-avatar" class = "col-sm-6">
	<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">

		<?php bp_group_avatar(); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-actions" class = "col-sm-6">

	<?php if ( bp_group_is_visible() ) : ?>

		<h5><?php _e( 'Group Admins', 'buddypress' ); ?></h5>

		<?php bp_group_list_admins();

		do_action( 'bp_after_group_menu_admins' );

		if ( bp_group_has_moderators() ) :
			do_action( 'bp_before_group_menu_mods' ); ?>

			<h5><?php _e( 'Group Mods' , 'buddypress' ); ?></h5>

			<?php bp_group_list_mods();

			do_action( 'bp_after_group_menu_mods' );

		endif;

	endif; ?>

</div><!-- #item-actions -->


<div id="item-header-content" class = "col-xs-12">
	<small class="highlight"><?php bp_group_type(); ?></small>
	<small class="activity"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></small>

	<?php do_action( 'bp_before_group_header_meta' ); ?>

	<div id="item-meta">

		<p><?php bp_group_description(); ?></p>

		<div id="item-buttons">

			<?php do_action( 'bp_group_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php do_action( 'bp_group_header_meta' ); ?>

	</div>
</div><!-- #item-header-content -->

<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>