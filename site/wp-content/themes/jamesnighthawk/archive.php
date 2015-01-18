<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div id="mainContent">
    <div id="content" role="main">
        <?php if ( have_posts() ): ?>
            <header class="page-header">
                <h1>
                    <?php if ( is_day() ) : ?>
                    Archive: <?php echo  get_the_date( 'D M Y' ); ?>
                    <?php elseif ( is_month() ) : ?>
                    Archive: <?php echo  get_the_date( 'M Y' ); ?>
                    <?php elseif ( is_year() ) : ?>
                    Archive: <?php echo  get_the_date( 'Y' ); ?>
                    <?php else : ?>
                    Archive
                    <?php endif; ?>
                </h1>
            </header>

            <!-- <ol> -->
                <?php while ( have_posts() ) : the_post();
                	get_template_part( 'content', get_post_format() );
                endwhile; ?>
            <!-- </ol> -->
            <?php else: ?>
            <h1>No posts to display</h1>
        <?php endif; ?>

    </div>

    <?php Starkers_Utilities::get_template_parts( array( 'parts/sidebars/sidebar' ) ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer', 'parts/shared/html-footer' ) ); ?>