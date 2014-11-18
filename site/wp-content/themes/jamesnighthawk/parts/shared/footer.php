<footer id="footer" role="contentinfo">
    <div class="footer-wrapper">
        <div class="footer-container">
            <?php
                if ( ! is_404() )
                    get_sidebar( 'footer' );
            ?>

            <nav role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav><!-- #access -->

            <ul class="music-links">
                <li><a href="https://itunes.apple.com/gb/artist/james-nighthawk/id603994693"><img alt="Download on iTunes" src="/wp-content/themes/jamesnighthawk/assets/images/download-on-itunes.png" /></a></li>
            </ul>

            <p class="copyright">&copy; 2013 James Nighthawk</p>
            <p>Site design by Karl Kisala.</p>
        </div>
    </div>
</footer>
