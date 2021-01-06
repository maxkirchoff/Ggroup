<?php if ($editorials = get_field('recent_editorials')) : ?>
    <div class="editorial-wrapper">
        <h2>
            <strong>02</strong>
            <br>
            <?php echo $editorials['title']; ?>
        </h2>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '-1'
            );

            $post_query = new WP_Query($args);
            $post_count = 0;
            if ($post_query->have_posts() ) : 
        ?>
            <div class="editorials">
                <div class="editorial-group">
                    <?php 
                        while($post_query->have_posts() ) :
                        $post_query->the_post();
                    ?>
                        <?php if ($post_count >= 5): ?>
                            </div><div class="editorial-group">
                        <?php 
                            $post_count = 0;
                            endif;
                        ?>

                        <div class="editorial">
                            <div class="feature-image">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-post-thumbnail.jpg">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="feature-content">
                                <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                            
                                <a class="link-arrow" href="<?php echo get_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-btn.svg"></a>
                            </div>
                        </div>
                            
                    <?php $post_count = $post_count + 1; endwhile; ?>
                </div>
                <div class="button-wrapper">
                    <a class="load-more button" href="#">MORE</a>
                </div>
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

