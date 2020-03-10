<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tea_guys
 */

?>

<!-- removed the extra tea guys and site title -->
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<!-- logo for the header-->
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$tea_guys_description = get_bloginfo( 'description', 'display' );
			if ( $tea_guys_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $tea_guys_description; /* WPCS: xss ok. */ ?></p>
				<!-- navigation bar -->
				<div class="top-bar" id="example-menu">

					<div id="logoImg" class="top-bar-left">
						<img src="http://teaguys.local/wp-content/uploads/2020/03/logo-e1583715434610.png" id="logoImg" />
					</div>

					<div class="top-bar-right">
						<ul class="menu">
							<li>
								<?php
								wp_nav_menu( array(
									'theme_location' => 'header-menu',
									'menu_id'        => 'primary-menu',
								) );
								?>
							</li>
							<li><input type="search" placeholder="Search" id="searchBar"></li>
						</ul>
					</div>

				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->

			<!-- <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
				<button class="menu-icon" type="button" data-toggle="example-menu"></button>
				<div class="title-bar-title">Menu</div>
			</div> -->
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'tea_guys' ); ?></button> -->

			<?php
			// wp_nav_menu( array(
			// 	'theme_location' => 'menu',
			// 	'menu_id'        => 'primary-menu',
			// ) );
			?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
