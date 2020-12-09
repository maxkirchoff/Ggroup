<?php if ($shop = get_field('shop')) : ?>
    <div class="shop-wrapper">
        <h2>
            <strong>03</strong>
            <br>
            <?php echo $shop['title']; ?>
        </h2>
    </div>
<?php endif; ?>

<?php if ($resource_library = get_field('resource_library')) : ?>
    <div class="resource-library">
        <h2>
            <strong>04</strong>
            <br>
            <?php echo $resource_library['title']; ?>
        </h2>

        <?php
           $args = array( 
            'post_type' => 'resources',
            'meta_key' => 'type',
            'meta_value' => 'pdf'
            );
            $post_query = new WP_Query( $args );

            if ($post_query->have_posts() ) : 
        ?>
            <h3>PDF LIBRARY</h3>
            <div class="pdfs">
                <?php 
                    while($post_query->have_posts() ) :
                    $post_query->the_post();
                ?>
                    <div class="pdf">
                        <div class="resource-image">
                            <img src="<?php echo get_field('image')['url']; ?>">
                        </div>
                        <div class="resource-content">
                            <div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div>
                                <a href="<?php the_field('pdf'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-btn.svg"></a>
                            </div>
                        </div>
                        
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

        <?php
           $args = array( 
            'post_type' => 'resources',
            'meta_key' => 'type',
            'meta_value' => 'video'
            );
            $post_query = new WP_Query( $args );

            if ($post_query->have_posts() ) : 
        ?>
            <h3>VIDEO LIBRARY</h3>
            <div class="videos">
                <?php 
                    while($post_query->have_posts() ) :
                    $post_query->the_post();
                ?>
                    <div class="video">
                        <div class="resource-image">
                            <img src="<?php echo get_field('image')['url']; ?>">
                        </div>
                        <div class="resource-content">
                            <div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div>
                                <a href="<?php the_field('video_url'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-btn.svg"></a>
                            </div>
                        </div>
                        
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        
    </div>
<?php endif; ?>

        
    <div class="newsletter">
        <form>
            <label for="subscirbe-input" class="prompt">
                <?php echo $editorials['subscribe_prompt'] ?>
            </label>
            <input name="subscirbe-input" type="email" />
            <button> <?php echo $editorials['subscribe_button_text'] ?></button>
        </form>
    </div>

