<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'blacklabelcreative' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php posted_on(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php the_excerpt(); ?>
</article>
