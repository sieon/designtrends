<?php
/**
 * Check and setup theme's default settings
 *
 * @package leantheme
 *
 */

if ( ! function_exists( 'leantheme_setup_theme_default_settings' ) ) :
	function leantheme_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$leantheme_posts_index_style = get_theme_mod( 'leantheme_posts_index_style' );
		if ( '' == $leantheme_posts_index_style ) {
			set_theme_mod( 'leantheme_posts_index_style', 'default' );
		}

		// Sidebar position.
		$leantheme_sidebar_position = get_theme_mod( 'leantheme_sidebar_position' );
		if ( '' == $leantheme_sidebar_position ) {
			set_theme_mod( 'leantheme_sidebar_position', 'right' );
		}

		// Container width.
		$leantheme_container_type = get_theme_mod( 'leantheme_container_type' );
		if ( '' == $leantheme_container_type ) {
			set_theme_mod( 'leantheme_container_type', 'container' );
		}
	}
endif;
