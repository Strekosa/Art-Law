<section class="clinics wrapper">
    <div class="clinics-main container-boxed column">
        <?php if ($title = get_sub_field('title')): ?>
            <h2 class="general"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($subtitle = get_sub_field('subtitle')): ?>
            <?php echo $subtitle; ?>
        <?php endif; ?>
        <?php
        $featured_posts = get_sub_field('clinics');
        if ($featured_posts): ?>
            <div class="clinics-list">
                <?php foreach ($featured_posts as $post): ?>
                    <div class="clinic flex column">
                        <div class="clinic-img">
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </div>
                        <div class="clinic-content flex column align-start justify-between">
                            <?php echo the_content(); ?>

                            <?php
                            $link = get_field('clinic_link');
                            if ($link):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="clinic-link button general"
                                   href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach;
                ?>
            </div>
            <?php
            wp_reset_postdata();
        endif; ?>

    </div>
</section>