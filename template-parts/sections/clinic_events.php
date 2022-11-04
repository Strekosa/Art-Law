<section class="clinic-events">
    <div class="container-boxed flex column">
        <?php if ($field = get_sub_field('title')): ?>
            <h2 class="general"><?php echo $field; ?></h2>
        <?php endif; ?>

        <?php
        $i = 1;
        $featured_posts = get_sub_field('clinic_events');
        if ($featured_posts):

            ?>
            <div class="clinic-events-main clinic-events-slider">
                <?php foreach ($featured_posts as $post):
                    setup_postdata($post);
                    $subtitle = get_field('subtitle');
                    $link = get_field('event_link');
                    ?>

                    <?php if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="clinic-event  flex column align-start slick-slide"
                       href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>">
                        <div class="clinic-event-img">
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </div>
                        <div class="clinic-event-content flex column">
                            <div class="flex justify-between align-center">
                                <h6><?php echo $subtitle; ?></h6>
                                <div class="clinic-event-date">
                                    <?php echo get_the_date('l, F j , Y'); ?> at <?php echo get_the_time('G:i') ?>
                                </div>
                            </div>
                            <h3><?php the_title(); ?> </h3>
                        </div>

                    </a>
                <?php else: ?>
                    <div class="clinic-event  flex column align-start slick-slide">

                        <div class="clinic-event-img">
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </div>
                        <div class="clinic-event-content flex column">
                            <div class="flex justify-between align-center">
                                <h6><?php echo $subtitle; ?></h6>
                                <div class="clinic-event-date">
                                    <?php echo get_the_date('l, F j , Y'); ?> at <?php echo get_the_time('G:i') ?>
                                </div>
                            </div>
                            <h3><?php the_title(); ?> </h3>
                        </div>
                    </div>
                <?php endif; ?>


                    <?php
                    $i++;
                    if ($i > 5) {
                        break;
                    }
                endforeach; ?>

            </div>
            <div class="arrows flex justify-between align-center">
                <!-- Next page -->
                <button class="arrow prev flex align-center">
                    <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M3.08062 6.99999L18 6.99999C18.5523 6.99999 19 6.55228 19 5.99999C19 5.44771 18.5523 4.99999 18 4.99999L3.08062 4.99999L5.78087 1.62469C6.12588 1.19343 6.05596 0.564135 5.62469 0.219125C5.19343 -0.125885 4.56414 -0.0559635 4.21913 0.375299L0.469009 5.06295C0.422319 5.12131 0.380603 5.18229 0.343861 5.24533C0.133177 5.42867 0 5.69878 0 5.99999C0 6.30121 0.133177 6.57132 0.343861 6.75465C0.380603 6.81769 0.422319 6.87867 0.469009 6.93704L4.21913 11.6247C4.56414 12.056 5.19343 12.1259 5.62469 11.7809C6.05596 11.4359 6.12588 10.8066 5.78087 10.3753L3.08062 6.99999Z"
                              fill="#83303A"/>
                    </svg>
                    Back
                </button>
                <button class="arrow next flex align-center">
                    Next
                    <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M15.9194 6.99999L1 6.99999C0.447716 6.99999 0 6.55228 0 5.99999C0 5.44771 0.447716 4.99999 1 4.99999L15.9194 4.99999L13.2191 1.62469C12.8741 1.19343 12.944 0.564135 13.3753 0.219125C13.8066 -0.125885 14.4359 -0.0559635 14.7809 0.375299L18.531 5.06295C18.5777 5.12131 18.6194 5.18229 18.6561 5.24533C18.8668 5.42867 19 5.69878 19 5.99999C19 6.30121 18.8668 6.57132 18.6561 6.75465C18.6194 6.81769 18.5777 6.87867 18.531 6.93704L14.7809 11.6247C14.4359 12.056 13.8066 12.1259 13.3753 11.7809C12.944 11.4359 12.8741 10.8066 13.2191 10.3753L15.9194 6.99999Z"
                              fill="#83303A"/>
                    </svg>
                </button>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php else: ?>
            <p class="no-events">More events coming soon!</p>
        <?php endif; ?>

        <?php
        $text = get_sub_field('text');
        if (!empty($text)):?>
            <div class="clinic-events-text flex ">
                <h5> <?php echo $text; ?></h5>
            </div>
        <?php endif; ?>

    </div>
</section>
