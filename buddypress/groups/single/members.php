<?php if ( bp_group_has_members( bp_ajax_querystring( 'group_members' ) ) ) : ?>

	<?php do_action( 'bp_before_group_members_content' ); ?>

	

	<div id="pag-top" class="pagination col-xs-12">

		<div class="pag-count" id="member-count-top">

			<small><?php bp_members_pagination_count(); ?></small>

		</div>

		<div class="pagination-links" id="member-pag-top">

			<small><?php bp_members_pagination_links(); ?></small>

		</div>

	</div>

	<?php do_action( 'bp_before_group_members_list' ); ?>

	<ul id="member-list" class="item-list list-group col-xs-12" role="main">

		<?php while ( bp_group_members() ) : bp_group_the_member(); ?>

			<li class = "list-group-item col-xs-12" style = "box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3); margin : 3px;">
				<div class="col-xs-12 col-md-10">
					<a  class = "col-xs-12 col-md-1" style = "margin-top : 15px" href="<?php bp_group_member_domain(); ?>">

						<?php bp_group_member_avatar_thumb(); ?>

					</a>
					<h3 class = "col-xs-12 col-md-10" ><?php bp_group_member_link(); ?></h3 >
					
				</div>
				<?php if ( bp_is_active( 'friends' ) ) : ?>

					<div class="action col-xs-12 col-md-2">

						<?php bp_add_friend_button( bp_get_group_member_id(), bp_get_group_member_is_friend() ); ?>

						<?php do_action( 'bp_group_members_list_item_action' ); ?>

					</div>

				<?php endif; ?>

				
				<small class="activity col-xs-12"><?php bp_group_member_joined_since(); ?></small>

				<?php do_action( 'bp_group_members_list_item' ); ?>

				
			</li>

		<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_group_members_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="member-count-bottom">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_after_group_members_content' ); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'No members were found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>
