<?php
/**
 * Whistler Digital Theme Customizer
 *
 * @package Whistler_Digital
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function whistlerdigital_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'whistlerdigital_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'whistlerdigital_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'whistlerdigital_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function whistlerdigital_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function whistlerdigital_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whistlerdigital_customize_preview_js() {
	wp_enqueue_script( 'whistlerdigital_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'whistlerdigital_customize_preview_js' );

// add new section
$wp_customize->add_section( 'whistlerdigital_theme_colors', array(
	'title' => __( 'Typography Colours', 'whistlerdigital' ),
	'priority' => 100,
) );

// add color picker setting
$wp_customize->add_setting( 'link_color', array(
	'default' => '#404040'
) );

// add color picker setting
$wp_customize->add_setting( 'body_color', array(
	'default' => '#404040'
) );

// add link picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label' => 'Link Color',
	'section' => 'whistlerdigital_theme_colors',
	'settings' => 'link_color',
) ) );

// add body picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_color', array(
	'label' => 'Body Color',
	'section' => 'whistlerdigital_theme_colors',
	'settings' => 'body_color',
) ) );

function whistlerdigital_customizer_head_styles() {
	$link_color = get_theme_mod( 'link_color' );
	$body_color = get_theme_mod( 'body_color' );

	if ( $link_color != '#404040' ) :
	?>
		<style type="text/css">
			a {
				color: <?php echo $link_color; ?>;
			}
			.main-navigation a::after {
				background: <?php echo $link_color; ?>;
			}
			.main-navigation .current_page_item a, .main-navigation .current-menu-item a, .main-navigation .current_page_ancestor a, .main-navigation .current-menu-ancestor a {
				border-bottom: 2px solid <?php echo $link_color; ?>;
			}
			.social-links-menu svg {
				fill: <?php echo $link_color; ?>;
			}
		</style>
	<?php
	endif;
	if ( $body_color != '#404040' ) :
	?>
		<style type="text/css">
			body {
				color: <?php echo $body_color; ?>;
			}
		</style>
	<?php
	endif;
}
add_action( 'wp_head', 'whistlerdigital_customizer_head_styles' );
