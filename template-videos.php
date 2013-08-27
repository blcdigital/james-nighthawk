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

get_header(); ?>

	<div id="mainContent">
		<div id="content" role="main">
			<section class="videos">
				<h1>Latest Videos</h1>

				<?php
					$loop = new WP_Query(array(
						'numberposts' => -1,
						'post_type' => 'videos'
					));
							
					while ( $loop->have_posts() ) : $loop->the_post();
						$custom = get_post_custom($post->ID);
				?>

					<article id="video-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header>
							<h1><?php the_title(); ?></h1>
						</header>

						<a data-video="<?= $custom['video'][0]; ?>" href="http://www.youtube.com/watch?v=<?= $custom['video'][0]; ?>">
							<?php the_post_thumbnail(); ?>
							<span>
								<strong>Play</strong>
							</span>
						</a>
					</article><!-- #post-## -->

				<?php endwhile; ?>
			</section>
		</div>
	</div>

<?php
get_footer();
?>