<?php
/**
 * Tea Guys Theme Customizer
 *
 * @package tea_guys
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tea_guys_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'tea_guys_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'tea_guys_customize_partial_blogdescription',
		) );
	}

/**
 * panels
 */
$wp_customize -> add_panel('social_media_panel', array(
	'title' => esc_html__('Social Media', 'tea_guys'),
	'capability' => 'edit_theme_options'
));

/**
 * sections
 */
$wp_customize -> add_section('facebook', array(
	'title' => esc_html__('Facebook', 'tea_guys'),
	'capability' => 'edit_theme_options',
	'panel' => 'social_media_panel'
));

$wp_customize -> add_section('twitter', array(
	'title' => esc_html__('Twitter', 'tea_guys'),
	'capability' => 'edit_theme_options',
	'panel' => 'social_media_panel'
));

/**
 * settings
 */
$wp_customize -> add_setting('facebook_url', array(
	'transport' => 'refresh',
	'default' => '',
	'sanitize_callback' => 'esc_url_raw'
));

$wp_customize -> add_setting('twitter_url', array(
	'transport' => 'refresh',
	'default' => '',
	'sanitize_callback' => 'esc_url_raw'
));

/**
 * controls
 */
$wp_customize -> add_control('facebook_url', array(
	'label' => esc_html__('URL', 'tea_guys'),
	'description' => esc_html__('Add URL to display Facebook link', 'tea_guys'),
	'section' => 'facebook',
	'type' => 'input',
	'input_attrs' => array(
		'placeholder' => esc_html__('https://facebook.com', 'tea_guys'),
	)
));

$wp_customize -> add_control('twitter_url', array(
	'label' => esc_html__('URL', 'tea_guys'),
	'description' => esc_html__('Add URL to display Twitter link', 'tea_guys'),
	'section' => 'twitter',
	'type' => 'input',
	'input_attrs' => array(
		'placeholder' => esc_html__('https://twitter.com', 'tea_guys'),
	)
));

}
add_action( 'customize_register', 'tea_guys_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tea_guys_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tea_guys_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tea_guys_customize_preview_js() {
	wp_enqueue_script( 'tea_guys-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );

}

add_action( 'customize_preview_init', 'tea_guys_customize_preview_js' );

