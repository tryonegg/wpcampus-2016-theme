<?php

// Include files
require_once( STYLESHEETPATH . '/includes/filters.php' );
require_once( STYLESHEETPATH . '/includes/shortcodes.php' );

// Add <title> support
add_theme_support( 'title-tag' );

// This theme uses wp_nav_menu() in two locations.
/*register_nav_menus( array(
	'primary' => 'Primary Menu',
	'footer'  => 'Footer Menu',
) );*/

// Switch default core markup for search form, comment form, and comments to output valid HTML5
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );

// Register sidebars
add_action( 'widgets_init', 'wpcampus_2016_register_sidebars' );
function wpcampus_2016_register_sidebars() {

	// Register home sidebar
	register_sidebar( array(
		'name'			=> 'Home Sidebar',
		'id'			=> 'home-sidebar',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
	) );

	// Register main sidebar
	register_sidebar( array(
		'name'			=> 'Main Sidebar',
		'id'			=> 'main-sidebar',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
	) );

	// Register sponsors sidebar
	register_sidebar( array(
		'name'			=> 'Sponsors Sidebar',
		'id'			=> 'sponsors-sidebar',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
	) );

}

// Enqueues scripts and styles
add_action( 'wp_enqueue_scripts', 'wpcampus_2016_enqueue_scripts', 20 );
function wpcampus_2016_enqueue_scripts() {

	// Load Fonts
	wp_enqueue_style( 'wpcampus-2016-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:600,400,300' );

	// Add our theme stylesheet
	wp_enqueue_style( 'wpcampus-2016', get_template_directory_uri() . '/css/styles.css', array( 'wpcampus-2016-fonts' ), filemtime( get_template_directory() . '/css/styles.css' ) );

	// Add our theme script
	wp_enqueue_script( 'wpcampus-2016', get_template_directory_uri() . '/js/wpcampus-2016-min.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/wpcampus-2016-min.js' ) );

	// Add our home styles
	if ( is_front_page() ) {
		wp_enqueue_style( 'wpcampus-2016-home', get_template_directory_uri() . '/css/home.css', array( 'wpcampus-2016' ), filemtime( get_template_directory() . '/css/home.css' ) );
	}

}

// Load favicons
add_action( 'wp_head', 'wpcampus_2016_add_favicons' );
add_action( 'admin_head', 'wpcampus_2016_add_favicons' );
add_action( 'login_head', 'wpcampus_2016_add_favicons' );
function wpcampus_2016_add_favicons() {

	// Set the images folder
	$favicons_folder = get_stylesheet_directory_uri() . '/images/favicons/';

	// Print the default icons
	?><link rel="shortcut icon" href="<?php echo $favicons_folder; ?>wpcampus-favicon-60.png"/>
	<link rel="apple-touch-icon" href="<?php echo $favicons_folder; ?>wpcampus-favicon-60.png"/><?php

	// Set the image sizes
	$image_sizes = array( 57, 72, 76, 114, 120, 144, 152 );

	// Print favicons
	foreach( $image_sizes as $size ) {
		?><link rel="apple-touch-icon" sizes="<?php echo "{$size}x{$size}"; ?>" href="<?php echo $favicons_folder; ?>wpcampus-favicon-<?php echo $size; ?>.png"/><?php
	}

}

// Hide Query Monitor if admin bar isn't showing
add_filter( 'qm/process', 'wpcampus_2016_hide_query_monitor', 10, 2 );
function wpcampus_2016_hide_query_monitor( $show_qm, $is_admin_bar_showing ) {
	return $is_admin_bar_showing;
}


// Hero image settings

// add a few images sizes for the reponsive images
add_image_size( 'ipadp', 768);
add_image_size( 'ipadl', 1024);
add_image_size( 'laptop', 1440);
add_image_size( 'desktop', 1920);
add_theme_support( 'custom-header' );

//remove the max filter for sizeof
function remove_max_srcset_image_width( $max_width ) {
    return false;
}
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

function wpcampus_2016_register_theme_customizer( $wp_customize ) {

    //create our section
    $wp_customize->add_section(
        'wpcampus_2016_display_options',
        array(
            'title'     => 'Homepage Hero',
            'priority'  => 200
        )
    ); 

    // Homepage Hero settings


    $wp_customize->add_setting(
        'homepage_hero_image',
        array(
            'default'    =>  '',
            'transport'  =>  'postMessage'
        )
    );

    //register the conrols
    $wp_customize->add_control( 
        new WP_Customize_Media_Control( 
            $wp_customize, 
            'homepage_hero_image', 
            array(
               'label'      => __( 'Image', 'theme_name' ),
               'section'    => 'wpcampus_2016_display_options',
                'mime_type' => 'image',
            ) 
        ) 
    );    
    
}
add_action( 'customize_register', 'wpcampus_2016_register_theme_customizer' );