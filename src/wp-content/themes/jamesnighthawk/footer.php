<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=mainContent div and all content after
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */
?>

</div><!-- #pageWrapper -->

<div id="loadingOverlay"></div>

<footer id="footer" role="contentinfo">
	<div class="footer-wrapper">
		<div class="footer-container">
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<nav role="navigation">
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->

			<ul class="music-links">
				<li><a href="https://itunes.apple.com/gb/artist/james-nighthawk/id603994693"><img alt="Download on iTunes" src="/wp-content/themes/jamesnighthawk/images/download-on-itunes.png" /></a></li>
			</ul>

			<p class="copyright">&copy; 2013 James Nighthawk</p>
			<p>Site design by Karl Kisala.</p>
		</div>
	</div>
</footer><!-- #footer -->

<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/modernizr/modernizr.js"></script>
<script data-main="<?php bloginfo( 'stylesheet_directory' ); ?>/js/main" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/require/require.js"></script>

<?php wp_footer(); ?>

</body>
</html>