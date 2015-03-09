<?php

/**
 * BuddyPress - Users Profile
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<!-- <div class="col-xs-12 col-md-6" style = "margin-top : 20px">
	<div class="item-list-tabs no-ajax dropdown" style = "width : 100%" id="subnav" role="navigation">
		<button class="btn btn-default dropdown-toggle" style = "width : 100%; text-align : left" type="button" id="profilesingledropdown" data-toggle="dropdown" aria-expanded="true">   
	    <h5>Profile Menu <i class="fa fa-chevron-down pull-right"></i></h5>
	  </button>
		<ul class = "dropdown-menu" aria-labelledby="profilesingledropdown" style = "width : 100%">
			<?php bp_get_options_nav(); ?>
		</ul>
	</div>
</div> -->
<?php do_action( 'bp_before_profile_content' ); ?>

<div class="profile col-xs-12 well" style = "margin-top : 20px" role="main">

<?php switch ( bp_current_action() ) :

	// Edit
	case 'edit'   :
		bp_get_template_part( 'members/single/profile/edit' );
		break;

	// Change Avatar
	case 'change-avatar' :
		bp_get_template_part( 'members/single/profile/change-avatar' );
		break;

	// Compose
	case 'public' :

		// Display XProfile
		if ( bp_is_active( 'xprofile' ) )
			bp_get_template_part( 'members/single/profile/profile-loop' );

		// Display WordPress profile (fallback)
		else
			bp_get_template_part( 'members/single/profile/profile-wp' );

		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch; ?>
</div><!-- .profile -->

<?php do_action( 'bp_after_profile_content' ); ?>