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

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'loop-templates/content', 'single-theme' ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
