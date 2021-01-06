<?php get_header(); ?>
  <main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="image">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endif; ?>
          <div class="column">
            <a href="javascript:history.back()" class="back-button">Back</a>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="attributions">
              <div class="byline">Written by <?php the_author(); ?></div>
              <?php if (get_field('image_attribution')): ?>
                <div class="image-caption">Image via <?php the_field('image_attribution'); ?></div>
              <?php endif; ?>
            </div>
          </div>
        </header>
        <div class="entry-content">
          <?php if (get_field('intro')): ?>
            <div class="intro">
              <?php the_field('intro'); ?>
            </div>
          <?php endif; ?>
          <div class="row">
            <div class="references">
              <h3>References</h3>

            </div>
            <div class="content-copy">
              <?php the_content(); ?>
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="20" height="20" fill="#16161D"/>
</svg>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </main>
<?php get_footer(); ?>
