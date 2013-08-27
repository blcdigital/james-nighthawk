<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */

get_header(); ?>

	<div id="mainContent">
		<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<h1>Blog</h1>

				<?php //blacklabelcreative_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'blog' ); ?>

				<?php endwhile; ?>

				<?php blacklabelcreative_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header>
						<h1><?php _e( 'Nothing Found', 'blacklabelcreative' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'blacklabelcreative' ); ?></p>
						<?php //get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #mainContent -->

<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>