<article <?php post_class('card l-shadow-v6 border-0 mb-4'); ?> id="post-<?php the_ID(); ?>">

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

  <div class="card-body entry-header">

      <?php the_title( sprintf( '<h3 class="entry-title h4"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
      '</a></h3>' ); ?>

      <?php if ( 'post' == get_post_type() ) : ?>

        <div class="entry-meta card-text">
          <?php leantheme_posted_on(); ?>
        </div><!-- .entry-meta -->

      <?php endif; ?>
  </div>  <!-- .entry-header -->

</article><!-- #post-## -->
