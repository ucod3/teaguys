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
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
	);
	if ( $latestPosts->have_posts() ) {
	?>
	<div class="post-list-wrapper">
	<div class="grid-container post-list">
	<div class="grid-x">
	<div class="cell">
	<h3>Latest Posts:</h3>
	</div>
	<?php
	while ( $latestPosts->have_posts() ) {
		$latestPosts->the_post();
		?>
		<div class="cell small-12 medium-6 large-4">
		<div id="post-<?php echo get_the_ID(); ?>">
		<?php the_post_thumbnail( 'medium' );  ?>
		<h4>
		<a class="button "href="<?php the_permalink();?>"><?php echo get_the_title();?></a>
		</h4>
		<p>
		<?php echo get_the_excerpt(); ?>
		</p>



	</div>
	}
	</div>
	</div>
	</div>
		<?php
	{
		?>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-menu',
					'menu_id'        => 'primary-menu',
				) );
			?>

				<p class="center lightGreen"><?php echo esc_html__('Copyright'); ?> &#169; Tea Guys <?php echo date('Y'); ?></p>
		</div><!-- .site-info -->
	<ul class="social-media">
		<?php if(get_theme_mod('facebook_url')) { ?>
			<li class="facebook">
				<a href="<?php echo get_theme_mod('facebook_url'); ?>"><img class="social-icons" src="<?php echo get_template_directory_uri() . '/assets/img/facebook.png'; ?>" alt="<?php echo esc_html__('Facebook', 'tea_guys') ?>"></a>
			</li>
		<?php } ?>
	</ul>
	<ul class="social-media">
		<?php if(get_theme_mod('twitter_url')) { ?>
			<li class="twitter">
				<a href="<?php echo get_theme_mod('twitter_url'); ?>"><img class="social-icons" src="<?php echo get_template_directory_uri() . '/assets/img/twitter.png'; ?>" alt="<?php echo esc_html__('Twitter', 'tea_guys') ?>"></a>
			</li>
		<?php } ?>
	</ul>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>
</body>
</html>
