<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package leantheme
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'leantheme_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header mb-4">
					<?php
					the_archive_title( '<h1 class="page-title mb-0">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description text-muted mt-3 p-mb-0">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="card-columns">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'theme' );
						?>

					<?php endwhile; ?>
				</div>

			<?php else : ?>

				<?php get_template_part( 'loop-templates/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->

			<!-- The pagination component -->
			<?php leantheme_pagination(); ?>

		</div><!-- #primary -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
