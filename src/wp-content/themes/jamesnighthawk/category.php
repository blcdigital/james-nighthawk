<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */

get_header(); ?>

	<section id="mainContent">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1><?php
					printf( __( 'Category Archives: %s', 'blacklabelcreative' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>

				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
				?>
			</header>

			<?php blacklabelcreative_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php blacklabelcreative_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header>
					<h1><?php _e( 'Nothing Found', 'blacklabelcreative' ); ?></h1>
				</header><!-- header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'blacklabelcreative' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #mainContent -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
