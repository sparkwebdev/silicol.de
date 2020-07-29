<?php
/**
 * Silicol.de functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Silicolde
 */
	
add_action( 'wp_enqueue_scripts', 'silicolde_enqueue_styles' );
function silicolde_enqueue_styles() {
	$parent_style = 'silicol-style';
// 	$ver = wp_get_theme()->get('Version');
	$ver = time();
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', null, $ver );
	wp_enqueue_style( 'child-style',
	    get_stylesheet_directory_uri() . '/style.css',
	    array( $parent_style ),
	    $ver
    );
}

/*
function child_theme_setup() {
    add_image_size('feature', 1920, 1200, true);
}
add_action( 'after_setup_theme', 'child_theme_setup', 11 );
*/


add_action( 'wp_footer', 'logo_filter', 100 );
function logo_filter() { ?>
<script>
	var content = document.getElementById('main');
	if (content) {
// 		content.innerHTML = content.innerHTML.replace(/sup>skin/g, 'sup><span style="color: #034D9C; font-weight: bold;">skin</span>');
		content.innerHTML = content.innerHTML.replace(/sup>gel/g, 'sup><span style="color: #A0A0A4; font-weight: bold;">gel</span>');
		content.innerHTML = content.innerHTML.replace(/silicol<sup/g, '<span style="color: #059FE3; font-weight: bold;">silicol</span><sup');
// 		content.innerHTML = content.innerHTML.replace(/VAXOL<sup/g, '<span class="vaxol-logo"><span class="screen-reader-text">VAXOL</span></span><sup');
	}
</script>
<?php }


function gb_gutenberg_admin_styles() {
    echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 960px;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 1200px;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }	
        </style>
    ';
}
add_action('admin_head', 'gb_gutenberg_admin_styles');

