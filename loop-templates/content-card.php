<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package leantheme
 */

?>

<article <?php post_class('card l-shadow-v4 mb-4'); ?> id="post-<?php the_ID(); ?>">

	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	<?php the_post_thumbnail( 'full', ['class' => 'card-img-top'] ); ?>

	<div class="card-body">
		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title h4"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>

				<div class="entry-meta">
					<?php //leantheme_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->



		<div class="entry-content text-muted mt-3">

			<?php
			the_excerpt();
			?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'leantheme' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<hr>

			<?php leantheme_entry_footer(); ?>

		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
