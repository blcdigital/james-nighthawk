<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */
?>

<?php
    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (   ! is_active_sidebar( 'sidebar-3'  )
        && ! is_active_sidebar( 'sidebar-4' )
        && ! is_active_sidebar( 'sidebar-5'  )
    )
        return;
    // If we get this far, we have widgets. Let do this.
?>
<div id="supplementary" <?php twentyeleven_footer_sidebar_class(); ?>>
    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
        <div class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-3' ); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
        <div class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-4' ); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
        <div class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-5' ); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>
</div><!-- #supplementary -->
