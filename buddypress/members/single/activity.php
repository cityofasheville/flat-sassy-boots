<?php

/**
 * BuddyPress - Users Activity
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<div class = "col-xs-12 visible-md-block visible-lg-block" style = "margin-top : 10px">
	<div class="item-list-tabs no-ajax dropdown" style = "width : 100%" id="subnav" role="navigation">
		<ul class = "nav nav-tabs">
			<?php bp_get_options_nav(); ?>
		</ul>
	</div><!-- .item-list-tabs -->
</div>
<div class = "col-xs-12 visible-xs-block visible-sm-block" style = "margin-top : 10px">
	<div class="item-list-tabs no-ajax dropdown" style = "width : 100%" id="subnav" role="navigation">
		<button class="btn btn-default dropdown-toggle" style = "width : 100%; text-align : left" type="button" id="activitysingledropdown" data-toggle="dropdown" aria-expanded="true">   
	    <h5>Activity Menu <i class="fa fa-chevron-down pull-right"></i></h5>
	  </button>
		<ul class = "dropdown-menu" aria-labelledby="activitysingledropdown" style = "width : 100%">
			<?php bp_get_options_nav(); ?>
		</ul>
	</div><!-- .item-list-tabs -->
</div>

<div class="col-xs-12" style = "margin-top : 20px">
	<h2 class = "text-info">Activity</h2>
	<label for="activity-filter-by"><?php _e( 'Show:', 'buddypress' ); ?></label>
	<select id="activity-filter-by">
		<option value="-1"><?php _e( '&mdash; Everything &mdash;', 'buddypress' ); ?></option>

		<?php bp_activity_show_filters(); ?>

		<?php do_action( 'bp_member_activity_filter_options' ); ?>

	</select>
</div>
<?php do_action( 'bp_before_member_activity_post_form' ); ?>

<?php
if ( is_user_logged_in() && bp_is_my_profile() && ( !bp_current_action() || bp_is_current_action( 'just-me' ) ) )
	bp_get_template_part( 'activity/post-form' );

do_action( 'bp_after_member_activity_post_form' );
do_action( 'bp_before_member_activity_content' ); ?>

<div class="activity" role="main">

	<?php bp_get_template_part( 'activity/activity-loop' ) ?>

</div><!-- .activity -->

<?php do_action( 'bp_after_member_activity_content' ); ?>
