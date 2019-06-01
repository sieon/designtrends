<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package leantheme
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'leantheme_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<footer class="site-footer" id="colophon">

			<div class="site-info">

					<a href="<?php  echo esc_url( __( 'http://wordpress.org/','leantheme' ) ); ?>"><?php printf(
					/* translators:*/
					esc_html__( 'Proudly powered by %s', 'leantheme' ),'WordPress' ); ?></a>
						<span class="sep"> | </span>

					<?php printf( // WPCS: XSS ok.
					/* translators:*/
						'<a href="'.esc_url( __('http://qingzhuti.com/?utm_source=writing_copyright', 'leantheme')).'">Writing</a>' ); ?>

					<?php if ( is_front_page() ) :
						dynamic_sidebar( 'blogroll' );
					endif; ?>

			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
