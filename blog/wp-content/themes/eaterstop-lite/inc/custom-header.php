<?php
/**
 * @package Eaterstop Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses eaterstop_lite_header_style()
 * @uses eaterstop_lite_admin_header_style()
 * @uses eaterstop_lite_admin_header_image()
 */
function eaterstop_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'eaterstop_lite_custom_header_args', array(		
		'default-text-color'     => 'ffffff',
		'width'                  => 1600,
		'height'                 => 200,
		'wp-head-callback'       => 'eaterstop_lite_header_style',
		'admin-head-callback'    => 'eaterstop_lite_admin_header_style',
		'admin-preview-callback' => 'eaterstop_lite_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'eaterstop_lite_custom_header_setup' );

if ( ! function_exists( 'eaterstop_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see eaterstop_lite_custom_header_setup().
 */
function eaterstop_lite_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo get_header_image(); ?>) no-repeat;
			background-position: center top;
		}
		.logo h1{color:#<?php echo get_header_textcolor(); ?>}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // eaterstop_lite_header_style

if ( ! function_exists( 'eaterstop_lite_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see eaterstop_lite_custom_header_setup().
 */
function eaterstop_lite_admin_header_style() {?>
	<style type="text/css">
	.appearance_page_custom-header #headimg { border: none; }
	</style><?php
}
endif; // eaterstop_lite_admin_header_style


add_action( 'admin_head', 'eaterstop_lite_admin_header_css' );
function eaterstop_lite_admin_header_css(){ ?>
	<style>pre{white-space: pre-wrap;}</style><?php
}


if ( ! function_exists( 'eaterstop_lite_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see eaterstop_lite_custom_header_setup().
 */
function eaterstop_lite_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php              
}
endif; // eaterstop_lite_admin_header_image 