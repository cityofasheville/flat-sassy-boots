<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Flat Sassy Boots
 */

if ( ! function_exists( 'the_posts_navigation_flat_sassy_boots' ) ) :

	function the_posts_navigation_flat_sassy_boots() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 2,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( 'Previous', 'flat-sassy-boots' ),
			'next_text' => __( 'Next', 'flat-sassy-boots' ),
	    'type'      => 'list',
		) );

		if ( $links ) :

		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'flat-sassy-boots' ); ?></h1>
				<?php echo $links; ?>
		</nav><!-- .navigation -->
		<?php
		endif;
	}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation col-xs-12" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'flat-sassy-boots' ); ?></h2>
			<div class="nav-links"> 
				<?php
					//previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . _x( 'Previous Post:', 'Previous post', 'flat-sassy-boots' ) . '</div><h1>%link</h1><i class="fa fa-arrow-left"></i></div>', '%title' );
					//next_post_link(     '<div class="nav-next"><div class="nav-indicator">' . _x( 'Next Post:', 'Next post', 'flat-sassy-boots' ) . '</div><h1>%link</h1><i class="fa fa-arrow-right"></i></div>', '%title' );
					previous_post_link( '<div class="nav-previous"><strong>%link</strong></div>', '%title' );
					next_post_link( '<div class="nav-next"><strong>%link</strong></div>', '%title' );
				?>
			</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'flat_sassy_boots_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function flat_sassy_boots_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'flat-sassy-boots' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'flat-sassy-boots' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'flat_sassy_boots_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function flat_sassy_boots_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'flat-sassy-boots' ) );


		if ( $categories_list && flat_sassy_boots_categorized_blog() ) {
			printf( '<div class="category-list">' . __( 'Posted in %1$s', 'flat-sassy-boots' ) . '</div>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '<ul><li><i class="fa fa-tag"></i> ', '</li><li><i class="fa fa-tag"></i> ', '</li></ul>');
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'flat-sassy-boots' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'flat-sassy-boots' ), __( '1 Comment', 'flat-sassy-boots' ), __( '% Comments', 'flat-sassy-boots' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'flat-sassy-boots' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'flat-sassy-boots' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'flat-sassy-boots' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'flat-sassy-boots' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'flat-sassy-boots' ), get_the_date( _x( 'Y', 'yearly archives date format', 'flat-sassy-boots' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'flat-sassy-boots' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'flat-sassy-boots' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'flat-sassy-boots' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'flat-sassy-boots' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'flat-sassy-boots' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'flat-sassy-boots' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'flat-sassy-boots' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'flat-sassy-boots' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'flat-sassy-boots' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'flat-sassy-boots' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'flat-sassy-boots' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'flat-sassy-boots' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'flat-sassy-boots' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'flat-sassy-boots' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'flat-sassy-boots' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'flat-sassy-boots' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function flat_sassy_boots_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'flat_sassy_boots_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'flat_sassy_boots_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so flat_sassy_boots_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so flat_sassy_boots_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in flat_sassy_boots_categorized_blog.
 */
function flat_sassy_boots_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'flat_sassy_boots_categories' );
}
add_action( 'edit_category', 'flat_sassy_boots_category_transient_flusher' );
add_action( 'save_post',     'flat_sassy_boots_category_transient_flusher' );


function flat_sassy_boots_navbar_right_menu(){
	if ( has_nav_menu( 'navbar-right' ) ) {
		wp_nav_menu(
			array(
				'menu'              => 'navbar-right',
        'theme_location'    => 'navbar-right',
        'depth'             => 1,
        'container'         => 'ul',
        'container_class'   => 'nav navbar-nav navbar-right',
				'container_id'      => 'bs-navbar-right',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()
			)
		);
  }
}

function flat_sassy_boots_bp_directory_groups_search_form() {
	$default_search_value = bp_get_search_default_text( 'groups' );
	$search_value         = !empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : $default_search_value;

	$search_form_html = '<form action="" method="get" id="search-groups-form">
		 <div class="input-group">
      <input class = "form-control" type="text" name="s" id="groups_search" placeholder="'. esc_attr( $search_value ) .'" />      <span class="input-group-btn">
        <input type="submit" id="groups_search_submit" name="groups_search_submit" value="'. __( 'Search', 'buddypress' ) .'">
      </span>
    </div>
	</form>';

	echo apply_filters( 'bp_directory_groups_search_form', $search_form_html );

}

function flat_sassy_boots_bp_directory_members_search_form() {

	$default_search_value = bp_get_search_default_text( 'members' );
	$search_value         = !empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : $default_search_value;

	$search_form_html = '<form action="" method="get" id="search-members-form">
		<div class="input-group">
      <input class = "form-control" type="text" name="s" id="members_search" placeholder="'. esc_attr( $search_value ) .'" />      <span class="input-group-btn">
        <input type="submit" id="members_search_submit" name="groups_search_submit" value="'. __( 'Search', 'buddypress' ) .'"/>
      </span>
    </div>
	</form>';

	/**
	 * Filters the Members component search form.
	 *
	 * @since BuddyPress (1.9.0)
	 *
	 * @param string $search_form_html HTML markup for the member search form.
	 */
	echo apply_filters( 'bp_directory_members_search_form', $search_form_html );
}




/**
 * Output the Group members template
 *
 * @since BuddyPress (?)
 *
 * @return string html output
 */
function flat_sassy_boots_bp_groups_members_template_part() {
	?>
	<div class="item-list-tabs col-xs-12" style = "margin-top : 20px;" id="subnav" role="navigation">
		<ul>
			<li class="groups-members-search" role="search">
				<?php flat_sassy_boots_bp_directory_members_search_form(); ?>
			</li>

			<?php bp_groups_members_filter(); ?>
			<?php do_action( 'bp_members_directory_member_sub_types' ); ?>

		</ul>
	</div>

	<div id="members-group-list" class="group_members dir-list">

		<?php bp_get_template_part( 'groups/single/members' ); ?>

	</div>
	<?php
}
