<?php get_header(); ?>
<main id="content">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="page-content"><?php the_content(); ?></div>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
