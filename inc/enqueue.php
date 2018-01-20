<?php
/**
 * Agency enqueue scripts
 *
 * @package agency
 */


/**
 * Register custom fonts.
 */
function agency_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Montserrat, Kaushan Script, Droid Serif, Roboto Slab translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'agency' );
	$kaushan_script = _x( 'on', 'Kaushan Script font: on or off', 'agency' );
	$droid_serif = _x( 'on', 'Droid Serif font: on or off', 'agency' );
	$roboto_slab = _x( 'on', 'Roboto Slab font: on or off', 'agency' );

	$font_families = array();

	if ( 'off' !== $montserrat ) {
		$font_families[] = 'Montserrat:400,700';
	}

	if ( 'off' !== $kaushan_script ) {
		$font_families[] = 'Kaushan Script';
	}

	if ( 'off' !== $droid_serif ) {
		$font_families[] = 'Droid Serif:400,700,400italic,700italic';
	}

	if ( 'off' !== $roboto_slab ) {
		$font_families[] = 'Roboto Slab:400,100,300,700';
	}


	if ( in_array( 'on', array($montserrat, $kaushan_script, $droid_serif, $roboto_slab) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function agency_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'agency-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'agency_resource_hints', 10, 2 );

if ( ! function_exists( 'agency_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */

		function agency_scripts() {
			// Get the theme data.
			$the_theme = wp_get_theme();

			// Enqueue Google Fonts required for the theme
			wp_enqueue_style( 'agency-fonts', agency_fonts_url() );
			
//			wp_enqueue_style( 'animate-styles', get_stylesheet_directory_uri() . '/css/animate.min.css', array(), '3.5.1', false  );
			wp_enqueue_style( 'agency-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $the_theme->get( 'Version' ), false );

			wp_enqueue_script( 'jquery');

//			wp_enqueue_script( 'agency-isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '2.0.1', true );
//			wp_enqueue_script( 'agency-imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '3.1.8', true );
//			wp_enqueue_script('agency-modernizr-script', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), '2.6.2', false);

//			wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
			wp_enqueue_script( 'agency-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );

			wp_enqueue_script('agency-custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

} // endif function_exists( 'agency_scripts' ).

add_action( 'wp_enqueue_scripts', 'agency_scripts' );


