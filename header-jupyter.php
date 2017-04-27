<?php
/**
 * The template for displaying the header for jupyter type post (Edited by Wayne)
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>

		<?php /*Beginning of code for jupyter post, code extracted from exported html jupyter notebook*/ ?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.1.10/require.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- Custom stylesheet, it must be in the same directory as the html file -->
		<link rel="stylesheet" type="text/css" href=
			<?php echo site_url("wp-content/themes/FoundationPress/jupyterCSS/twitter_bootstrap.css") ?> 
		>
		<link rel="stylesheet" type="text/css" href=
			<?php echo site_url("wp-content/themes/FoundationPress/jupyterCSS/style.css") ?> 
		>

		<!-- Loading mathjax macro -->
		<!-- Load mathjax -->
		<script src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML"></script>
	    <!-- MathJax configuration -->
	    <script type="text/x-mathjax-config">
	    MathJax.Hub.Config({
	        tex2jax: {
	            inlineMath: [ ['$','$'], ["\\(","\\)"] ],
	            displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
	            processEscapes: true,
	            processEnvironments: true
	        },
	        // Center justify equations in code and markdown cells. Elsewhere
	        // we use CSS to left justify single line equations in code cells.
	        displayAlign: 'center',
	        "HTML-CSS": {
	            styles: {'.MathJax_Display': {"margin": 0}},
	            linebreaks: { automatic: true }
	        }
	    });
	    </script>
		<?php /*End of code for jupyter post*/ ?>

	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="title-bar" data-responsive-toggle="site-navigation">
			<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<ul class="menu">
					<li class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
				</ul>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
