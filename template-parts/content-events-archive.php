<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Example
 */

?>

<?php if ($link = get_field('event_link')):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_blank';
    ?>
    <a class="events-archive-item  flex column"
       href="<?php echo esc_url($link_url); ?>"
       target="<?php echo esc_attr($link_target); ?>">
        <?php if (has_post_thumbnail()): ?>
            <div class="events-archive-img">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
            </div>
        <?php endif; ?>
        <div class="events-archive-content flex column">
            <!--        <h3>--><?php //echo wp_trim_words(get_the_title(), 20, '...') ; ?><!-- </h3>-->
            <h3 class="hide-large-down"><?php echo mb_strimwidth(get_the_title(), 0, 120, '...') ; ?> </h3>
            <h3 class="show-large-down"><?php echo mb_strimwidth(get_the_title(), 0, 80, '...') ; ?> </h3>
            <div class="events-archive-date">
                <?php echo get_the_date('l, F j , Y'); ?>
            </div>
        </div>

    </a>
<?php else: ?>
    <div class="events-archive-item  flex column ">
        <?php if (has_post_thumbnail()): ?>
            <div class="events-archive-img">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
            </div>
        <?php endif; ?>
        <div class="events-archive-content flex column">
            <!--        <h3>--><?php //echo wp_trim_words(get_the_title(), 20, '...') ; ?><!-- </h3>-->
            <h3 class="hide-large-down"><?php echo mb_strimwidth(get_the_title(), 0, 120, '...') ; ?> </h3>
            <h3 class="show-large-down"><?php echo mb_strimwidth(get_the_title(), 0, 80, '...') ; ?> </h3>
            <div class="events-archive-date">
                <?php echo get_the_date('l, F j , Y'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!--<a href="--><?php //the_permalink(); ?><!--" class="events-archive-item  flex column ">-->
<!--    --><?php //if (has_post_thumbnail()): ?>
<!--        <div class="events-archive-img">-->
<!--            --><?php //the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
<!--        </div>-->
<!--    --><?php //endif; ?>
<!--    <div class="events-archive-content flex column">-->
<!---->
<!--        <h3 class="hide-large-down">--><?php //echo mb_strimwidth(get_the_title(), 0, 120, '...') ; ?><!-- </h3>-->
<!--        <h3 class="show-large-down">--><?php //echo mb_strimwidth(get_the_title(), 0, 80, '...') ; ?><!-- </h3>-->
<!--        <div class="events-archive-date">-->
<!--            --><?php //echo get_the_date('l, F j , Y'); ?>
<!--        </div>-->
<!--    </div>-->
<!--</a>-->