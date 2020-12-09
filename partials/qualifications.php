<?php if (get_field('display_qualifications')) : ?>
<div class="qualifications-component" style="background-image: url('<?php echo wp_get_attachment_image_src(get_field('qualifications_background_image'), 'resources_header_image')[0]; ?>');">
    <div class="supertitle"><?php the_field('qualifications_supertitle'); ?></div>
    <h2><?php the_field('qualifications_title'); ?></h2>
    <div class="qualification-list">
        <?php
            if( have_rows('qualifications') ):
                $idx = 1;
                while ( have_rows('qualifications') ) : the_row();
                ?>
                    <div class="qualification">
                        <div class="image icon">
                          <img src="<?php echo wp_get_attachment_image_src(get_sub_field('icon'), 'small')[0]; ?>">
                        </div>
                        <div class="content">
                          <div class="title">
                              <?php the_sub_field('title'); ?>
                          </div>
                          <div class="description">
                              <?php the_sub_field('content'); ?>
                          </div>
                        </div>
                    </div>
                <?php
                $idx++;
                endwhile;
            endif;
        ?>
    </div>
</div>
<?php endif; ?>
