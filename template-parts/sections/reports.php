
<section class="reports wrapper">
    <div class="reports-main container-boxed ">
        <?php
        $featured_posts = get_sub_field('reports');
        if ($featured_posts): ?>
            <div class="reports-list">
                <?php foreach ($featured_posts as $post):
                    $period = get_field('period');
                    $link = get_field('button');
                    $images = get_field('gallery_slider');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    ?>
                    <div class="report pos-rel">
                        <div class="flex column">
                            <h2 class="general"> <?php echo the_title(); ?></h2>
                            <h5><?php echo $period; ?></h5>
                        </div>
                        <?php
                        if ($images): ?>
                            <div class="report-gallery flex gallery-slider">
                                <?php foreach ($images as $image): ?>
                                    <div class=" slick-slid ">
                                        <div class="report-img">
                                            <img src="<?php echo esc_url($image['url']); ?>"
                                                 alt="<?php echo esc_attr($image['alt']); ?>"/>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="pos-abs button general" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            wp_reset_postdata();
        endif; ?>
    </div>
</section>