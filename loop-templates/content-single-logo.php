<?php
/**
 * Single post partial template.
 *
 * @package leantheme
 */

?>
<div class="card card-body shadow-sm mb-2">
	<article <?php post_class('row mb-3'); ?> id="post-<?php the_ID(); ?>">
		<div class="col-md-5">
			<?php if( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'full', ['class' => 'card-img'] ); ?>
			<?php endif; ?>
		</div>
		<div class="col-md-7">
			<div class="post-header mb-3">

				<?php the_title( '<h1 class="mb-4">', '</h1>' ); ?>

				<ul class="list-unstyled">
					<li><hr>发布者：<?php the_author(); ?><hr></li>
					<li>发布时间：<?php echo esc_html( get_the_date() ); ?><hr></li>
					<li>行业：<?php //the_terms( $post->ID, 'industry', '', ' / ' );
					the_category('&bull;');
					?><hr></li>
					<li><?php the_tags(); ?></li>
				</ul>
			</div>
			<hr>
			<?php the_excerpt(); ?>
		</div>
	</article>
</div>
<div class="card card-body shadow-sm">

	<?php the_content(); ?>

	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'leantheme' ),
		'after'  => '</div>',
	) );
	?>

</div>
