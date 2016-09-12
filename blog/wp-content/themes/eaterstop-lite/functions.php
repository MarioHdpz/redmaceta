<?php    
/**
 * Eaterstop Lite functions and definitions
 *
 * @package Eaterstop Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'eaterstop_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function eaterstop_lite_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'eaterstop-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header', array( 
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 62,
		'width'       => 290,
		'flex-height' => true,
	) );		
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'eaterstop-lite' ),
		'footer' => __( 'Footer Menu', 'eaterstop-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // eaterstop_lite_setup
add_action( 'after_setup_theme', 'eaterstop_lite_setup' );

function eaterstop_lite_widgets_init() { 	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'eaterstop-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'eaterstop-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
}
add_action( 'widgets_init', 'eaterstop_lite_widgets_init' );


function eaterstop_lite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','roboto:on or off','eaterstop-lite');	
		
		if('off' !== $roboto ){
			$font_family = array();			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function eaterstop_lite_scripts() {
	wp_enqueue_style('eaterstop-lite-font', eaterstop_lite_font_url(), array());
	wp_enqueue_style( 'eaterstop-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'eaterstop-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'eaterstop-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'eaterstop-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'eaterstop-lite-custom-js', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_style( 'animate', get_template_directory_uri()."/css/animation.css" );
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eaterstop_lite_scripts' );

function eaterstop_lite_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('eaterstop_lite_ie', get_template_directory_uri().'/css/ie.css', array('eaterstop_lite_style'));
	$wp_styles->add_data('eaterstop_lite_ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','eaterstop_lite_ie_stylesheet');


define('eaterstop_lite_url','https://www.gracethemes.com','eaterstop-lite');
define('eaterstop_lite_protheme_url','https://www.gracethemes.com/themes/eaterstop-restaurant-wordpress-theme/','eaterstop-lite');
define('eaterstop_lite_theme_doc','https://www.gracethemes.com/documentation/eaterstop-doc/#homepage-lite','eaterstop-lite');
define('eaterstop_lite_live_demo','https://gracethemes.com/demo/eaterstop/','eaterstop-lite');
define('eaterstop_lite_themes','https://www.gracethemes.com/themes/','eaterstop-lite');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

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


 if ( ! function_exists( 'eaterstop_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since  Eaterstop Lite 1.2
 */
function eaterstop_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

// get slug by id
function eaterstop_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}