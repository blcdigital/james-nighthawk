<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]> <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'blacklabelcreative' ), max( $paged, $page ) );
	?></title>

	<script>
		var docLocation = document.location.href,
			docHost = document.location.host;

		// set js enabled class - replaces 'no-js' with 'js'
		//document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1' + 'js' + '$2');

		// if the url if from outside the site
		if (!document.referrer.match(/jamesnighthawk/)) {
			if (docLocation.match(/\/#\//)) {
				document.location.href = docLocation.replace('/#', '/');
			}
		}

		// if there is no url hash in the location
		if (!docLocation.match(/\/#\//)) {
			// add one
			window.history.pushState(null, null, docLocation.replace(docHost, docHost + '/#'));
		}

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-1627709-5']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/mediaelementplayer.css" media="screen" rel="stylesheet" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if gte IE 9]><!-->
		<link href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" rel="stylesheet" />
	<!--<![endif]-->
	<!--[if lt IE 9]>
		<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/ie.css" media="screen" rel="stylesheet" />

		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>

<body>
	<div class="audio-player">
		<div class="audio-player-inner">
			<img alt="" class="artwork" src="/wp-content/uploads/2013/03/twilight_sessions.png" />
			<p class="now-playing">
				Now playing >
				<span>Don't Give Your Love Out</span>
			</p>
			<select class="select-track">
				<option value="">Select track</option>
				<option value="Don't Give Your Love Out">Don't Give Your Love Out</option>
				<option value="Let Me Know">Let Me Know</option>
				<option value="Ftw">Ftw</option>
				<option value="One Hell of a Time">One Hell of a Time</option>
			</select>
			<audio controls="controls" id="audioPlayer" src="/wp-content/uploads/music/don't_give_your_love_out.mp3" type="audio/mp3"></audio>
		</div>
	</div>

	<header id="header" role="banner">
		<div class="header-container">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>

		<?php //get_search_form(); ?>

		<nav role="navigation">
			<div class="header-container">
				<!--<h3 class="assistive-text"><?php _e( 'Main menu', 'blacklabelcreative' ); ?></h3>-->
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<!--<ul class="skip-link">
					<li><a class="assistive-text" href="#mainContent" title="<?php esc_attr_e( 'Skip to primary content', 'blacklabelcreative' ); ?>"><?php _e( 'Skip to primary content', 'blacklabelcreative' ); ?></a></li>
					<li><a class="assistive-text" href="#sidebar" title="<?php esc_attr_e( 'Skip to secondary content', 'blacklabelcreative' ); ?>"><?php _e( 'Skip to secondary content', 'blacklabelcreative' ); ?></a></li>
				</ul>-->
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		</nav><!-- #access -->
	</header><!-- #branding -->

	<div id="pageWrapper" <?php body_class(); ?>>