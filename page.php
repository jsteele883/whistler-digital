<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Whistler_Digital
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
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
<?php
get_sidebar();
get_footer();
