<section class="programming wrapper">
    <div class="programming-main container-boxed flex column ">
        <div class="programming-title flex column ">
            <?php
            $title = get_sub_field('title');
            if ($title) : ?>
                <h2 class="general"> <?php echo $title; ?></h2>
            <?php endif; ?>
            <?php
            $subtitle = get_sub_field('subtitle');
            if ($subtitle) : ?>
                <?php echo $subtitle; ?>
            <?php endif; ?>
        </div>
        <div class="hide-on-mobile">
            <?php
            $featured_post = get_sub_field('programming');
            if ($featured_post):
                ?>
                <div class="programming-all ">
                    <?php foreach ($featured_post as $post):
                        setup_postdata($post);
                        $link = get_field('event_link');
                        $date = get_field('date');
                        $subtitle = get_field('subtitle');
                        ?>

                        <div class="programm flex ">
                            <div class="programm-date flex column">
                                <p class="day"><?php echo date("j", strtotime($date)); ?></p>
                                <p class="month"> <?php echo date("F", strtotime($date)); ?></p>
                                <p class="year"><?php echo date("Y", strtotime($date)); ?></p>
                            </div>
                            <div class="programm-content flex column ">
                                <div class="programm-text ">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>

                                </div>
                            </div>
                            <div class="programm-time">
                                <p class="time"><?php echo date("g:i a", strtotime($date)); ?> EST</p>

                                <?php
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="" href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($link_title); ?>
                                    </a>

                                <?php endif; ?>
                                <?php
                                if ($subtitle) : ?>
                                    <?php echo $subtitle; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
            <?php else: ?>
                <p class="no-events">More events coming soon!</p>
            <?php endif; ?>
        </div>
        <div class="show-on-mobile">
            <?php
            $featured_posts = get_sub_field('programming');
            if ($featured_posts):?>
                <div class="programming-all ">
                    <?php foreach ($featured_posts as $post):
                        setup_postdata($post);
                        $link = get_field('event_link');
                        $date = get_field('date');
                        $subtitle = get_field('subtitle'); ?>
                        <ul class="programm flex column accordion-list">
                            <li class="">
                                <div class="programm-date flex justify-between align-center question ">
                                    <div>
                                        <p class="day"><?php echo date("F j", strtotime($date)); ?></p>

                                        <p class="year"><?php echo date("Y", strtotime($date)); ?></p>
                                    </div>
                                    <svg class="close" width="9" height="6" viewBox="0 0 9 6" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M4.20711 2.79289L1.41421 0L0 1.41421L3.5 4.91421C3.89052 5.30474 4.52369 5.30474 4.91421 4.91421L8.41421 1.41421L7 0L4.20711 2.79289Z"
                                              fill="#E5E5E5"/>
                                    </svg>
                                    <svg class="open" width="9" height="6" viewBox="0 0 9 6" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M4.20711 2.41426L1.41421 5.20715L0 3.79294L3.5 0.29294C3.89052 -0.0975842 4.52369 -0.0975842 4.91421 0.29294L8.41421 3.79294L7 5.20715L4.20711 2.41426Z"
                                              fill="#E5E5E5"/>
                                    </svg>
                                </div>
                                <div class="flex column answer">
                                    <div class="programm-content flex column ">
                                        <div class="programm-text ">
                                            <h3><?php the_title(); ?></h3>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                    <div class="programm-time flex align-center justify-between">
                                        <p class="time"><?php echo date("g:i a", strtotime($date)); ?> EST</p>
                                        <?php
                                        if ($link):
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                            <a class="" href="<?php echo esc_url($link_url); ?>"
                                               target="<?php echo esc_attr($link_target); ?>">
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php
                                        if ($subtitle) : ?>
                                            <?php echo $subtitle; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>

                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
            <?php else: ?>
                <p class="no-events">More events coming soon!</p>
            <?php endif; ?>
        </div>
    </div>
</section>