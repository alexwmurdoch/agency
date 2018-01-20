<?php
/**
 * Check and setup theme's default settings
 *
 * @package agency
 *
 */

if ( ! function_exists( 'agency_setup_theme_default_settings' ) ) :
	function agency_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$agency_posts_index_style = get_theme_mod( 'agency_posts_index_style' );
		if ( '' == $agency_posts_index_style ) {
			set_theme_mod( 'agency_posts_index_style', 'default' );
		}

		// Sidebar position.
		$agency_sidebar_position = get_theme_mod( 'agency_sidebar_position' );
		if ( '' == $agency_sidebar_position ) {
			set_theme_mod( 'agency_sidebar_position', 'right' );
		}

		// Container width.
		$agency_container_type = get_theme_mod( 'agency_container_type' );
		if ( '' == $agency_container_type ) {
			set_theme_mod( 'agency_container_type', 'container' );
		}
	}
endif;
