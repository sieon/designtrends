<?php
/**
 * Single post partial template.
 *
 * @package leantheme
 */

?>
<article <?php post_class('card card-single border-0'); ?> id="post-<?php the_ID(); ?>">

	<?php if( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'full', ['class' => 'card-img border mb-4'] ); ?>
	<?php endif; ?>

		<div class="post-header mb-4">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<div class="text-muted lt-link-color-dark"><?php leantheme_posted_on(); ?>
				<i class="fa fa-archive mr-1"></i>
				<?php
				$categories = get_the_category();
				$separator = ' ';
				$output = '';
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<a class="" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'leantheme' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					echo trim( $output, $separator );
				}
				?>
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
