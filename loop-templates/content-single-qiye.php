<?php
/**
 * Single post partial template.
 *
 * @package leantheme
 */

?>
<article <?php post_class('card card-single border-0'); ?> id="post-<?php the_ID(); ?>">

	<?php if( has_post_thumbnail() ) : ?>

		<div class="card card-body">
			<div class="media">
				<div class="text-center mr-4">
					<img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'full')); ?>" alt="<?php the_title(); ?>" width="120px;">
				</div>

				<div class="media-body">
					<?php the_title( '<h1>', '</h1>' ); ?>
					<div class="card-excerpt mb-3">
						<?php the_excerpt(); ?>
					</div>
					<a class="card-link" href="<?php echo esc_url( get_post_meta( get_the_ID(), 'qiye_website', true ) ); ?>">去官网</a>
				</div>
			</div>
		</div>

	<?php endif; ?>

	<div class="post-content mt-4">

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
