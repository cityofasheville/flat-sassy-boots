<?php do_action( 'bp_before_profile_loop_content' ); ?>

<?php if ( bp_has_profile() ) : ?>
	<h3 class = "text-primary"><?php bp_is_my_profile() ? _e( 'My Profile', 'buddypress' ) : printf( __( "%s's Profile", 'buddypress' ), bp_get_displayed_user_fullname() ); ?></h3>

	<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

		<?php if ( bp_profile_group_has_fields() ) : ?>

			<?php do_action( 'bp_before_profile_field_content' ); ?>

			<div class="bp-widget <?php bp_the_profile_group_slug(); ?> col-xs-12">

				<h4><?php bp_the_profile_group_name(); ?></h4>

				<form class="profile-fields form-horizontal">

					<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

						<?php if ( bp_field_has_data() ) : ?>
							<div class="form-group" >
						    <label class="col-sm-2 control-label"><?php bp_the_profile_field_name(); ?></label>
						    <div class="profile-field-value col-sm-10">
						      <?php bp_the_profile_field_value(); ?>
						    </div>
						  </div>

						<?php endif; ?>

						<?php do_action( 'bp_profile_field_item' ); ?>

					<?php endwhile; ?>

				</form>
			</div>

			<?php do_action( 'bp_after_profile_field_content' ); ?>

		<?php endif; ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_profile_field_buttons' ); ?>

<?php endif; ?>

<?php do_action( 'bp_after_profile_loop_content' ); ?>
