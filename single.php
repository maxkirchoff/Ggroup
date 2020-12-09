<?php get_header(); ?>
  <main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php if (!has_category('featured') && isset(get_the_category()[0])): ?>
      <?php
        $post = get_post();
        $post_slug = $post->post_name;
        $category_url = '/resources/' . get_the_category()[0]->slug  . "#" . $post_slug;
      ?>
      <script>
        window.location.replace("<?php echo $category_url ?>");
      </script>
      <?php endif; ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="image has-gradient hide-desktop">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="image has-gradient hide-mobile">
              <?php the_post_thumbnail('featured_article_page_image'); ?>
            </div>
          <?php endif; ?>
          <div class="content">
            <?php if ( is_singular() ) { ?>
              <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } else { ?>
              <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php } ?>
          </div>
        </header>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </main>
  <?php require('partials/resources.php'); ?>
<?php get_footer(); ?>
