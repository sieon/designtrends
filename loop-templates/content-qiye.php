<?php
/**
 *
 * @package lean
 */
?>

<div class="col-lg-4 mb-4">
  <div class="card card-qiye border-0 l-shadow-v7">
    <div class="card-body">
      <div class="media">

        <?php the_post_thumbnail( 'full', ['class' => 'card-qiye-img mr-3'] ); ?>

        <div class="media-body">
          <?php the_title( sprintf( '<h2 class="card-title"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
          '</a></h2>' ); ?>

          <div class="card-excerpt small text-muted"><?php the_excerpt(); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
