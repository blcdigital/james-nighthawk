<?php
/**
 * The Template for displaying all single posts
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

        <?php while ( have_posts() ) : the_post();
            get_template_part( 'content', 'single' );

            comments_template( '', true );
        endwhile; ?>
    </div>

    <?php Starkers_Utilities::get_template_parts( array( 'parts/sidebars/sidebar-blog' ) ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer', 'parts/shared/html-footer' ) ); ?>
