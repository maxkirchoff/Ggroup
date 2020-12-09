<?php if (get_field('display_10x_ceo_team')) : ?>
<div class="tenx-ceo-team">
  <div class="inner-wrapper">
  <h2><?php the_field('10x_ceo_team_title'); ?></h2>
  <?php
    $args = array(
        'post_type'=> 'team_member',
        'limit'    => '-1'
        );

    $the_query = new WP_Query( $args );

    if($the_query->have_posts() ) :
  ?>
    <div class="team-members">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
        <div class="team-member">
          <a class="team-member-card" href="<?php the_permalink(); ?>">
            <div class="image">
              <img src="<?php echo wp_get_attachment_image_src(get_field('image'), 'headshot_image')[0]; ?>">
            </div>
            <div class="content">
              <div class="name">
                <?php the_title(); ?>
              </div>
              <div class="title">
                <?php the_field('title'); ?>
              </div>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; wp_reset_postdata(); ?>
</div>
</div>


<?php endif; ?>
