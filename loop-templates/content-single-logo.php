<?php
/**
 * Single post partial template.
 *
 * @package leantheme
 */

?>
<article <?php post_class('card card-single border-0'); ?> id="post-<?php the_ID(); ?>">

	<?php if( has_post_thumbnail() ) : ?>

		<?php the_post_thumbnail( 'full', ['class' => 'img-thumbnail mb-3'] ); ?>

	<?php endif; ?>

		<div class="post-header mb-4">

			<?php the_title( '<h1>', '</h1>' ); ?>

			<div class="text-muted lt-link-color-dark mt-4">
				<?php the_author(); ?> 于 <?php echo esc_html( get_the_date() ); ?> 发表在 <?php the_terms( $post->ID, 'industry', '', ' / ' ); ?>
			</div>
		</div>

	<div class="card-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'leantheme' ),
			'after'  => '</div>',
		) );
		?>

	</div>

	<footer class="card-tags mt-4">
		<?php leantheme_entry_tags(); ?>
	</footer>

</article>
