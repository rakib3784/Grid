<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Grid
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page-top"></div><!-- /#page-top -->
	<header id="masthead" class="masthead main-menu">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
					<i class="fa fa-bars"></i>
				</button>
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<a class="navbar-brand"  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php else : ?>
						<a class="navbar-brand"  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
			</div>

			<div id="menu" class="collapse navbar-collapse">
				

					<?php
		              $args = array(
		                      'theme_location' => 'primary',
		                      'depth' => 2,
		                      'container' => false,
		                      'container_class' => 'mastnav fullheight', 
		                      'menu_class'  => 'nav navbar-nav',
		                      'walker'  => new BootstrapNavMenuWalker()
		                      );
		                wp_nav_menu($args);  
		              ?>
				
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
