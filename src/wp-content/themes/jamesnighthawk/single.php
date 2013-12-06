<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */

get_header(); ?>

	<div id="mainContent">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>