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
			<a class="lightGreen" href="<?php echo esc_url( __( 'https://wordpress.org/', 'tea_guys' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'tea_guys' ), 'WordPress' );
				?>
			</a>
			<span class="sep lightGreen"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'tea_guys' ), 'tea_guys', '<a class="lightGreen" href="https://cwd4500.usman.work/">Usman Butt</a>' );
				?>
				<p class="center lightGreen">Copyrights © Tea Guys, 2020</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
