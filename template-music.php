<?php
/**
* Template Name: Music
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
			<section class="music">
				<h1 class="visually-hidden">Music</h1>

				<?php
					$loop = new WP_Query(array(
						'numberposts' => -1,
						'post_type' => 'albums'
					));

					while ( $loop->have_posts() ) : $loop->the_post();
						$custom = get_post_custom($post->ID);
						$tracks = $custom['track'];
				?>

					<article id="album-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header>
							<?php
								$thumbAttrs = array(
									'class' => 'album-image'
								);
								if ($custom['itunes-link']) {
									?>
										<a href="<?php echo $custom['itunes-link'][0]; ?>" title="Download on iTunes">
											<?php the_post_thumbnail( 'full', $thumbAttrs ); ?>
										</a>
									<?php
								}
								if ($custom['download-link']) {
									?>
										<a href="<?php echo $custom['download-link'][0]; ?>" title="Download now">
											<?php the_post_thumbnail( 'full', $thumbAttrs ); ?>
										</a>
									<?php
								}
							?>

							<h1>
								<?php the_title(); ?>
								<span>(<?= $custom['year'][0]; ?>)</span>
							</h1>

							<?php
								if ($custom['itunes-link']) {
									?>
										<p><a href="<?php echo $custom['itunes-link'][0]; ?>" title="Download on iTunes"><img alt="" src="/wp-content/themes/jamesnighthawk/images/download-on-itunes.png" /></a></p>
									<?php
								}
								if ($custom['download-link']) {
									?>
										<p><a href="<?php echo $custom['download-link'][0]; ?>" title="Download now">Download for FREE!</a></p>
									<?php
								}
								if ($custom['paypal-button']) {
									?>
									<h2>Purchase the CD</h2>
									<?php
									echo $custom['paypal-button'][0];
									?>
									<p>For everyone outside Europe, you can <a href="http://www.cdbaby.com/Artist/JamesNighthawk" title="">purchase me from cdbaby</a>.</p>
									<?php
								}
							?>
						</header>

						<ol>
							<?php
								foreach ($tracks as $track) {
									$trackData = explode(',', $track);

									if ($trackData[2] === 'true') {
										// has a track
										?>
										<li class="has-track">
											<a data-track="<?php echo $trackData[0]; ?>" href="#">
												<span class="track-title"><?php echo $trackData[0]; ?></span>
												<span class="track-time"><?php echo $trackData[1]; ?></span>
											</a>
										</li>
										<?php
									} else {
										// no track
										?>
										<li>
											<span class="track-title"><?php echo $trackData[0]; ?></span>
											<span class="track-time"><?php echo $trackData[1]; ?></span>
										</li>
										<?php
									}
								}
							?>
						</ol>
					</article><!-- #post-## -->

				<?php endwhile; ?>

				<!--<article class="music-promo">
					<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
								the_post_thumbnail( 'full' );
								the_content();
							endwhile;
						endif;
					?>
				</article>-->
			</section>
		</div>
	</div>

<?php
get_footer();
?>