<?php
/**
 * Leantheme Theme Customizer
 *
 * @package leantheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'leantheme_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function leantheme_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'leantheme_customize_register' );

if ( ! function_exists( 'leantheme_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function leantheme_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'leantheme_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'leantheme' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'leantheme' ),
			'priority'    => 160,
		) );

		 //select sanitization function
        function leantheme_theme_slug_sanitize_select( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }

		$wp_customize->add_setting( 'leantheme_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'leantheme_theme_slug_sanitize_select',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'leantheme_container_type', array(
					'label'       => __( 'Container Width', 'leantheme' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'leantheme' ),
					'section'     => 'leantheme_theme_layout_options',
					'settings'    => 'leantheme_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'leantheme' ),
						'container-fluid' => __( 'Full width container', 'leantheme' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'leantheme_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'leantheme_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'leantheme' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'leantheme' ),
					'section'     => 'leantheme_theme_layout_options',
					'settings'    => 'leantheme_sidebar_position',
					'type'        => 'select',
					'sanitize_callback' => 'leantheme_theme_slug_sanitize_select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'leantheme' ),
						'left'  => __( 'Left sidebar', 'leantheme' ),
						'both'  => __( 'Left & Right sidebars', 'leantheme' ),
						'none'  => __( 'No sidebar', 'leantheme' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'leantheme_theme_customize_register' ).
add_action( 'customize_register', 'leantheme_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'leantheme_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function leantheme_customize_preview_js() {
		wp_enqueue_script( 'leantheme_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'leantheme_customize_preview_js' );
