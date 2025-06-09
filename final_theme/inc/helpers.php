<?php
/**
 * Theme Helper Functions
 *
 * @package YourThemeName
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//
// 1. Trim excerpts to a specific word count
//
function yourthemename_trim_excerpt( $word_count = 40 ) {
	$excerpt = get_the_excerpt();
	$excerpt = wp_trim_words( $excerpt, $word_count, '...' );
	return $excerpt;
}

//
// 2. Display post meta information
//
function yourthemename_post_meta() {
	echo '<div class="post-meta">';
		echo '<span class="post-date"><i class="dashicons dashicons-calendar"></i> ' . esc_html( get_the_date() ) . '</span>';
		echo '<span class="post-author"><i class="dashicons dashicons-admin-users"></i> ' . esc_html( get_the_author() ) . '</span>';
		if ( has_category() ) {
			echo '<span class="post-categories"><i class="dashicons dashicons-category"></i> ' . get_the_category_list( ', ' ) . '</span>';
		}
		if ( comments_open() ) {
			echo '<span class="post-comments"><i class="dashicons dashicons-admin-comments"></i> ';
			comments_popup_link( 'No Comments', '1 Comment', '% Comments' );
			echo '</span>';
		}
	echo '</div>';
}

//
// 3. Check if post has thumbnail and fallback
//
function yourthemename_post_thumbnail( $size = 'medium' ) {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( $size );
	} else {
		echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/images/placeholder.png' ) . '" alt="' . esc_attr( get_the_title() ) . '" />';
	}
}

//
// 4. Custom pagination
//
function yourthemename_numeric_pagination() {
	if ( is_singular() ) return;

	global $wp_query;

	$total_pages = $wp_query->max_num_pages;
	if ( $total_pages <= 1 ) return;

	$current_page = max( 1, get_query_var( 'paged' ) );

	echo '<div class="pagination">';
	echo paginate_links( array(
		'base'      => get_pagenum_link( 1 ) . '%_%',
		'format'    => 'page/%#%/',
		'current'   => $current_page,
		'total'     => $total_pages,
		'prev_text' => '&laquo;',
		'next_text' => '&raquo;',
	) );
	echo '</div>';
}

//
// 5. Get post view count (using post meta)
//
function yourthemename_get_post_views( $postID ) {
	$count_key = 'yourthemename_post_views';
	$count = get_post_meta( $postID, $count_key, true );
	if ( $count === '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
		return '0 Views';
	}
	return $count . ' Views';
}

//
// 6. Set post view count (hook in single.php)
//
function yourthemename_set_post_views( $postID ) {
	$count_key = 'yourthemename_post_views';
	$count = get_post_meta( $postID, $count_key, true );
	if ( $count === '' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}
