<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */
?>

<div id="sidebar" class="widget-area" role="complementary">
    <aside id="promo" class="widget">
        <h3>Free Download</h3>
        <p><a href="http://jamesnighthawk.com/music/"><img src="/wp-content/uploads/2013/03/twilight_ep.png" alt="" /></a></p>
        <p>Get your <a href="http://jamesnighthawk.com/music/">free download of <em>The Twilight EP - Live and Acoustic</em></a>.</p>
    </aside>

    <aside id="follow" class="widget">
        <h3>Follow</h3>
        <ul class="social">
            <li><a class="facebook" href="https://www.facebook.com/jamesnighthawk">Facebook</a></li>
            <li><a class="twitter" href="http://twitter.com/jamesnighthawk">Twitter</a></li>
            <li><a class="rss" href="/feed/">RSS feed</a></li>
        </ul>
    </aside>

    <?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) :
    endif; ?>
</div>
