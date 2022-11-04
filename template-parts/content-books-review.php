<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Example
 */

$terms = get_the_terms(get_the_ID(), 'kinds');
?>

<a  href="<?php the_permalink(); ?>" class="books-reviews-item ">
    <div class="books-reviews-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="books-reviews-content">
        <div class="books-reviews-info flex justify-between">
            <div class="books-reviews-category ">

                BOOK <?php echo $terms['0']->name; ?>
            </div>
            <?php echo get_the_date(); ?>
        </div>
        <h3> <?php the_title(); ?></h3>
    </div>
</a>