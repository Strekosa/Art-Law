<?php
$style = get_sub_field('style');
?>

<section class="half-and-half wrapper  <?php echo $style; ?>">
    <div class="flex  justify-center container-boxed flex-sm-column">
        <?php
        if (have_rows('half_left')):
            // Loop through rows.
            while (have_rows('half_left')) :
                the_row();
                ?>

                <?php
                if (get_row_layout() == 'content'):
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    $button = get_sub_field('button');
                    ?>
                    <div class="half left-side  w-100-sm  flex column ">

                        <?php
                        if (!empty($title)): ?>
                            <h2 class="secondary"><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <div class="left-side__text">
                            <?php if (!empty($description)): ?>
                                <?php echo $description; ?>
                            <?php endif; ?>
                            <?php if (!empty($button)): ?>
                                <a class="btn wide "
                                   href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?>
                                </a>
                            <?php endif; ?>


                            <?php if (have_rows('accordion_list')): ?>
                                <div class="flex column">

                                    <ul class="accordion-list">

                                        <?php while (have_rows('accordion_list')): the_row();

                                            $title = get_sub_field('question');
                                            $text = get_sub_field('answer');
                                            ?>

                                            <li class="">

                                                <div class="question flex align-center justify-between">
                                                    <div class="div">
                                                        <h6> <?php echo $title; ?></h6>
                                                    </div>
                                                    <svg class="close" width="14" height="14" viewBox="0 0 14 14"
                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7 0V14M0 7H14" stroke="#A3303A" stroke-width="2"/>
                                                    </svg>
                                                    <svg class="open" width="14" height="2" viewBox="0 0 14 2" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 1H14" stroke="#A3303A" stroke-width="2"/>
                                                    </svg>
                                                </div>
                                                <div class="answer">
                                                    <?php echo $text; ?>
                                                </div>
                                            </li>
                                        <?php
                                        endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>


                        </div>
                    </div>
                <?php endif; ?>
            <?php
                // End loop.
            endwhile;
        endif; ?>


        <?php
        if (have_rows('half_right')):
        // Loop through rows.
        while (have_rows('half_right')) :
        the_row();
        ?>
        <div class="half right-side  w-100-sm  flex column ">
            <?php
            if (get_row_layout() == 'content'):
                $title = get_sub_field('title');
                $description = get_sub_field('text');
                $button = get_sub_field('button');
                ?>


                <?php
                if (!empty($title)): ?>
                    <h2 class="secondary"><?php echo $title; ?></h2>
                <?php endif; ?>
                <div class="right-side__text">
                    <?php if (!empty($description)): ?>
                        <?php echo $description; ?>
                    <?php endif; ?>
                    <?php if (!empty($button)): ?>
                        <a class="btn wide "
                           href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if (have_rows('accordion_list')): ?>
                        <div class="flex column">

                            <ul class="accordion-list">

                                <?php while (have_rows('accordion_list')): the_row();

                                    $title = get_sub_field('question');
                                    $text = get_sub_field('answer');
                                    ?>

                                    <li class="">

                                        <div class="question flex align-center justify-between">
                                            <div class="div">
                                                <h6> <?php echo $title; ?></h6>
                                            </div>
                                            <svg class="close" width="14" height="14" viewBox="0 0 14 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0V14M0 7H14" stroke="#A3303A" stroke-width="2"/>
                                            </svg>
                                            <svg class="open" width="14" height="2" viewBox="0 0 14 2" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 1H14" stroke="#A3303A" stroke-width="2"/>
                                            </svg>
                                        </div>
                                        <div class="answer">
                                            <?php echo $text; ?>
                                        </div>
                                    </li>
                                <?php
                                endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

            <?php
            elseif (get_row_layout() == 'schedule'):
            $schedule = get_sub_field('schedule');
            $speakers = get_sub_field('speakers');
            $title = get_sub_field('title');
            ?>
            <?php
            if (!empty($title)): ?>
                <h2 class="secondary"><?php echo $title; ?></h2>
            <?php endif; ?>
            <div class="right-side__text">
                <div class="schedule">
                    <?php
                    if (!empty($schedule)):?>
                        <?php echo $schedule; ?>
                    <?php endif; ?>
                </div>
                <div class="speakers">
                    <?php
                    $title = get_sub_field('title_speakers');
                    if (!empty($title)): ?>
                        <h6><?php echo $title; ?></h6>
                    <?php endif; ?>
                    <?php
                    $featured_posts = get_sub_field('speakers');
                    if ($featured_posts): ?>
                    <ul class="speakers-list flex  column ">
                        <?php
                        $i = 1;
                        foreach ($featured_posts

                                 as $post):

                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post); ?>

                            <li class="speaker flex  pos-rel">

                                <div class="speaker-front">

                                    <a href="#popup-init-<?php echo $i; ?>" class="speaker-name">
                                        <?php the_title(); ?>
                                    </a>

                                    <?php
                                    $subtitle = get_field('subtitle');
                                    if (!empty($subtitle)):?>
                                        <?php echo $subtitle; ?>
                                    <?php endif; ?>
                                </div>

                                <div class="popup" id="popup-init-<?php echo $i; ?>">
                                    <div class="popup-body">
                                        <div class="speaker-content popup-content pos-rel">
                                            <div class="popup-close">
                                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="21" cy="21" r="21" fill="#F5F5F5"/>
                                                    <path d="M15.1302 14.875L27.125 27.125M27.125 14.875L14.875 27.125"
                                                          stroke="#BCBCBC" stroke-width="2.1" stroke-linecap="round"/>
                                                </svg>
                                            </div>
                                            <div class="speaker-main flex align-center">
                                                <?php if (has_post_thumbnail()): ?>
                                                    <div class="speaker-image">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="speaker-title flex column">
                                                    <?php the_title(); ?>
                                                    <?php
                                                    $subtitle = get_field('subtitle');
                                                    if (!empty($subtitle)):?>
                                                        <?php echo $subtitle; ?>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                            <div class="speaker-text">
                                                <?php
                                                the_content();
                                                ?>
                                                <div class="speaker-link">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php _e('Learn More... '); ?>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </li>

                            <?php
                            $i++;
                        endforeach; ?>
                </div>
                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>
    </div>
    <?php
    // End loop.
    endwhile;
    endif; ?>

    </div>
</section>