<form action="" method="post" id="notifications-bulk-management">
	<table class="notifications table table-striped">
		<thead>
			<tr class = "info">
				<th class="icon"></th>
				<th ><input id="select-all-notifications" type="checkbox" style = "margin-right : 2px"></th>
				<th class="title"><?php _e( 'Notification', 'buddypress' ); ?></th>
				<th class="date"><?php _e( 'Date Received', 'buddypress' ); ?></th>
			</tr>
		</thead>

		<tbody>

			<?php while ( bp_the_notifications() ) : bp_the_notification(); ?>

				<tr>
					<td></td>
					<td><input id="<?php bp_the_notification_id(); ?>" type="checkbox" name="notifications[]" value="<?php bp_the_notification_id(); ?>" class="notification-check"></td>
					<td><?php bp_the_notification_description();  ?></td>
					<td><?php bp_the_notification_time_since();   ?></td>
				</tr>

			<?php endwhile; ?>

		</tbody>
	</table>

	<div class="notifications-options-nav" style = "margin-bottom : 20px">
		<?php bp_notifications_bulk_management_dropdown(); ?>
	</div><!-- .notifications-options-nav -->

	<?php wp_nonce_field( 'notifications_bulk_nonce', 'notifications_bulk_nonce' ); ?>
</form>
