<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package prteater
 */

?>

<?php
$sub_text = get_field('nadomestni_tekst');
$link = get_field('link_prijava');
?>

<?php if (has_post_thumbnail( $post->ID )): ?>

<?php	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

<article id="<?php echo( basename(get_permalink()) )?>" <?php post_class(); ?>>
	<img src="<?php echo $image[0]; ?>" alt="">

<?php else: ?>
	<?php
	$bg_image = get_field('ozadje_sekcije');
	$size = 'full';
	$bg_image_url = $bg_image['url'];
	$bg_color = get_field('barva_ozadja');

	if( !empty($bg_image) ): ?>
		<article id="<?php echo( basename(get_permalink()) )?>" <?php post_class(); ?> style="background-image: url(' <?php echo $bg_image_url ?> ')">
	<?php else: ?>

	<article id="<?php echo( basename(get_permalink()) )?>" <?php post_class(); ?> style="background-color: <?php echo $bg_color ?>">
	<?php endif; ?>

		<div class="section-parallax">
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					// the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					the_title( '<h2 class="entry-title">', '</h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						prteater_posted_on();
						prteater_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<hr class="section-separator">

			<?php if (!$sub_text) :?>
				<?php if ($link ) :?>
					<div class="prijava-link text-align-center mb-20 mt-20">
						<a class="button button-prijava" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<div class="entry-content-section">

				<?php if ($sub_text) : ?>
					<div class="replacement-text">
						<?php echo $sub_text; ?>
					</div>
				<?php else:

				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'prteater' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'prteater' ),
					'after'  => '</div>',
				) );
				?>

				<?php endif; ?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php // prteater_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>

<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
