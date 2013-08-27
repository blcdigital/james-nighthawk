<?php
/**
* Template Name: Homepage
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

get_header(); ?>

	<div id="mainContent">
		<div id="content" role="main">
			<section class="blog-posts">
				<h1>Latest News</h1>
				<?php
					/* Get the latest post */
					$args = array( 'numberposts' => 4, 'offset' => 1 );
					$lastposts = get_posts( $args );

					foreach($lastposts as $post) :
					    setup_postdata($post);
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'blacklabelcreative' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

						<?php if ( 'post' == get_post_type() ) : ?>
							<div class="entry-meta">
								<?php blacklabelcreative_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header>

					<?php the_excerpt(); ?>
				</article><!-- #post-## -->

				<?php endforeach; ?>
			</section>
		</div>
	</div>

<?php
get_sidebar();
get_footer();
?>