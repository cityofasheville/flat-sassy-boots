<div id="buddypress" class = "col-xs-12">

	<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

	<?php do_action( 'bp_before_group_home_content' ); ?>

	<div id="item-header" class = "col-xs-12" role="complementary">

		<?php bp_get_template_part( 'groups/single/group-header' ); ?>

	</div><!-- #item-header -->

	<div class="col-md-12 visible-md-block visible-lg-block"  role="navigation">
			<ul class = "nav nav-tabs">

				<?php bp_get_options_nav(); ?>

				<?php do_action( 'bp_group_options_nav' ); ?>

			</ul>
	</div><!-- #item-nav -->

	<div class="item-list-tabs no-ajax dropdown visible-xs-block visible-sm-block" id="subnav" role="navigation"  style = "width : 100%; margin-bottom : 20px; margin-top : 20px" >
		<button class="btn btn-default dropdown-toggle" style = "width : 100%; text-align : left" type="button" id="groupdropdown" data-toggle="dropdown" aria-expanded="true">   
	    <h5>Menu Options <i class="fa fa-chevron-down pull-right"></i></h5>
	  </button>
		<ul class = "dropdown-menu" aria-labelledby="groupdropdown" style = "width : 100%">
			<?php bp_get_options_nav(); ?>

				<?php do_action( 'bp_group_options_nav' ); ?>
		</ul>
	</div><!-- .item-list-tabs -->

	<div id="item-body" class = "col-xs-12">

		<?php do_action( 'bp_before_group_body' );

		/**
		 * Does this next bit look familiar? If not, go check out WordPress's
		 * /wp-includes/template-loader.php file.
		 *
		 * @todo A real template hierarchy? Gasp!
		 */

			// Looking at home location
			if ( bp_is_group_home() ) :

				if ( bp_group_is_visible() ) {

					// Use custom front if one exists
					$custom_front = bp_locate_template( array( 'groups/single/front.php' ), false, true );
					if     ( ! empty( $custom_front   ) ) : load_template( $custom_front, true );

					// Default to activity
					elseif ( bp_is_active( 'activity' ) ) : bp_get_template_part( 'groups/single/activity' );

					// Otherwise show members
					elseif ( bp_is_active( 'members'  ) ) : bp_groups_members_template_part();

					endif;

				} else {

					do_action( 'bp_before_group_status_message' ); ?>

					<div id="message" class="info">
						<p><?php bp_group_status_message(); ?></p>
					</div>

					<?php do_action( 'bp_after_group_status_message' );

				}

			// Not looking at home
			else :

				// Group Admin
				if     ( bp_is_group_admin_page() ) : bp_get_template_part( 'groups/single/admin'        );

				// Group Activity
				elseif ( bp_is_group_activity()   ) : bp_get_template_part( 'groups/single/activity'     );

				// Group Members
				elseif ( bp_is_group_members()    ) : flat_sassy_boots_bp_groups_members_template_part();

				// Group Invitations
				elseif ( bp_is_group_invites()    ) : bp_get_template_part( 'groups/single/send-invites' );

				// Old group forums
				elseif ( bp_is_group_forum()      ) : bp_get_template_part( 'groups/single/forum'        );

				// Membership request
				elseif ( bp_is_group_membership_request() ) : bp_get_template_part( 'groups/single/request-membership' );

				// Anything else (plugins mostly)
				else                                : bp_get_template_part( 'groups/single/plugins'      );

				endif;

			endif;

		do_action( 'bp_after_group_body' ); ?>

	</div><!-- #item-body -->

	<?php do_action( 'bp_after_group_home_content' ); ?>

	<?php endwhile; endif; ?>

</div><!-- #buddypress -->
