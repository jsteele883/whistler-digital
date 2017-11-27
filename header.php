<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Whistler_Digital
 */

?><!doctype html>
<html <?php language_attributes(); ?> class="no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site" style="background: url(/wp-content/uploads/2017/11/triangle-bg-header.png);
		background-size: 100% auto;
    background-position: top;
    background-repeat: no-repeat;">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'whistlerdigital' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			 ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<div class="site-header__menus">
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'whistlerdigital' ); ?></button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<?php if ( is_front_page()) : ?>

			<?php
			/*
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'masthead-menu',
					'link_before'    => '<div class="masthead-menu__text">',
					'link_after'     => '</div>' . whistlerdigital_get_svg( array( 'icon' => 'wordpress' ) ),
				) );
				*/
			?>

		<div class="introduction" height="<?php echo esc_attr( get_custom_header()-> height); ?>">
			<div class="l-row">
	      <div class="l-col-3">
					<div class="masthead-menu masthead-menu__yellow">
						<div class="masthead-menu__icon">
							<?php echo whistlerdigital_get_svg( array( 'icon' => 'codepen', 'title' => __( 'code', 'textdomain' ) ) ); ?>
		        </div>
		        <div class="masthead-menu__text">
		          <h2>Web Development</h2>
		          <p>We will help you build the website of your dreams without blowing up your budget.</p>
		        </div>
					</div>
	      </div>
	      <div class="l-col-3">
					<div class="masthead-menu masthead-menu__orange">
		        <div class="masthead-menu__icon">
							<?php echo whistlerdigital_get_svg( array( 'icon' => 'chain', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
		        </div>
		        <div class="masthead-menu__text">
		          <h2>IT Consulting</h2>
		          <p>Let us build your IT platform for a worry-free experience, contact us for a quote!</p>
		        </div>
					</div>
	      </div>
	      <div class="l-col-3">
					<div class="masthead-menu masthead-menu__red">
		        <div class="masthead-menu__icon">
							<?php echo whistlerdigital_get_svg( array( 'icon' => 'hashtag', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
		        </div>
		        <div class="masthead-menu__text">
		          <h2>Marketing</h2>
		          <p>Maximise your potential revenue with the help of our email and social expertise</p>
		        </div>
					</div>
	      </div>
	    </div>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">
