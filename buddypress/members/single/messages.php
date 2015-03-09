<?php

/**
 * BuddyPress - Users Messages
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div class="item-list-tabs no-ajax col-xs-12 col-md-2" id="subnav" role="navigation">



	<div class="item-list-tabs no-ajax dropdown visible-xs-block visible-sm-block" style = "width : 100%; margin-bottom : 20px; margin-top : 20px" id="subnav" role="navigation">
		<button class="btn btn-default dropdown-toggle" style = "width : 100%; text-align : left" type="button" id="messagedropdown" data-toggle="dropdown" aria-expanded="true">   
	    <h5>Messages Menu <i class="fa fa-chevron-down pull-right"></i></h5>
	  </button>
		<ul class = "dropdown-menu" aria-labelledby="messagedropdown" style = "width : 100%">
			<?php bp_get_options_nav(); ?>
		</ul>
	</div>

	<div class="col-xs-12 visible-md-block visible-lg-block" style = "margin-top : 25px">
		<ul class="list-group">
			<?php bp_get_options_nav(); ?>
		</ul>
	</div>
	



</div><!-- .item-list-tabs -->

<?php
switch ( bp_current_action() ) :

	// Inbox/Sentbox
	case 'inbox'   :
		do_action( 'bp_before_member_messages_content' ); ?>

		<div class="messages col-sm-12 col-md-9" role="main">
			<h3 class="text-info">Inbox</h3>
			<div class="message-search"><?php flat_sassy_boots_bp_message_search_form(); ?></div>
			<?php bp_get_template_part( 'members/single/messages/messages-loop' ); ?>
		</div><!-- .messages -->

		<?php do_action( 'bp_after_member_messages_content' );
		break;
	case 'sentbox' :
		do_action( 'bp_before_member_messages_content' ); ?>

		<div class="messages col-sm-12 col-md-9" role="main">
			<h3 class="text-info">Sent Items</h3>
			<div class="message-search"><?php flat_sassy_boots_bp_message_search_form(); ?></div>
			<?php bp_get_template_part( 'members/single/messages/messages-loop' ); ?>
		</div><!-- .messages -->

		<?php do_action( 'bp_after_member_messages_content' );
		break;

	// Single Message View
	case 'view' :
		bp_get_template_part( 'members/single/messages/single' );
		break;

	// Compose
	case 'compose' :
		bp_get_template_part( 'members/single/messages/compose' );
		break;

	// Sitewide Notices
	case 'notices' :
		do_action( 'bp_before_member_messages_content' ); ?>

		<div class="messages" role="main">
			<?php bp_get_template_part( 'members/single/messages/notices-loop' ); ?>
		</div><!-- .messages -->

		<?php do_action( 'bp_after_member_messages_content' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
