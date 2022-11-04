<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Example
 */

?>

<article id="post-<?php the_ID(); ?>" class="flex column " <?php post_class(); ?>>
    <div class="entry-post flex column">

        <?php if (has_post_thumbnail()): ?>
            <div class="entry-post-img">
                <?php example_theme_post_thumbnail('full', array('class' => 'img-responsive')); ?>
            </div>
            <?php else: ?>
            <div class="entry-post-img">
                <?php the_custom_logo(); ?>
            </div>
        <?php endif; ?>

        <header class="entry-header">

            <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

            <p class="tag">
                <?php
                $posttags = get_the_tags();
                if ($posttags) {
                    foreach ($posttags as $tag) {
                        echo $tag->name . ' ';
                    }
                }
                ?>
            </p>
            <p class="entry-date"><?php echo get_the_date(); ?></p>
        </header>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

