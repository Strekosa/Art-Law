
<section class="events">
    <?php $featured_posts = get_sub_field('slider'); ?>
    <div class="container-boxed flex column">
        <?php if ($field = get_sub_field('title')): ?>
            <div class="events-title flex justify-between align-center <?php if(!$featured_posts){echo 'justify-center sm-justify-start';}?>">
                <h2 class="general"><?php echo $field; ?></h2>
                <?php if($featured_posts):?>
                    <div class="events-arrows flex justify-end align-center">
                        <!-- Next page -->
                        <button class="arrow events-prev flex align-center">
                            <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M15.9194 6.99996L1 6.99996C0.447716 6.99996 0 6.55225 0 5.99996C0 5.44768 0.447716 4.99996 1 4.99996L15.9194 4.99996L13.2191 1.62466C12.8741 1.1934 12.944 0.564104 13.3753 0.219094C13.8066 -0.125916 14.4359 -0.055994 14.7809 0.375268L18.531 5.06292C18.5777 5.12128 18.6194 5.18226 18.6561 5.2453C18.8668 5.42864 19 5.69875 19 5.99996C19 6.30118 18.8668 6.57129 18.6561 6.75462C18.6194 6.81766 18.5777 6.87864 18.531 6.93701L14.7809 11.6247C14.4359 12.0559 13.8066 12.1258 13.3753 11.7808C12.944 11.4358 12.8741 10.8065 13.2191 10.3753L15.9194 6.99996Z"
                                      fill="black"/>
                            </svg>
                        </button>
                        <button class="arrow events-next flex align-center">
                            <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M15.9194 6.99996L1 6.99996C0.447716 6.99996 0 6.55225 0 5.99996C0 5.44768 0.447716 4.99996 1 4.99996L15.9194 4.99996L13.2191 1.62466C12.8741 1.1934 12.944 0.564104 13.3753 0.219094C13.8066 -0.125916 14.4359 -0.055994 14.7809 0.375268L18.531 5.06292C18.5777 5.12128 18.6194 5.18226 18.6561 5.2453C18.8668 5.42864 19 5.69875 19 5.99996C19 6.30118 18.8668 6.57129 18.6561 6.75462C18.6194 6.81766 18.5777 6.87864 18.531 6.93701L14.7809 11.6247C14.4359 12.0559 13.8066 12.1258 13.3753 11.7808C12.944 11.4358 12.8741 10.8065 13.2191 10.3753L15.9194 6.99996Z"
                                      fill="black"/>
                            </svg>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif; ?>

        <?php
        $featured_posts = get_sub_field('slider');
        if ($featured_posts): ?>
            <div class="events-main flex events-slider">
                <?php foreach ($featured_posts as $post):?>
                    <div class="event slick-slid flex column align-start">
                        <div class="event-img">
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </div>
                        <div class="event-content">

                            <h3><?php the_title(); ?> </h3>
                            <div class="event-date"><?php echo get_the_date('l, F j , Y'); ?> at <?php echo get_the_time( 'G:i' ) ?></div>

                            <?php
                            $link = get_field('event_link');
                            if (!empty($link)):
                            ?>
                            <a class="event-link button button-wide" href="<?php echo esc_url($link['url']); ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>
</section>