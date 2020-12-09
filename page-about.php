<?php
/*
Template Name: About
*/

get_header();

?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php require('partials/page_hero.php'); ?>
  <?php require('partials/about_content.php'); ?>
  <?php require('partials/qualifications.php'); ?>
  <?php require('partials/vc_info.php'); ?>
  <?php require('partials/quote.php'); ?>
  <?php require('partials/resources.php'); ?>

<?php endwhile; endif; ?>
<?php

get_footer( 'homepage' );
