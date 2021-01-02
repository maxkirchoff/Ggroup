<?php if ($calendar = get_field('calendar')) : ?>
    <div class="calendar">
        <h2>
            <strong>01</strong>
            <br>
            <?php echo $calendar['title']; ?>
        </h2>


        <?php
            $today = date('Ymd');
           $args = array( 
            'post_type' => 'events',
            'post_status' => 'publish',
            'posts_per_page' => '8',
            'meta_query'  => array(
                array(
                    'key'       => 'date',
                    'value'     => $today,
                    'compare'   => '>=',
                ),
            ),
            'meta_key'	=> 'date',
	        'orderby'	=> 'meta_value',
            'order'		=> 'ASC',
            
            );
            $post_query = new WP_Query( $args );

            if ($post_query->have_posts() ) : 
        ?>
            
            <div class="events">
                <?php 
                    while($post_query->have_posts() ) :
                    $post_query->the_post();
                ?>
                    <div class="event">
                        <div class="date">
                            <?php
                                $myDateTime = DateTime::createFromFormat('Ymd', get_field('date'));
                                $newDateString = $myDateTime->format('D, M j');
                            echo $newDateString ?>
                        </div>
                        <div class="event-title">
                            <?php the_title(); ?>
                        </div>
                        <div class="link-arrow">
                            <a href="<?php the_field('url'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-btn.svg"></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
                    </div>
    <div class="ccoaching">
        <p><?php echo $calendar['ccoaching_prompt']; ?></p>
        <div class="button-wrapper">
            <a href="/ccoaching" class="button"><?php echo $calendar['ccoaching_button_text']; ?></a>
        </div>
    </div>
<?php endif; ?>

