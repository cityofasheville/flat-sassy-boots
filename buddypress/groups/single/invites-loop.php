
<div class="left-menu">

	<div id="invite-list">

		<ul>
			<?php bp_new_group_invite_friend_list(); ?>
		</ul>

		<?php wp_nonce_field( 'groups_invite_uninvite_user', '_wpnonce_invite_uninvite_user' ); ?>

	</div>

</div><!-- .left-menu -->

<div class="main-column">

	<?php do_action( 'bp_before_group_send_invites_list' ); ?>

	<?php if ( bp_group_has_invites( bp_ajax_querystring( 'invite' ) . '&per_page=10' ) ) : ?>

		<div id="pag-top" class="pagination">

			<div class="pag-count" id="group-invite-count-top">

				<?php bp_group_invite_pagination_count(); ?>

			</div>

			<div class="pagination-links" id="group-invite-pag-top">

				<?php bp_group_invite_pagination_links(); ?>

			</div>

		</div>

		<?php /* The ID 'friend-list' is important for AJAX support. */ ?>
		<ul id="friend-list" class="item-list list-group col-xs-12">

		<?php while ( bp_group_invites() ) : bp_group_the_invite(); ?>

			<li class = "list-group-item col-xs-12" style = "box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3); margin : 3px;" id="<?php bp_group_invite_item_id(); ?>">
				<div class="col-xs-12 col-md-10">
					<a  class = "col-xs-12 col-md-1" style = "margin-top : 15px" href="<?php bp_group_member_domain(); ?>">

						<?php bp_group_invite_user_avatar(); ?>

					</a>
					<h3 class = "col-xs-12 col-md-10" ><?php bp_group_invite_user_link(); ?></h3 >
					
				</div>
				<div class="action col-xs-12 col-md-2">
					<a class="button remove" href="<?php bp_group_invite_user_remove_invite_url(); ?>" id="<?php bp_group_invite_item_id(); ?>"><?php _e( 'Remove Invite', 'buddypress' ); ?></a>

					<?php do_action( 'bp_group_send_invites_item_action' ); ?>
				</div>

				<h4></h4>
				<small class="activity col-xs-12"><?php bp_group_invite_user_last_active(); ?></small>

				<?php do_action( 'bp_group_send_invites_item' ); ?>

				
			</li>

		<?php endwhile; ?>

		</ul><!-- #friend-list -->

		<div id="pag-bottom" class="pagination col-xs-12">

			<div class="pag-count" id="group-invite-count-bottom">

				<?php bp_group_invite_pagination_count(); ?>

			</div>

			<div class="pagination-links" id="group-invite-pag-bottom">

				<?php bp_group_invite_pagination_links(); ?>

			</div>

		</div>

	<?php else : ?>

		<div id="message" class="info">
			<p><?php _e( 'Select friends to invite.', 'buddypress' ); ?></p>
		</div>

	<?php endif; ?>

<?php do_action( 'bp_after_group_send_invites_list' ); ?>

</div><!-- .main-column -->

<div class="submit" style = "margin-bottom : 20px;">
	<input type="submit" name="submit" id="submit" value="<?php esc_attr_e( 'Send Invites', 'buddypress' ); ?>" />
</div>

<?php wp_nonce_field( 'groups_send_invites', '_wpnonce_send_invites' ); ?>
