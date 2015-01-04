<?php
/**
* Template Name: Gigs
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
        <section class="gigs">
            <h1>Upcoming gigs</h1>

            <?php
            $page_content = $post->post_content;

            $loop = new WP_Query( array(
                'meta_key' => '_date',
                'meta_query' => array(
                    array(
                        'key' => '_date',
                        'value' => array( date( 'Y-m-d', strtotime( "-1 days" ) ), '2100-01-01' ),
                        'compare' => 'BETWEEN',
                        'type' => 'DATE'
                    )
                ),
                'numberposts' => -1,
                'order' => 'ASC',
                'orderby' => 'meta_key',
                'post_type' => 'gigs'
            ) ); ?>

            <?php if ( $loop->have_posts() ) { ?>
                <ul class="upcoming-gigs">
                    <?php while ( $loop->have_posts() ) : $loop->the_post();
                        $custom = get_post_custom($post->ID); ?>
                        <li <?php post_class(); ?>>
                            <header>
                                <h1><?php echo date('l jS F Y', strtotime( $custom['_date'][0] ) ); ?></h1>
                            </header>

                            <p><i><?php echo $custom['_venue'][0]; ?></i></p>
                            <?php the_content(); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php } else {
                echo $page_content;
            } ?>
        </section>
    </div>

    <?php Starkers_Utilities::get_template_parts( array( 'parts/sidebars/sidebar' ) ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer', 'parts/shared/html-footer' ) ); ?>
