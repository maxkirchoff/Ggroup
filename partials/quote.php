<?php if (get_field('display_quote')) : ?>
<div class="quote-component">
    <div class="content feature-quote">
      <div class="quote">
        <?php the_field('quote_content'); ?>
      </div>
      <div class="quote-attribution">
          <div class="quote-attribution-name"><?php the_field('quote_attribution'); ?></div>
          <div class="quote-attribution-title"><?php the_field('quote_attribution_title'); ?></div>
      </div>
    </div>
    <div class="image quote-image">
      <img src="<?php echo wp_get_attachment_image_src(get_field('quote_image'), 'quote_image')[0]; ?>">
    </div>
</div>
<?php endif; ?>
