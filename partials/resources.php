<?php

  if (!get_field('resources_categories')):
    $frontpage_id = get_option( 'page_on_front' );
    $post = get_post( $frontpage_id );
    setup_postdata( $post );
  endif;

  ?>
    <div class="resources">
        <h2><?php the_field('resources_title'); ?></h2>
        <div class="resource-categories">
            <?php
            if (get_field('resources_read_more_label')):
                $read_more = get_field('resources_read_more_label');
            else:
                $read_more = "Read More";
            endif;
            $categories = get_field('resources_categories');
            if( $categories ): ?>
                <div class="category-list">
                    <?php foreach( $categories as $category ): ?>
                        <a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="category">
                            <h3><?php echo esc_html( $category->name ); ?></h3>
                            <button><?php echo $read_more; ?></button>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
  if (isset($frontpage_id)):
    wp_reset_postdata();
  endif;

?>
