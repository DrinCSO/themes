<?php 
add_action( 'wp_enqueue_scripts', 'ecommerce_suite_enqueue_styles' );
function ecommerce_suite_enqueue_styles() {
	wp_enqueue_style( 'ecommerce-suite-parent-style', get_template_directory_uri() . '/style.css' ); 
} 

function ecommerce_suite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ecommerce_suite_custom_header_args', array(
		'default-text-color'     => '000000',
		'height'             	 => 400,
		'flex-height'            => true,
		'default-image'			=> '',
		'wp-head-callback'       => 'ecommerce_suite_header_style',
	) ) );
	register_default_headers( array(
		'header-bg' => array(
			'url'           => get_theme_file_uri( '/img/bg-img-min.png' ),
			'thumbnail_url' => get_theme_file_uri( '/img/bg-img-min.png' ),
			'description'   => _x( 'Default', 'Default header image', 'ecommerce-suite', 9999 )
		),	
	) );

}
add_action( 'after_setup_theme', 'ecommerce_suite_custom_header_setup', 9999 );
if ( ! function_exists( 'ecommerce_suite_header_style' ) ) :
	function ecommerce_suite_header_style() {
		$header_text_color = get_header_textcolor();
		$header_image = get_header_image();
		if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) ){
			return;
		}
		?>
		<style type="text/css">
			.site-title a,
			.site-description,
			.logofont,
			.site-title,
			.logodescription {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			<?php if ( ! display_header_text() ) : ?>
				.logofont,
				.logodescription {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
					display:none;
				}
			<?php endif; ?>

			<?php header_image(); ?>"
			<?php
			if ( ! display_header_text() ) :
				?>
				.logofont,
				.site-title,
				p.logodescription{
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
					display:none;
				}
				<?php
			else :
				?>
				.site-title a,
				.site-title,
				.site-description,
				.logodescription {
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
			<?php endif; ?>
		</style>
		<?php
	}
endif;



/**
 * Google fonts
 */

function ecommerce_suite_enqueue_assets() {
    // Include the file.
	require_once get_theme_file_path( 'webfont-loader/wptt-webfont-loader.php' );
    // Load the theme stylesheet.
	wp_enqueue_style(
		'superb-ecommerce',
		get_template_directory_uri() . '/style.css',
		array(),
		'1.0'
	);
    // Load the webfont.
	wp_enqueue_style(
		'Poppins',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap' ),
		array(),
		'1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'ecommerce_suite_enqueue_assets' );