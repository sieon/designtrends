<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package leantheme
 */

get_header();
$container   = get_theme_mod( 'leantheme_container_type' );
?>

<div class="" id="author-wrapper">

	<div class="profile-header bg-dark text-center">
	<!-- <div class="profile-header bg-dark text-center" style="background-image: url(../assets/img/iceland.jpg); "> -->
		<?php
		$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
			$author_name ) : get_userdata( intval( $author ) );
		?>

		<div class="container-fluid">
			<div class="container-inner">
				<?php if ( ! empty( $curauth->ID ) ) : ?>
					<?php echo get_avatar( $curauth->ID ); ?>
				<?php endif; ?>
				<h1 class="profile-header-user h3"><?php echo esc_html( $curauth->nickname ); ?></h1>
				<?php if ( ! empty( $curauth->user_description ) ) : ?>
					<p class="profile-header-bio"><?php echo esc_html( $curauth->user_description ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $curauth->user_url ) ) : ?>
					<p><a class="text-muted" href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a></p>
				<?php endif; ?>
			</div>
		</div>
		<nav class="profile-header-nav">
			<ul class="nav nav-tabs justify-content-center">
				<li class="nav-item">
					<a class="nav-link active" href="#">文章</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">关注</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">评论</a>
				</li>
			</ul>
		</nav>
	</div>



	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<main class="site-main" id="main">

			<div class="my-4">

				<!-- The Loop -->
				<?php if ( have_posts() ) : ?>
					<div class="card-columns">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
						<?php endwhile; ?>
					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

				<!-- End Loop -->

			</ul>

		</main><!-- #main -->

		<!-- The pagination component -->
		<?php leantheme_pagination(); ?>
	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
