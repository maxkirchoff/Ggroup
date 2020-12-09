<?php if (get_field('display_program_features')) : ?>
<div class="program-component">
    <div class="program-features">
        <?php
            if( have_rows('program_features') ):
                while ( have_rows('program_features') ) : the_row();
                ?>
                    <div class="program-feature">
                        <div class="content">
                            <div class="feature-quote">
                                <div class="feature-title">
                                    <?php the_sub_field('title'); ?>
                                </div>
                                <div class="quote">
                                  <?php the_sub_field('quote'); ?>
                                </div>
                                <div class="quote-attribution">
                                    <div class="quote-attribution-name"><?php the_sub_field('quote_attribution'); ?></div>
                                    <div class="quote-attribution-title"><?php the_sub_field('quote_attribution_title'); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="image quote-image">
                            <img src="<?php echo wp_get_attachment_image_src(get_sub_field('image'), 'quote_image')[0]; ?>">
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
        ?>
    </div>
</div>
<?php endif; ?>
