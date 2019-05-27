<?php
/**
 * Single post partial template.
 *
 * @package leantheme
 */

?>



<article <?php post_class('container'); ?> id="post-<?php the_ID(); ?>">

	<div class="row">
		<div class="col-2">
				<?php
				wp_nav_menu( array(
						'theme_location'  => 'hot_themes',
						'depth'           => 2,
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'list-group memu-group',
								'menu_id'         => 'hot-themes',
				));
				?>

		</div>
		<div class="col-10">
			<div class="jumbotron mb-3">
					<div class="media">
						<div class="media-body">
							<?php the_title( '<h1 class="mb-4">', '</h1>' ); ?>
							<div class="media-excerpt text-muted mb-4">
								<?php the_excerpt(); ?>
							</div>
							<a class="btn btn-primary btn-pill btn-lg small" href="<?php echo esc_url( get_post_meta( get_the_ID(), 'download_link', true ) ); ?>">免费下载</a>
						</div>
						<?php the_post_thumbnail( 'full', ['class' => 'w-25 ml-auto'] ); ?>
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

		</div>
	</div>

</article>
