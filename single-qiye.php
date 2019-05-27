<?php
/**
 * The template for displaying all single posts.
 *
 * @package leantheme
 */

get_header();
$container   = get_theme_mod( 'leantheme_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row justify-content-center">

			<main class="col-lg-8" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single-qiye' ); ?>

						<?php leantheme_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
