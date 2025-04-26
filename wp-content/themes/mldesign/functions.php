<?php
/**
 * MLDesign functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MLDesign
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	// define( '_S_VERSION', '1.0.0' );
	define( '_S_VERSION', '1.0.'.time() );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mldesign_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on MLDesign, use a find and replace
		* to change 'mldesign' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mldesign', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'mldesign' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mldesign_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mldesign_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mldesign_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mldesign_content_width', 640 );
}
add_action( 'after_setup_theme', 'mldesign_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mldesign_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mldesign' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mldesign' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mldesign_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mldesign_scripts() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', [], null);
    wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/css/hamburgers.min.css', [], _S_VERSION);
	wp_enqueue_style( 'mldesign-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', [], _S_VERSION);
    if( is_archive() ) {
        wp_enqueue_style( 'archive', get_template_directory_uri() . '/css/archive.css', [], _S_VERSION);
        if( is_post_type_archive('awards') ) {
            wp_enqueue_style( 'archive-awards', get_template_directory_uri() . '/css/archive-awards.css', [], _S_VERSION);
        }
        if( is_post_type_archive('insights') ) {
            wp_enqueue_style( 'archive-insights', get_template_directory_uri() . '/css/archive-insights.css', [], _S_VERSION);
        }
    }
    wp_enqueue_style( 'media-query', get_template_directory_uri() . '/css/media.css', [], _S_VERSION);
    if( is_archive() ) {
        wp_enqueue_style( 'archive-media-query', get_template_directory_uri() . '/css/archive-media.css', [], _S_VERSION);
    }

	wp_enqueue_script( 'jQuery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], null, true);
	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', [], null, true);
	wp_enqueue_script( 'mldesign-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );
    $total_posts = array();
    if( post_type_exists('works') && wp_count_posts('works')->publish > 0 ) {
        $total_posts['works'] = wp_count_posts('works')->publish;
    }
    if( post_type_exists('accomplishments') && wp_count_posts('accomplishments')->publish > 0 ) {
        $total_posts['accomplishments'] = wp_count_posts('accomplishments')->publish;
    }
    if( post_type_exists('insights') && wp_count_posts('insights')->publish > 0 ) {
        $total_posts['insights'] = wp_count_posts('insights')->publish;
    }
    if( post_type_exists('awards') && wp_count_posts('awards')->publish > 0 ) {
        $total_posts['awards'] = wp_count_posts('awards')->publish;
    }
    wp_localize_script( 'scripts', 'global', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('mldesign_global_nonce'),
        'get_posts' => $total_posts,
        'copyright_year' => date("Y"),
    ));
}
add_action( 'wp_enqueue_scripts', 'mldesign_scripts' );

function add_attributes_to_bootstrap($html, $handle) {
    if ('bootstrap-css' === $handle) {
        $integrity = 'sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC';
        $html = str_replace('/>', ' integrity="' . $integrity . '" crossorigin="anonymous" />', $html);
    }
    return $html;
}
add_filter('style_loader_tag', 'add_attributes_to_bootstrap', 10, 2);

function add_crossorigin_to_jquery($tag, $handle) {
    if ('jQuery' === $handle) {
        $integrity = 'sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=';
        return str_replace(' src', ' integrity="' . $integrity . '" crossorigin="anonymous" src', $tag);
    }
    else if ('bootstrap-js' === $handle) {
        $integrity = 'sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM';
        return str_replace(' src', ' integrity="' . $integrity . '" crossorigin="anonymous" src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_crossorigin_to_jquery', 10, 2);

function custom_awards_posts_per_page( $query ) {
    // Only modify the main query on the frontend
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'awards' ) ) {
        $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'custom_awards_posts_per_page' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/class-mld-custom-menu-walker.php';

function get_menu_item_count($location) {
    $locations = get_nav_menu_locations();
    
    if (isset($locations[$location])) {
        $menu_id = $locations[$location];
        
        $menu_items = wp_get_nav_menu_items($menu_id);
        
        return count($menu_items);
    }
    
    return 0;
}

function custom_footer_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Columns', 'mldesign' ),
        'id'            => 'footer-columns',
        'description'   => __( 'Add widgets here for the first footer column.', 'mldesign' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'custom_footer_widgets_init' );
