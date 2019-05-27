<?php
/**
 *
 * @package lean
 */
?>

<?php
    $post_content = get_the_content();
    $link_url = wp_extract_urls($post_content);
    $url_host = parse_url($link_url[0], PHP_URL_HOST);
    $base_url_host = parse_url(home_url(), PHP_URL_HOST);
    $external = true;
    if($url_host == $base_url_host || empty($url_host)) {
        $external = false;
    }
?>

<?php if($external) : ?>

  <li class="list-goup-item mb-4">
    <a class="l-a-v0" href="<?php echo $link_url[0]; ?>" target="_blank" rel="nofollow">
      <div class="card">

        <div class="media">

          <div class="w-25">
              <?php the_post_thumbnail( 'full', ['class' => ''] ); ?>
          </div>

          <div class="media-body w-75 pl-3">

            <?php the_title('<h2 class="h3">','</h2>'); ?>

            <p class="card-text small text-muted"><?php echo wp_trim_words( get_the_excerpt(), 120, '...' );?></p>

          </div>
        </div>

      </div>
    </a>
  </li>

<?php else : ?>


<?php endif; ?>
