<?php get_header(); ?>
  <main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article id="team-member-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>
          <h1><?php the_title(); ?></h1>
          <div class="member-title"><?php the_field('title'); ?></div>
          <?php if ( get_field('image') ) : ?>
            <div class="image">
              <img src="<?php echo wp_get_attachment_image_src(get_field('image'), 'headshot_image')[0]; ?>">
            </div>
          <?php endif; ?>
          <div class="social">
            <div class="lead-in">Get in Touch</div>
            <ul class="social-links">
              <?php if (get_field('email_address')): ?>
                <li><a href="mailto:<?php the_field('email_address') ?>"><img src="<?php echo get_template_directory_uri() ?>/images/link-email.svg" alt="email icon"></a></li>
              <?php endif; ?>
              <?php if (get_field('linkedin_url')): ?>
                <li><a href="<?php the_field('linkedin_url') ?>"><img src="<?php echo get_template_directory_uri() ?>/images/link-linkedin.svg" alt="Linkedin icon"></a></li>
              <?php endif; ?>
              <?php if (get_field('twitter_url')): ?>
                <li><a href="<?php the_field('twitter_url') ?>"><img src="<?php echo get_template_directory_uri() ?>/images/link-twitter.svg" alt="Twitter icon"></a></li>
              <?php endif; ?>
            </ul>
          </div>
        </header>
        <div class="entry-content">
          <?php the_field('bio'); ?>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </main>
  <?php require('partials/resources.php'); ?>
<?php get_footer(); ?>
