<?php
/**
 * 列表样式2 小标题样式
 *
 * @package leantheme
 */

?>

<article <?php post_class('card card-entry l-shadow-v7 border-0 mb-3'); ?> id="post-<?php the_ID(); ?>">

	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="card-img-top">

    <?php if( has_post_thumbnail() ) : ?>

      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'full', ['class' => 'card-img-top'] ); ?>
      </a>

    <?php else: // no thumbnail ?>

      <!-- <a href="<?php //the_permalink(); ?>">
        <img class="card-img-top" src="<?php //echo get_theme_file_uri( 'img/placeholder.png' ); ?>" alt="<?php //the_title(); ?>">
      </a> -->
    <?php endif; ?>

  </div>

	<div class="card-body">

		<?php
		$categories = get_the_category();
		$separator = ' ';
		$output = '';
		if ( ! empty( $categories ) ) {
			foreach( $categories as $category ) {
				$output .= '<a class="card-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'leantheme' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			}
			echo trim( $output, $separator );
		}
		?>

		<?php the_title( sprintf( '<h2 class="entry-title mt-3"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

		<?php endif; ?>

		<div class="card-excerpt mb-3">

			<?php the_excerpt(); ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'leantheme' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer small text-muted d-flex justify-content-between mt-4">
			<span><?php echo esc_html( get_the_date() ); ?></span>
			<?php
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'leantheme' ), esc_html__( '1 Comment', 'leantheme' ), esc_html__( '% Comments', 'leantheme' ) );
			echo '</span>'; ?>

		</footer><!-- .entry-footer -->

	</div>
</article><!-- #post-## -->
