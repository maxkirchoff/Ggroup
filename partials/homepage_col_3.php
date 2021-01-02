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
            'meta_value' => 'video'
            );
            $post_query = new WP_Query( $args );

            if ($post_query->have_posts() ) : 
        ?>
            <div class="videos">
                <?php 
                    while($post_query->have_posts() ) :
                    $post_query->the_post();
                ?>
                    <div class="video">
                        <div class="resource-image">
                            <a href="<?php the_field('video_url'); ?>" target="_blank">
                                <img src="<?php echo get_field('image')['url']; ?>">
                            </a>
                        </div>
                        <div class="resource-content">
                                <h3><?php the_title(); ?></h3>
                           
                                <a href="<?php the_field('video_url'); ?>" class="link-arrow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-btn.svg"></a>
                        </div>
                        
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        
    </div>
<?php endif; ?>
