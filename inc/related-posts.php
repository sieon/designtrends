<?php

function related_posts( $post_num = 20 ) {
	global $post;
    echo '<div class="w-100 mb-4"><h3 class="h6 d-inline-block py-2 l-title-v0 mb-3">你可能喜欢：</h3><div class="row">';
    $exclude_id = $post->ID;
    $posttags = get_the_tags(); $i = 0;
    if ( $posttags ) {
        $tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ',';
        $args = array(
					'post_type' => "logo",
          'post_status' => 'publish',
          'tag__in' => explode(',', $tags),
          'post__not_in' => explode(',', $exclude_id),
          'ignore_sticky_posts' => 1,
          'orderby' => 'comment_date',
          'posts_per_page' => $post_num
				);
        query_posts($args);
        while( have_posts() ) { the_post(); ?>

					<div class="col-lg-3">
						<article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">

							<div class="card-img-top">
								<?php if( has_post_thumbnail() ) : ?>

									<a href="<?php the_permalink(); ?>">
										 <?php the_post_thumbnail( 'full', ['class' => 'card-img-top'] ); ?>
									</a>

								<?php else: // no thumbnail ?>

									<a href="<?php the_permalink(); ?>">
										 <img src="<?php echo get_theme_file_uri( 'img/placeholder.png' ); ?>" alt="<?php the_title(); ?>">
									</a>
								<?php endif; ?>
							</div>

							<header class="card-body">

								<?php the_title( sprintf( '<p class="card-text"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
								'</a></p>' ); ?>

							</header>
						</article>
					</div>

					<?php $exclude_id .= ',' . $post->ID; $i ++;
        }
		wp_reset_query();
    }
    if ( $i < $post_num ) {
        $terms = '';
				foreach ( get_terms() as $term ) $terms .= $term->term_ID . ',';
        $args = array(
					'post_type' => "logo",
          'term__in' => explode(',', $terms),
          'post__not_in' => explode(',', $exclude_id),
          'ignore_sticky_posts' => 1,
          'orderby' => 'comment_date',
          'posts_per_page' => $post_num - $i
				);
        query_posts($args);
        while( have_posts() ) { the_post(); echo wp_get_post_terms(get); ?>

					<div class="col-lg-3">
						<article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">

							<div class="card-img-top">
								<?php if( has_post_thumbnail() ) : ?>

									<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'full', ['class' => 'card-img-top'] ); ?>
									</a>

								<?php else: // no thumbnail ?>

									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo get_theme_file_uri( 'img/placeholder.png' ); ?>" alt="<?php the_title(); ?>">
									</a>
								<?php endif; ?>
							</div>

							<header class="card-body">

								<?php the_title( sprintf( '<p class="card-text"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
								'</a></p>' ); ?>

							</header><!-- .entry-header -->

						</article><!-- #post-## -->
					</div>

					<?php $i++;
        }
		wp_reset_query();
    }
    if ( $i  == 0 )  echo '<div class="col-12">没有相关文章!</div>';
    echo '</div></div>';
}
