<div class="homepage-hero">
    <?php if ($newsletter = get_field('newsletter')) : ?>
        <div class="newsletter">
            <form>
                <label for="subscirbe-input" class="prompt">
                    <?php echo $newsletter['prompt'] ?>
                </label>
                <input name="subscirbe-input" type="email" />
                <button> <?php echo $newsletter['button_text'] ?></button>
            </form>
        </div>
    <?php endif; ?>
    <?php if( have_rows('magazine_preview') ): ?>
        <div class="magazine-preview">
            <?php while( have_rows('magazine_preview') ): the_row(); 

                // Get sub field values.
                $image = get_sub_field('image');

                ?>
                <div class="image">
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

