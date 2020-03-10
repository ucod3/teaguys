<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tea_guys
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				tea_guys_posted_on();
				tea_guys_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php tea_guys_post_thumbnail(); ?>

	<div class="entry-content">
	<div class="grid-container">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tea_guys' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tea_guys' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	</div><!-- .entry-content -->
	<div style="background-image:url(http://teaguys.local/wp-content/uploads/2020/02/bg-1.png);background-size:contain;min-height:670px;z-index:900;">
		<img style="margin-top:100px;" src="http://teaguys.local/wp-content/uploads/2020/02/blackTea-1-300x255.png" alt="" class="wp-image-79">
		<h1 style="color:#FFFFFF">Tea is all you need!</h1>
	</div>

	<footer class="entry-footer">
		<?php tea_guys_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
