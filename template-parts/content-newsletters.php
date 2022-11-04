<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Example
 */

?>
<?php if ($link = get_field('newsletter_link')):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_blank';
    ?>
    <a class="newsletters-item flex column"
       href="<?php echo esc_url($link_url); ?>"
       target="<?php echo esc_attr($link_target); ?>">
        <?php if (has_post_thumbnail()): ?>
            <div class="newsletters-item-img">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
            </div>
        <?php endif; ?>
        <div class="newsletters-item-content">
            <p class="newsletters-item-date"> <?php echo get_the_date(); ?></p>
            <h3 class="newsletters-item-title"> <?php the_title(); ?></h3>
        </div>

    </a>
<?php else: ?>
    <div class="newsletters-item flex column ">
        <?php if (has_post_thumbnail()): ?>
            <div class="newsletters-item-img">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
            </div>
        <?php endif; ?>
        <div class="newsletters-item-content">
            <p class="newsletters-item-date"> <?php echo get_the_date(); ?></p>
            <h3 class="newsletters-item-title"> <?php the_title(); ?></h3>
        </div>
    </div>
<?php endif; ?>
