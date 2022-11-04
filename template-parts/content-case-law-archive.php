<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Example
 */

?>

<a href=" <?php the_permalink(); ?>"
   class="case-law-corner-item flex column justify-between">
    <div class="case-law-corner-item-title">
        <?php
        if ($title = get_field('title')):
            echo $title;
        else:
            the_title();
        endif; ?>
    </div>
    <svg width="53" height="16" viewBox="0 0 53 16" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M52.0234 8.70711C52.4139 8.31658 52.4139 7.68342 52.0234 7.29289L45.6594 0.928932C45.2689 0.538408 44.6357 0.538408 44.2452 0.928932C43.8547 1.31946 43.8547 1.95262 44.2452 2.34315L49.9021 8L44.2452 13.6569C43.8547 14.0474 43.8547 14.6805 44.2452 15.0711C44.6357 15.4616 45.2689 15.4616 45.6594 15.0711L52.0234 8.70711ZM0.585938 9H51.3163V7H0.585938V9Z"
              fill="#83303A"/>
    </svg>

</a>