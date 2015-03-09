<?php do_action( 'bp_before_member_settings_template' ); ?>

<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/general'; ?>" method="post" class="standard-form" id="settings-form">

	<h3></h3>

	<?php wp_nonce_field( 'bp_settings_general' ); ?>

</form>

<?php do_action( 'bp_after_member_settings_template' ); ?>
