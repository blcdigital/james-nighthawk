<?php
/**
* Template Name: Videos
*
* A custom page template without sidebar.
*
* The "Template Name:" bit above allows this to be selectable
* from a dropdown menu on the edit page screen.
*
* @package WordPress
* @subpackage black_label_creative
* @since black_label_creative 1.0
*/
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div id="mainContent">
    <div id="content" role="main">
        <section class="videos">
            <h1>Latest Videos</h1>

            <?php
            // featured video
            $loop = new WP_Query(array(
                'numberposts' => 1,
                'post_type' => 'videos',
                'meta_key'   => 'featured_video',
                'meta_value' => 'true'
            )); ?>

            <ul class="featured-video">
                <?php while ( $loop->have_posts() ) : $loop->the_post();
                    $featured_id = $post->ID;
                    $custom = get_post_custom($post->ID); ?>
                    <li id="video-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header>
                            <h1><?php the_title(); ?></h1>
                        </header>

                        <a data-video="<?= $custom['video'][0]; ?>" href="http://www.youtube.com/watch?v=<?= $custom['video'][0]; ?>">
                            <?php the_post_thumbnail(); ?>
                            <span>
                                <strong>Play</strong>
                            </span>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>

            <?php
            $loop = new WP_Query(array(
                'numberposts' => -1,
                'post_type' => 'videos',
                'post__not_in' => array( $featured_id )
            ));
            ?>

            <ul>
                <?php while ( $loop->have_posts() ) : $loop->the_post();
                    $custom = get_post_custom($post->ID); ?>
                    <li id="video-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header>
                            <h1><?php the_title(); ?></h1>
                        </header>

                        <a data-video="<?= $custom['video'][0]; ?>" href="http://www.youtube.com/watch?v=<?= $custom['video'][0]; ?>">
                            <?php the_post_thumbnail(); ?>
                            <span>
                                <strong>Play</strong>
                            </span>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer', 'parts/shared/html-footer' ) ); ?>
