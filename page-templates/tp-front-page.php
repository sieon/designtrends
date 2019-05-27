<?php
/**
 * Template Name: 首页模版
 *
 * 首页的模板
 *
 * @package writing
 */

 get_header();
 ?>

 <?php if ( is_front_page() ) : ?>
 	<?php get_template_part( 'global-templates/hero', 'none' ); ?>
 <?php endif; ?>

 <div class="wrapper" id="wrapper-index">
   <div class="container">
     <main class="site-main" id="main">

       <?php dynamic_sidebar( 'front-page-main-content-widgets' ); ?>

     </main><!-- #main -->
   </div>
 </div><!-- Wrapper end -->


 <?php get_footer(); ?>
