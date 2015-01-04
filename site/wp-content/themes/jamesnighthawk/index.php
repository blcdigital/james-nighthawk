<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div id="mainContent">
    <div id="content" role="main">

        <?php if ( have_posts() ) : ?>
            <h1>Blog</h1>

            <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'content', 'blog' );
            endwhile;

            post_content_nav( 'nav-below' );
        else : ?>
            <article id="post-0" class="post no-results not-found">
                <header>
                    <h1>Nothing Found</h1>
                </header>

                <div class="entry-content">
                    <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
                </div>
            </article>
        <?php endif; ?>
    </div>

    <?php Starkers_Utilities::get_template_parts( array( 'parts/sidebars/sidebar' ) ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer', 'parts/shared/html-footer' ) ); ?>
