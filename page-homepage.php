<?php
/*
Template Name: Homepage
*/

get_header();

?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php require('partials/homepage_hero.php'); ?>

  <div class="scrolling-columns" style="background-image: url('<?php echo get_field('hidden_image')['url']; ?>');">
    <div class="column">
      <div class="column-inner-wrapper">
        <?php require('partials/homepage_col_1.php'); ?>
      </div>
    </div>
    <div class="column">
      <div class="column-inner-wrapper">
        <?php require('partials/homepage_col_2.php'); ?>
      </div>
    </div>
    <div class="column">
      <div class="column-inner-wrapper">
        <?php require('partials/homepage_col_3.php'); ?>
      </div>
    </div>
  </div>
  
  
  

<?php endwhile; endif; ?>
<?php

get_footer( 'homepage' );
