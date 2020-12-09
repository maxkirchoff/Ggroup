<?php if (get_field('display_about_content')) : ?>
<div class="about-content">
  <div class="image">
    <img src="<?php echo wp_get_attachment_image_src(get_field('about_image'), 'quote_image')[0]; ?>">
  </div>
  <div class="content">
    <?php the_field('about_content'); ?>
  </div>

</div>
<?php endif; ?>
