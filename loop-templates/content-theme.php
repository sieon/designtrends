<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package leantheme
 */

?>

<article <?php post_class('card card-theme border-0 l-shadow-v7 text-center mb-4'); ?> id="post-<?php the_ID(); ?>">

	<div class="card-body">

		<?php the_title( sprintf( '<h2 class="card-title h3"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

		<?php endif; ?>

		<div class="card-excerpt text-muted">
			<?php the_excerpt(); ?>
		</div>

		<div class="card-img mt-3">

			<?php if( has_post_thumbnail() ) : ?>

				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'full', ['class' => 'card-img'] ); ?>
				</a>

			<?php else: // no thumbnail ?>

				<!-- <a href="<?php //the_permalink(); ?>">
					<img class="card-img-top" src="<?php //echo get_theme_file_uri( 'img/placeholder.png' ); ?>" alt="<?php //the_title(); ?>">
				</a> -->
			<?php endif; ?>

		</div>

	</div>

	<div class="card-footer">
		<a class="btn btn-primary" href="<?php the_permalink(); ?>">主题详情</a>
	</div>

</article><!-- #post-## -->
