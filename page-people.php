<?php
/*
Template Name: People
*/

get_header();

?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php require('partials/page_hero.php'); ?>
  <?php require('partials/10xceo_team.php'); ?>
  <?php require('partials/ceos.php'); ?>
  <?php require('partials/quote.php'); ?>
  <?php require('partials/resources.php'); ?>

<?php endwhile; endif; ?>
<?php

get_footer( 'homepage' );
