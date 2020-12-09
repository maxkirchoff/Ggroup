<?php if (get_field('display_vc')) : ?>
<div class="vc-component">
    <h2><?php the_field('vc_title'); ?></h2>
    <ul class="vc-list">
        <?php
            if( have_rows('vcs') ):
                $idx = 1;
                while ( have_rows('vcs') ) : the_row();
                ?>
                    <li class="vc">
                      <?php if (get_sub_field('url')): ?>
                        <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('name'); ?></a>
                      <?php else: ?>
                        <?php the_sub_field('name'); ?>
                      <?php endif; ?>
                    </li>
                <?php
                $idx++;
                endwhile;
            endif;
        ?>
    </ul>
</div>
<?php endif; ?>
