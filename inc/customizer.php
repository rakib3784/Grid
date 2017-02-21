<?php
/**
 * Grid Theme Customizer
 *
 * @package Grid
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function grid_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Footer Customization */
	 $wp_customize->add_section( 'footer_section' , array(
	    	'title'      => __( 'Footer Settings', 'grid' ),
	    	'priority'   => 30,
		) );
	  $wp_customize->add_setting( 'footer_user',array('sanitize_callback'	=> 'esc_attr'));
	  $wp_customize->add_setting( 'footer_url',array('sanitize_callback'	=> 'esc_attr'));


	  $wp_customize->add_control(	'footer_user', 
			array(
				'label'    => __( 'Name of Company', 'grid' ),
				'section'  => 'footer_section',
				'settings' => 'footer_user',
				'type'     => 'text'
			)
		);

	  $wp_customize->add_control(	'footer_url', 
			array(
				'label'    => __( 'URL of Company', 'grid' ),
				'section'  => 'footer_section',
				'settings' => 'footer_url',
				'type'     => 'text'
			)
		);

}
add_action( 'customize_register', 'grid_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function grid_customize_preview_js() {
	wp_enqueue_script( 'grid_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'grid_customize_preview_js' );
