<?php
/*
Template Name: Books
*/
get_header(); ?>



<section class="books wrapper">
    <div class="books-main container-boxed flex column align-center">
        <div class="books-title text-center xs-text-start">
            <?php if ($title = get_field('books_title_publications ', 'options')): ?>
                <h2 class="general"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($subtitle = get_field('books_subtitle_publications ', 'options')): ?>
                <h5><?php echo $subtitle; ?></h5>
            <?php endif; ?>

        </div>

        <div class="books-publications">
            <?php

            $args = array(
                'post_type' => 'books',
                'orderby' => 'description',
                'order' => 'DESC',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'hide_empty' => true,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'kinds',
                        'terms' => 'publications',
                        'field' => 'slug',
                    )
                ),

            );
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>

                <?php while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $do_not_duplicate = $post->ID;
                    $link = get_field('books_link')
                    ?>


                    <?php
                    if ($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_blank';
                        ?>
                        <a class="books-publications-item flex column justify-between"
                           href="<?php echo esc_url($link_url); ?>"
                           target="<?php echo esc_attr($link_target); ?>">
                            <h3><?php echo esc_html($link_title); ?></h3>
                            <svg width="53" height="16" viewBox="0 0 53 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M52.0234 8.70711C52.4139 8.31658 52.4139 7.68342 52.0234 7.29289L45.6594 0.928932C45.2689 0.538408 44.6357 0.538408 44.2452 0.928932C43.8547 1.31946 43.8547 1.95262 44.2452 2.34315L49.9021 8L44.2452 13.6569C43.8547 14.0474 43.8547 14.6805 44.2452 15.0711C44.6357 15.4616 45.2689 15.4616 45.6594 15.0711L52.0234 8.70711ZM0.585938 9H51.3163V7H0.585938V9Z"
                                      fill="#83303A"/>
                            </svg>
                        </a>
                    <?php else: ?>

                        <a href="<?php the_permalink(); ?>" class="books-publications-item flex column justify-between">
                            <h3>
                                <?php the_title(); ?>
                            </h3>
                            <svg width="53" height="16" viewBox="0 0 53 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M52.0234 8.70711C52.4139 8.31658 52.4139 7.68342 52.0234 7.29289L45.6594 0.928932C45.2689 0.538408 44.6357 0.538408 44.2452 0.928932C43.8547 1.31946 43.8547 1.95262 44.2452 2.34315L49.9021 8L44.2452 13.6569C43.8547 14.0474 43.8547 14.6805 44.2452 15.0711C44.6357 15.4616 45.2689 15.4616 45.6594 15.0711L52.0234 8.70711ZM0.585938 9H51.3163V7H0.585938V9Z"
                                      fill="#83303A"/>
                            </svg>
                        </a>

                    <?php endif; ?>


                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>

        <?php if ($text = get_field('books_text ', 'options')): ?>
            <p class="books-description"><?php echo $text; ?></p>
        <?php endif; ?>

        <div class="books-reviews-title ">
            <?php if ($title = get_field('books_title_review ', 'options')): ?>
                <h2 class="general"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($subtitle = get_field('books_subtitle_review ', 'options')): ?>
                <p><?php echo $subtitle; ?></p>
            <?php endif; ?>
        </div>
        <?php
        $args = booksGetDefaultQueryArgs();
        $the_query2 = new WP_Query($args);
        $current_page = $the_query2->query_vars['paged'];
        ?>

        <?php if ($the_query2->have_posts()) :

            $showposts = get_option('posts_per_page');
            $totalpost = $the_query2->found_posts;
            ?>

            <div class="books-reviews-count w-100">
                <?php echo $totalpost; ?><?php echo esc_html(' POSTS'); ?>
            </div>

            <div class="books-reviews  ">
                <?php while ($the_query2->have_posts()) :
                    $the_query2->the_post();
                    get_template_part( 'template-parts/content-books-review' );
                    ?>

                <?php endwhile; ?>

            </div>

        <?php

        endif; ?>
        <?php wp_reset_query(); ?>
        <div class="articles-arrows books-arrows flex justify-between align-center w-100 hide-on-mobile">
            <!-- Next page -->
            <button class="prev-arrow-books flex align-center" <?php echo $the_query2->found_posts <= $args['posts_per_page'] ? 'disabled' : ''; ?>
                    data-filter-paged="+">
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.08062 6.99999L18 6.99999C18.5523 6.99999 19 6.55228 19 5.99999C19 5.44771 18.5523 4.99999 18 4.99999L3.08062 4.99999L5.78087 1.62469C6.12588 1.19343 6.05596 0.564135 5.62469 0.219125C5.19343 -0.125885 4.56414 -0.0559635 4.21913 0.375299L0.469009 5.06295C0.422319 5.12131 0.380603 5.18229 0.343861 5.24533C0.133177 5.42867 0 5.69878 0 5.99999C0 6.30121 0.133177 6.57132 0.343861 6.75465C0.380603 6.81769 0.422319 6.87867 0.469009 6.93704L4.21913 11.6247C4.56414 12.056 5.19343 12.1259 5.62469 11.7809C6.05596 11.4359 6.12588 10.8066 5.78087 10.3753L3.08062 6.99999Z"
                          fill="black"/>
                </svg>
                Older
            </button>
            <button class="next-arrow-books flex align-center" <?php echo $args['paged'] === 1 ? 'disabled' : ''; ?>
                    data-filter-paged="-">
                Newer
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M15.9194 6.99999L1 6.99999C0.447716 6.99999 0 6.55228 0 5.99999C0 5.44771 0.447716 4.99999 1 4.99999L15.9194 4.99999L13.2191 1.62469C12.8741 1.19343 12.944 0.564135 13.3753 0.219125C13.8066 -0.125885 14.4359 -0.0559635 14.7809 0.375299L18.531 5.06295C18.5777 5.12131 18.6194 5.18229 18.6561 5.24533C18.8668 5.42867 19 5.69878 19 5.99999C19 6.30121 18.8668 6.57132 18.6561 6.75465C18.6194 6.81769 18.5777 6.87867 18.531 6.93704L14.7809 11.6247C14.4359 12.056 13.8066 12.1259 13.3753 11.7809C12.944 11.4359 12.8741 10.8066 13.2191 10.3753L15.9194 6.99999Z"
                          fill="black"/>
                </svg>
            </button>
        </div>

        <div class="lm-btn loadmore-books w-100 flex justify-center show-on-mobile">
            <!--            --><?php //if ($the_query->max_num_pages > 1) : ?>
            <button class="button" id="loadmore-books" data-counter="<?php echo $counter; ?>">
                View more
            </button>
            <!--            --><?php //endif; ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>

