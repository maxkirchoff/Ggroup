<?php if (get_field('display_hero')) : ?>
    <div class="page-hero <?php the_field('hero_colorway'); ?>" style="background-image: url('<?php echo wp_get_attachment_image_src(get_field('hero_background_image'), 'resources_header_image')[0]; ?>');">
        <div class="content">
            <h1><?php the_field('hero_title'); ?></h1>
            <div class="subtitle">
              <?php the_field('hero_content'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
