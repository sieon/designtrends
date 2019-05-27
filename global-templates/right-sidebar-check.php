<?php
/**
 * Right sidebar check.
 *
 * @package leantheme
 */
?>

<?php $sidebar_pos = get_theme_mod( 'leantheme_sidebar_position' ); ?>

<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

  <?php get_sidebar( 'right' ); ?>

<?php endif; ?>
