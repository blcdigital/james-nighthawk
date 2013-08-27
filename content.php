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
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'blacklabelcreative' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<h3><?php _e( 'Featured', 'blacklabelcreative' ); ?></h3>
				</hgroup>
			<?php else : ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>

			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php blacklabelcreative_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'blacklabelcreative' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'blacklabelcreative' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>
	</article><!-- #post-<?php the_ID(); ?> -->
