<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jrwd_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/jrwd
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'jrwd' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jrwd' );

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

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'jrwd' ),
			'social' => __( 'Social Links Menu', 'jrwd' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo', array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'blog',
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'jrwd' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'websites',
					'logos',
					'page_blog',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'jrwd' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
					'link_linkedin',
				),
			),
		),
    );
    
   $starter_content = apply_filters( 'jrwd_starter_content', $starter_content );

   add_theme_support( 'starter-content', $starter_content );

}
add_action( 'after_setup_theme', 'jrwd_setup' );

function jrwd_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'jrwd' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'jrwd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'jrwd' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'jrwd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

if( !is_admin() ) {
	wp_enqueue_script( 'reveal_js', get_template_directory_uri() . '/scripts/scrollreveal.min.js', array ( ), 1.1, true);
	wp_enqueue_script( 'parallax_js', get_template_directory_uri() . '/scripts/parallax.min.js', array ( ), 1.1, true);
	wp_enqueue_script( 'jason_js', get_template_directory_uri() . '/scripts/jason.js', array ( 'jquery' ), 1.1, true);

	wp_enqueue_style( 'main_style', get_template_directory_uri() . '/style.css', array ( ), 1.7);
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:700,600,300|Ubuntu:700,600,300|Roboto:500,700,300');
	wp_enqueue_style( 'wpb-fa', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css' );

	add_action( 'main_style', 'reveal_js', 'parallax_js', 'site_js', 'fonts', 'wpb-fa' );
}
add_action( 'widgets_init', 'jrwd_widgets_init' );
remove_action( 'wp_head', '_wp_render_title_tag', 1 );
