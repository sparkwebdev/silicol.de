<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Silicol
 */

?>


	</div><!-- #content -->
</div><!-- #page -->

	<footer id="colophon" class="site-footer component-section" role="contentinfo">
		<div class="section-inner">
			<nav id="site-navigation-footer" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'primary-menu-footer', 'depth' => '1' ) ); ?>
				<a href="#masthead" id="nav-back-to-top" title="Back to top"><span class="screen-reader-text">Back to top</span></a>
			</nav><!-- #site-navigation -->
			<div class="site-info">
				<p class="brand-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span></a>
				<p class="site-info-copyright">&copy; Silicol GmbH <?php echo date('Y'); ?> All rights reserved</p>
			</div><!-- .site-info -->
		</div><!-- .section-inner -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

<script>
	
	<?php // Fixed header (headroom.js) ?>
    var header = document.querySelector(".site-header");
    if(window.location.hash) {
    	header.classList.add("headroom--unpinned");
    }
    var headroom = new Headroom(header, {
        tolerance: {
          down : 10,
          up : 20
        },
        offset : 60
    });
    headroom.init();
    
	<?php // Dynamic grid layout (masonry.js, imagesloaded.js) ?>
	var $grid = $('.grid').imagesLoaded( function() {
		$('.grid').removeClass('grid-loading').addClass('grid-loaded');
		// init Masonry after all images have loaded
		$grid.masonry({
			// set itemSelector so .grid-sizer is not used in layout
			itemSelector: '.grid-item',
			// use element for option
			columnWidth: '.grid-sizer',
			gutter: 28,
			percentPosition: true
		});
	});
	
	
	// Vanilla JavaScript Scroll to Anchor
	// @ https://perishablepress.com/vanilla-javascript-scroll-anchor/
	
	(function() {
		scrollTo();
	})();
	
	function scrollTo() {
		var links = document.querySelectorAll('.menu-item--anchor a');
		links.forEach(each => (each.onclick = scrollAnchors));
	}
	
	function scrollAnchors(e, respond = null) {
		var distanceToTop = el => Math.floor(el.getBoundingClientRect().top);
		var targetURL = (respond) ? respond.getAttribute('href') : this.getAttribute('href');
		var targetID = targetURL.substring(targetURL.indexOf("#"));
		var targetAnchor = document.querySelector(targetID);
		if (!targetAnchor) return;
		e.preventDefault();
		var menuToggle = document.querySelector('.menu-toggle');
		if (menuToggle) {
			menuToggle.click();
		}
		var originalTop = distanceToTop(targetAnchor) - 90;
		window.scrollBy({ top: originalTop, left: 0, behavior: 'smooth' });
		var checkIfDone = setInterval(function() {
			var atBottom = window.innerHeight + window.pageYOffset >= document.body.offsetHeight - 2;
			if (distanceToTop(targetAnchor) === 0 || atBottom) {
				targetAnchor.tabIndex = '-1';
				targetAnchor.focus();
				window.history.pushState('', '', targetID);
				clearInterval(checkIfDone);
			}
		}, 100);
	}
	

	<?php // Add class to galleries for CSS animations (imagesloaded.js) ?>
	var $gallery = $('.gallery').imagesLoaded( function() {
		$('.gallery').addClass('gallery-fx')
	});
	
	<?php // Back to top animation ?>
	$( '#colophon' ).on( 'click', '#nav-back-to-top', function() {
		$('html, body').animate({scrollTop: '0px'}, 500);
	});
	
	<?php // Accordion animation (FAQs) ?>
	$( '.component-faqs dl' ).on( 'click', 'dt', function() {
		$(this).next('dd').slideToggle('fast');
	});
</script>
</body>
</html>
