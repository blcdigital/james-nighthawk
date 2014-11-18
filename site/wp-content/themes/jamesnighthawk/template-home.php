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
        <section class="blog-posts">
            <h1>Latest News</h1>
            <?php
            /* Get the latest post */
            $args = array( 'numberposts' => 4 );
            $lastposts = get_posts( $args );

            foreach($lastposts as $post) :
                setup_postdata($post);
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>
                    <h1><a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

                    <?php if ( 'post' == get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php //blacklabelcreative_posted_on(); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <?php the_excerpt(); ?>
            </article>

            <?php endforeach; ?>
        </section>
    </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer', 'parts/shared/html-footer' ) ); ?>
