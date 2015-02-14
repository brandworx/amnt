<?php
/**
 * tim functions and definitions
 *
 * @package tim
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tim_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tim_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tim, use a find and replace
	 * to change 'tim' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tim', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tim' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tim_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // tim_setup
add_action( 'after_setup_theme', 'tim_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tim_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tim' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Bar', 'tim' ),
		'id'            => 'footer-bar',
		'description'   => '',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'tim' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'tim' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'tim' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'tim_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tim_scripts() {
	wp_enqueue_style( 'tim-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tim-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'tim-plax', get_template_directory_uri() . '/js/plax.js', array(), '1', true );

	wp_enqueue_script( 'tim-custom', get_template_directory_uri() . '/js/custom.js', array(), '1', true );

	wp_enqueue_script( 'tim-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tim_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


//Custom Thumbnail Sizes
add_image_size( 'slide-thumb', 1920, 750, true ); // (cropped)
add_image_size( 'testimonial-thumb', 400, 400, true ); // (cropped)
add_image_size( 'event-thumb', 600, 600, true ); // (cropped)


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home Settings',
		'menu_title'	=> 'Home Settings',
		'parent_slug'	=> 'theme-settings',
	));
	
}


function theme_settings_styles() {
	$videoBG = get_field('video_bg','option');
	$slideURL = $videoBG['url'];
	$pLax1 = get_field('parallax_1','option');
	$pLax2 = get_field('parallax_2','option');

    ?>
    <style type="text/css">
    	#featured { background: url("<?php echo $slideURL; ?>") no-repeat; background-size: 100%; }
    	#parallax-1 {
    		padding: 50px 0;
    		background: url("<?php echo $pLax1; ?>") 50% -230px no-repeat fixed;
    	}
    	#parallax-2 {
    		padding: 50px 0;
    		background: url("<?php echo $pLax2; ?>") 50% -230px no-repeat fixed;
    	}
	</style>
    <?php
}
add_action('wp_head', 'theme_settings_styles');
