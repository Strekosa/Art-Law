
<section class="calendar wrapper ">
    <div class="container-boxed flex column align-center">

        <?php
        $title = get_sub_field('title');
        if (!empty($title)): ?>
            <h2 class="general text-center sm-text-start"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php
        $subtitle = get_sub_field('subtitle');
        if (!empty($title)): ?>
            <div class="calendar-subtitle text-center sm-text-start"><?php echo $subtitle; ?></div>
        <?php endif; ?>

        <div class="calendar-main">
            <?php
            if (get_sub_field('calendar')):
            $featured_posts = get_sub_field('calendar');
            if ($featured_posts):
            ?>

            <?php foreach ($featured_posts as $p):

                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($p);

                ?>
                <div class="flex flex-wrap justify-center  flex-xs-column">


                    <?php
                    echo do_shortcode('[calendar id="1335"]');
                    ?>

                </div>
            <?php
            endforeach; ?>


            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata();
            ?>
            <div class="calendar-info flex justify-between align-center">
                <?php
                $text = get_sub_field('text');
                if (!empty($text)): ?>
                    <div class="calendar-text text-center sm-text-start"><?php echo $text; ?></div>
                <?php endif; ?>
                <?php
                if ($link = get_sub_field('link')):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="calendar-link button" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                    </a>

                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php endif; ?>


    </div>
</section>