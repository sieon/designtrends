<?php
/**
 * 默认列表 文章样式
 *
 * @package leantheme
 */

?>

<div class="col-lg-3 col-md-4 col-6">
	<article <?php post_class('card shadow-sm mb-4'); ?> id="post-<?php the_ID(); ?>">

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

			<?php the_title( sprintf( '<h3 class="h5"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>

			<?php endif; ?>

			<footer class="card-entry-footer d-flex justify-content-between mt-3">
				<span><?php echo esc_html( get_the_date() ); ?></span>
				<?php
				echo '<span class="comments-link">';
				comments_popup_link( esc_html__( 'Leave a comment', 'leantheme' ), esc_html__( '1 Comment', 'leantheme' ), esc_html__( '% Comments', 'leantheme' ) );
				echo '</span>'; ?>

			</footer><!-- .entry-footer -->

		</div>
	</article><!-- #post-## -->
</div>
