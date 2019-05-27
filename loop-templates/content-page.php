<?php
/**
 * Partial template for content in page.php
 *
 * @package leantheme
 */

?>
<article <?php post_class(''); ?> id="post-<?php the_ID(); ?>">

	<?php if(has_post_thumbnail()): ?>
		<div class="page-header position-relative mb-4" style="background:url('<?php //echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'full')); ?>'); background-size: cover;">
			<?php the_post_thumbnail( 'full', ['class' => 'rounded'] ); ?>
			<div class="lt-overlay-secondary lt-position-cover"></div>
			<?php the_title( '<h1 class="position-absolute lt-overlay lt-position-center text-white">', '</h1>' ); ?>
		</div>
	<?php else: ?>
		<?php the_title( '<h1 class="page-title mb-4">', '</h1>' ); ?>
	<?php endif; ?>

	<div class="post-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'leantheme' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'leantheme' ), '<footer class="card-footer bg-transparent"><span class="edit-link">', '</span>' ); ?>

</article>
