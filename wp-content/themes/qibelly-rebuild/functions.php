<?php
/**
 * qibelly-rebuild functions and definitions
 *
 * @package qibelly-rebuild
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'qibelly_rebuild_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function qibelly_rebuild_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on qibelly-rebuild, use a find and replace
	 * to change 'qibelly-rebuild' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'qibelly-rebuild', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'qibelly-rebuild' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'qibelly_rebuild_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // qibelly_rebuild_setup
add_action( 'after_setup_theme', 'qibelly_rebuild_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function qibelly_rebuild_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'qibelly-rebuild' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'qibelly_rebuild_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function qibelly_rebuild_scripts() {
	wp_enqueue_style( 'qibelly-rebuild-style', get_stylesheet_uri() );

	wp_enqueue_script( 'qibelly-rebuild-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'qibelly-rebuild-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qibelly_rebuild_scripts' );

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


//add testimonitals
function qib_testimonials_init() {
  $labels = array(
    'name' => _x('Testimonials', 'testimonials'),
    'singular_name' => _x('Testimonial', 'testimonial'),
    'add_new' => _x('Add New', 'testimonial'),
    'add_new_item' => __('Add New Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'all_items' => __('All Testimonials'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Search Testimonials'),
    'not_found' =>  __('No Testimonials found'),
    'not_found_in_trash' => __('No Testimonials found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Testimonials'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
  ); 
  register_post_type('testimonial',$args);
}
add_action( 'init', 'qib_testimonials_init' );

//add classes
function qib_classes_init() {
  $labels = array(
    'name' => _x('Classes', 'classes'),
    'singular_name' => _x('Class', 'class'),
    'add_new' => _x('Add New', 'class'),
    'add_new_item' => __('Add New Class'),
    'edit_item' => __('Edit Class'),
    'new_item' => __('New Class'),
    'all_items' => __('All Classes'),
    'view_item' => __('View Class'),
    'search_items' => __('Search Classes'),
    'not_found' =>  __('No Classes found'),
    'not_found_in_trash' => __('No Classes found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Classes'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    'taxonomies' => array('category')//, 'post_tag')
  ); 
  register_post_type('class',$args);
}
add_action( 'init', 'qib_classes_init' );


//add Biography
//function qib_biographies_init() {
//  $labels = array(
//    'name' => _x('Biographies', 'biographies'),
//    'singular_name' => _x('Biography', 'biography'),
//    'add_new' => _x('Add New', 'biography'),
//    'add_new_item' => __('Add New Biography'),
//    'edit_item' => __('Edit Biography'),
//    'new_item' => __('New Biography'),
//    'all_items' => __('All Biography'),
//    'view_item' => __('View Biography'),
//    'search_items' => __('Search Biographies'),
//    'not_found' =>  __('No Biographies found'),
//    'not_found_in_trash' => __('No Biographies found in Trash'), 
//    'parent_item_colon' => '',
//    'menu_name' => 'Biographies'
//
//  );
//  $args = array(
//    'labels' => $labels,
//    'public' => true,
//    'publicly_queryable' => true,
//    'show_ui' => true, 
//    'show_in_menu' => true, 
//    'query_var' => true,
//    'rewrite' => true,
//    'capability_type' => 'post',
//    'has_archive' => true, 
//    'hierarchical' => false,
//    'menu_position' => null,
//    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
//  ); 
//  register_post_type('biography',$args);
//}
//add_action( 'init', 'qib_biographies_init' );

//add lineage
function qib_lineages_and_training_init() {
  $labels = array(
    'name' => _x('Lineages & Training', 'lineages-training'),
    'singular_name' => _x('Lineage & Training', 'lineage-training'),
    'add_new' => _x('Add New', 'lineage-training'),
    'add_new_item' => __('Add New Lineage & Training'),
    'edit_item' => __('Edit Lineage & Training'),
    'new_item' => __('New Lineage & Training'),
    'all_items' => __('All Lineages & Training'),
    'view_item' => __('View Lineage & Training'),
    'search_items' => __('Search Lineages & Training'),
    'not_found' =>  __('No Lineages & Training found'),
    'not_found_in_trash' => __('No Lineages  & Training found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Lineages & Training'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'taxonomies' => array('category')//, 'post_tag')
  ); 
  register_post_type('lineage-training',$args);
}
add_action( 'init', 'qib_lineages_and_training_init' );

//add location
function qib_locations_init() {
  $labels = array(
    'name' => _x('Locations', 'locations'),
    'singular_name' => _x('Location', 'location'),
    'add_new' => _x('Add New', 'location'),
    'add_new_item' => __('Add New Location'),
    'edit_item' => __('Edit Location'),
    'new_item' => __('New Location'),
    'all_items' => __('All Location'),
    'view_item' => __('View Location'),
    'search_items' => __('Search Locations'),
    'not_found' =>  __('No Locations found'),
    'not_found_in_trash' => __('No Locations found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Locations'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields' ),
    'taxonomies' => array('category')//, 'post_tag')
  ); 
  register_post_type('location',$args);
}
add_action( 'init', 'qib_locations_init' );

//add discipline
//function qib_disciplines_init() {
//  $labels = array(
//    'name' => _x('Disciplines', 'disciplines'),
//    'singular_name' => _x('Discipline', 'discipline'),
//    'add_new' => _x('Add New', 'discipline'),
//    'add_new_item' => __('Add New Discipline'),
//    'edit_item' => __('Edit Discipline'),
//    'new_item' => __('New Discipline'),
//    'all_items' => __('All Discipline'),
//    'view_item' => __('View Discipline'),
//    'search_items' => __('Search Disciplines'),
//    'not_found' =>  __('No Disciplines found'),
//    'not_found_in_trash' => __('No Disciplines found in Trash'), 
//    'parent_item_colon' => '',
//    'menu_name' => 'Disciplines'
//
//  );
//  $args = array(
//    'labels' => $labels,
//    'public' => true,
//    'publicly_queryable' => true,
//    'show_ui' => true, 
//    'show_in_menu' => true, 
//    'query_var' => true,
//    'rewrite' => true,
//    'capability_type' => 'post',
//    'has_archive' => true, 
//    'hierarchical' => false,
//    'menu_position' => null,
//    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
//    'taxonomies' => array('category', 'post_tag')
//  ); 
//  register_post_type('discipline',$args);
//}
//add_action( 'init', 'qib_disciplines_init' );

//add faq
function qib_faqs_init() {
  $labels = array(
    'name' => _x('FAQs', 'faqs'),
    'singular_name' => _x('FAQ', 'faq'),
    'add_new' => _x('Add New', 'faq'),
    'add_new_item' => __('Add New FAQ'),
    'edit_item' => __('Edit FAQ'),
    'new_item' => __('New FAQ'),
    'all_items' => __('All FAQ'),
    'view_item' => __('View FAQ'),
    'search_items' => __('Search FAQs'),
    'not_found' =>  __('No FAQs found'),
    'not_found_in_trash' => __('No FAQs found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'FAQs'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 
  register_post_type('faq',$args);
}
add_action( 'init', 'qib_faqs_init' );

//add faq
function qib_videos_init() {
  $labels = array(
    'name' => _x('Videos', 'videos'),
    'singular_name' => _x('Video', 'video'),
    'add_new' => _x('Add New', 'video'),
    'add_new_item' => __('Add New Video'),
    'edit_item' => __('Edit Video'),
    'new_item' => __('New Video'),
    'all_items' => __('All Video'),
    'view_item' => __('View Video'),
    'search_items' => __('Search Videos'),
    'not_found' =>  __('No Videos found'),
    'not_found_in_trash' => __('No Videos found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Videos'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 
  register_post_type('video',$args);
}
add_action( 'init', 'qib_videos_init' );