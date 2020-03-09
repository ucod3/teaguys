<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tea_guys
 */

?>

	</div><!-- #content -->
<!-- footer section start-->
	<footer id="footerStyle" class="site-footer">
		<div class="site-info">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu',
					'menu_id'        => 'primary-menu',
				) );
			?>

				<p class="center lightGreen">Copyrights © Tea Guys, 2020</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
