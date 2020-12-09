<?php if ($editorials = get_field('recent_editorials')) : ?>
    <div class="editorial-wrapper">
        <h2>
            <strong>02</strong>
            <br>
            <?php echo $editorials['title']; ?>
        </h2>
        <?php
            $args = array(
                'post_type' => 'post'
            );

            $post_query = new WP_Query($args);

            if ($post_query->have_posts() ) : 
        ?>
            <div class="editorials">
                <?php 
                    while($post_query->have_posts() ) :
                    $post_query->the_post();
                ?>
                    <div class="editorial">
                        <div class="feature-image">
                            <?php the_post_thumbnail("medium"); ?>
                        </div>
                        <div class="feature-content">
                            <div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div>
                                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-btn.svg"></a>
                            </div>
                        </div>
                        
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
    <div class="newsletter">
        <form>
            <label for="subscirbe-input" class="prompt">
                <?php echo $editorials['subscribe_prompt'] ?>
            </label>
            <input name="subscirbe-input" type="email" />
            <button> <?php echo $editorials['subscribe_button_text'] ?></button>
        </form>
    </div>
<?php endif; ?>

