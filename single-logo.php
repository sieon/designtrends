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

		<main class="site-main" id="main">

			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<nav id="breadcrumbs" class="mb-3">','</nav>' );
				}
			?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content', 'single-logo' ); ?>

					<?php leantheme_post_nav(); ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; // end of the loop. ?>

			<?php related_logos(); ?>

		</main><!-- #main -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
