<?php if (get_field('display_ceos')) : ?>
<div class="featured-ceos">
    <h2><?php the_field('ceos_title'); ?></h2>
    <div class="ceo-list">
        <?php
            if( have_rows('ceos') ):
                while ( have_rows('ceos') ) : the_row();
                ?>
                    <div class="ceo">
                      <div class="image">
                        <img src="<?php echo wp_get_attachment_image_src(get_sub_field('image'), 'headshot_image')[0]; ?>">
                      </div>
                      <div class="content">
                        <div class="name">
                          <?php the_sub_field('name'); ?>
                        </div>
                        <div class="title">
                          <?php the_sub_field('title'); ?>
                        </div>
                      </div>
                    </div>
                <?php
                endwhile;
            endif;
        ?>
    </div>
</div>


<?php endif; ?>
