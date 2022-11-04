<section class="publications wrapper">
    <div class="container-boxed flex column ">
        <?php
        $title = get_sub_field('title');
        if ($title) : ?>
            <h2 class="general"> <?php echo $title; ?></h2>
        <?php endif; ?>

        <div class="hide-on-mobile">
            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


            $arg = array(
                'post_type' => 'post',
                'orderby' => 'date',
                'posts_per_page' => 9,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
                        'field' => 'slug',
                        'terms' => 'press-publications', // Your category slug (I have a category 'interior')
                    ),
                )
            );

            $the_query = new WP_Query($arg);
            $counter = $the_query->found_posts;
            if ($the_query->have_posts()) : ?>
                <?php single_cat_title($prefix, $display); ?>
                <div class="publications-all ">
                    <?php while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $do_not_duplicate = $post->ID;
                    $link = get_field('post_link');
                    ?><!-- BEGIN of Post -->

                    <div class="publication ">
                        <div class="publication-content flex column justify-between">
                            <div class="publication-text flex column">
                                <h3><?php echo wp_trim_words(get_the_title(), 26); ?></h3>
                            </div>
                            <div class="publication-info flex justify-between">
                                <div class="publication-date"><?php echo get_the_date(); ?></div>

                                <?php
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_blank';
                                    ?>
                                    <a class="publication-link hide-on-mobile" href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?> _blank">
                                        <?php echo esc_html($link_title); ?>
                                    </a>

                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                    <?php

                    endwhile; ?><!-- END of Post -->

                </div><!-- END of .post-type -->
            <?php endif;
            wp_reset_query(); ?>
        </div>

        <div class="show-on-mobile">

            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $arg = array(
                'post_type' => 'post',
                'orderby' => 'date',
                'posts_per_page' => 4,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
                        'field' => 'slug',
                        'terms' => 'press-publications', // Your category slug (I have a category 'interior')
                    ),
                )
            );
            $the_query = new WP_Query($arg);
            if ($the_query->have_posts()) : ?>
                <div class="publications-all ">
                    <?php while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $do_not_duplicate = $post->ID;
                    $link = get_field('post_link');
                    ?>
                    <div class="publication ">
                        <?php
                        if ($link):
                            $link_url = $link['url'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="publication-content flex column justify-between" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?> _blank">
                                <div class="publication-text flex column">
                                    <h3><?php echo wp_trim_words(get_the_title(), 26); ?></h3>
                                </div>
                                <div class="publication-info flex justify-between">
                                    <div class="publication-date"><?php echo get_the_date(); ?></div>

                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?><!-- END of Post -->

                </div><!-- END of .post-type -->
            <?php endif;
            wp_reset_query(); ?>
        </div>

        <div class="lm-btn">
            <?php if ($the_query->max_num_pages > 1) : ?>
                <button class="button" id="loadmore" data-counter="<?php echo $counter; ?>">View more</button>
            <?php endif; ?>
        </div>
    </div>

</section>