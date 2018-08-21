<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package plain
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses plain_header_style()
 */
function plain_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'plain_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'plain_header_style',
        'admin-head-callback'    => 'plain_admin_header_style',
        'admin-preview-callback' => 'plain_admin_header_image',
	) ) );
    register_default_headers( array(
            'default-image'    => array(
                'url'            => '%s/imports/img/header.jpg',
                'thumbnail_url'    => '%s/imports/img/header.jpg',
                'description'    => __('Default Header Image', 'plain')
            )
        )
    );
}
add_action( 'after_setup_theme', 'plain_custom_header_setup' );

if ( ! function_exists( 'plain_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @see plain_custom_header_setup().
     */
    function plain_header_style() {
        ?>
        <style>
            #masthead {
                background-image: url(<?php header_image(); ?>);
                background-size: cover;
                background-position-x: center;
                background-repeat: no-repeat;
            }
        </style>
        <?php
    }
endif; // plain_header_style

if ( ! function_exists( 'plain_admin_header_style' ) ) :
    /**
     * Styles the header image displayed on the Appearance > Header admin panel.
     *
     * @see plain_custom_header_setup().
     */
    function plain_admin_header_style() {
        ?>
        <style type="text/css">
            .appearance_page_custom-header #headimg {
                border: none;
            }
            #headimg h1,
            #desc {
            }
            #headimg h1 {
            }
            #headimg h1 a {
            }
            #desc {
            }
            #headimg img {
            }
        </style>
        <?php
    }
endif; // plain_admin_header_style

if ( ! function_exists( 'plain_admin_header_image' ) ) :
    /**
     * Custom header image markup displayed on the Appearance > Header admin panel.
     *
     * @see plain_custom_header_setup().
     */
    function plain_admin_header_image() {
        $style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
        ?>
        <div id="headimg">
            <h1 class="displaying-header-text"><a id="name"<?php echo esc_html($style); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <div class="displaying-header-text" id="desc"<?php echo esc_html($style); ?>><?php bloginfo( 'description' ); ?></div>
            <?php if ( get_header_image() ) : ?>
                <img src="<?php header_image(); ?>" alt="<?php the_title() ?>">
            <?php endif; ?>
        </div>
        <?php
    }
endif; // plain_admin_header_image
