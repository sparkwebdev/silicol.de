<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Silicol
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (!is_front_page()) { ?>
	<header class="page-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .page-header -->
	<?php } ?>
	<?php
	$theContent = get_the_content();
	if ($theContent !== "") {
		echo '<div class="page-content">';
		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'silicol' ),
			'after'  => '</div>',
		) );
		echo '</div>';
	}
	?>
	
	<?php
	// Check for Advanced Custom Fields plugin function
	if( function_exists('get_field') ) {
		// check if the flexible content field has rows of data
		if( have_rows('page_content') ) { ?>
<!--
			<div class="component-section">
				<div class="section-inner">
-->
			    <?php // loop through the rows of data
			    while ( have_rows('page_content') ) {
				    the_row();
					$component = get_row_layout();
					switch ($component) {
					    case 'component_general_content':
					    	include( locate_template( '/template-parts/components/component-general_content.php', false, false ) );
					        break;
					    case 'component_general_content_two_column':
					    	include( locate_template( '/template-parts/components/component-general_content_two_column.php', false, false ) ); 
					        break;
					    case 'component_slideshow':
					    	include( locate_template( '/template-parts/components/component-slideshow.php', false, false ) );
					        break;
					    case 'component_faqs':
					    	include( locate_template( '/template-parts/components/component-faqs.php', false, false ) );
					        break;
					}
		    	} ?>
<!--
				</div>
			</div>
-->
		<?php }
	}
	?>
	
</article><!-- #post-## -->
