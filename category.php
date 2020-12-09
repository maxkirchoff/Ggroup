<?php get_header(); ?>
<main id="content">
  <header class="header">
    <?php $category= get_queried_object(); ?>
    <?php if ( get_field('category_image', $category) ) : ?>
      <div class="image has-gradient hide-desktop">
        <img src="<?php echo wp_get_attachment_image_src(get_field('category_image', $category), 'post-thumbnail')[0]; ?>">
      </div>
      <div class="image has-gradient hide-mobile">
        <img src="<?php echo wp_get_attachment_image_src(get_field('category_image', $category), 'featured_article_page_image')[0]; ?>">
      </div>
    <?php endif; ?>

    <div class="content">
      <h1 class="category-title"><?php single_term_title(); ?></h1>
    </div>
  </header>
  <?php
    $args = array(
      'category' => $category->cat_ID,
      'posts_per_page' => -1
    );
    $posts = get_posts($args);
    if($posts):
  ?>
    <div class="resource-posts">
      <?php
        foreach ($posts as $post):
        setup_postdata($post);
      ?>
        <div class="post" id="<?php echo $post->post_name ?>">
          <h2><?php the_title(); ?></h2>
          <div class="entry-content">
            <?php $more = 1; the_content(); ?>
          </div>
        </div>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  <?php endif; ?>
  </ul>
  <div class="posts">
  </div>
</main>
<?php get_footer(); ?>
