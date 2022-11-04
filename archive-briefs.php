<?php

/*

Template Name: Briefs

*/

get_header(); ?>

<section class="briefs wrapper">
    <div class="briefs-main container-boxed flex column ">
        <div class="briefs-title text-center sm-text-start">
            <div class="briefs-title-wrap text-center sm-text-start">
                <?php if ($briefs_text = get_field('briefs_text ', 'options')): ?>
                    <?php echo $briefs_text; ?>
                <?php endif; ?>
            </div>
        </div>
        <h4> Search by Years</h4>
        <div class="briefs-posts flex  hide-on-mobile">

            <?php
            add_filter('pre_get_posts', 'number_of_posts_on_archive');
            function number_of_posts_on_archive($query)
            {

                $query->set('posts_per_page', 999);

                return $query;
            }

            $terms_year = array(
                'post_type' => array('briefs'),
                'post_per_page' => -1,
                'post_status' => 'publish',

            );

            $years = array();
            $query_year = new WP_Query($terms_year);


            if ($query_year->have_posts()) :
                while ($query_year->have_posts()) : $query_year->the_post();
                    $year = get_the_date('Y');
                    if (!in_array($year, $years)) {
                        $years[] = $year;
                    }

                endwhile;
                wp_reset_postdata();
            endif; ?>

            <div class="briefs-filter flex column">
                <?php foreach ($years as $year): ?>

                    <button class="briefs-filter-button" data-filter-date="<?php echo $year; ?>">
                        <?php echo $year; ?>
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7 4.81505L2.35304 0.168091L0 2.52113L5.82348 8.34461C6.47325 8.99439 7.52675 8.99439 8.17652 8.34461L14 2.52113L11.647 0.168091L7 4.81505Z"
                                  fill="#1F2E45"/>
                        </svg>
                    </button>
                <?php endforeach; ?>

            </div>
            <div class="ajax-filter brief-filter-ajax">
                <?php
                $i = 1;
                foreach ($years as $year):
                    if ($i === 1):
                        ?>

                        <div class="briefs-all">
                            <?php
                            $args = array(
                                'post_type' => 'briefs',
                                'orderby' => 'description',
                                'order' => 'ASC',
                                'post_per_page' => -1,
                                'post_status' => 'publish',
                                'hide_empty' => true,
                                'date_query' => array(array(
                                    'year' => $year,
                                ),),


                            );
                            $the_query = new WP_Query($args);
                            ?>
                            <?php if ($the_query->have_posts()) : ?>

                                <?php while ($the_query->have_posts()) :
                                    $the_query->the_post();
                                    $do_not_duplicate = $post->ID;
                                    $position = get_field('position');
                                    $year = get_the_date('Y');
                                    ?>


                                    <a href=" <?php the_permalink(); ?>"
                                       class="briefs-item flex column justify-between">
                                        <?php the_title(); ?>
                                        <svg width="53" height="16" viewBox="0 0 53 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M52.0234 8.70711C52.4139 8.31658 52.4139 7.68342 52.0234 7.29289L45.6594 0.928932C45.2689 0.538408 44.6357 0.538408 44.2452 0.928932C43.8547 1.31946 43.8547 1.95262 44.2452 2.34315L49.9021 8L44.2452 13.6569C43.8547 14.0474 43.8547 14.6805 44.2452 15.0711C44.6357 15.4616 45.2689 15.4616 45.6594 15.0711L52.0234 8.70711ZM0.585938 9H51.3163V7H0.585938V9Z"
                                                  fill="#83303A"/>
                                        </svg>

                                    </a>

                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>

                            <?php endif; ?>
                        </div>
                    <?php
                    endif;
                    $i++;
                endforeach; ?>
            </div>
        </div>

        <div class="briefs-posts flex  show-on-mobile">

            <?php
            $terms_year = array(
                'post_type' => array('briefs'),
                'post_per_page' => -1,
                'post_status' => 'publish',
            );

            $years = array();
            $query_year = new WP_Query($terms_year);


            if ($query_year->have_posts()) :
                while ($query_year->have_posts()) : $query_year->the_post();
                    $year = get_the_date('Y');
                    if (!in_array($year, $years)) {
                        $years[] = $year;
                    }

                endwhile;
                wp_reset_postdata();
            endif; ?>

            <div class="briefs-filter flex column ">
                <?php
                foreach ($years as $year): ?>

                        <button class="briefs-filter-button" data-filter-date="<?php echo $year; ?>">
                            <?php echo $year; ?>
                            <svg width="14" height="9" viewBox="0 0 14 9" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7 4.81505L2.35304 0.168091L0 2.52113L5.82348 8.34461C6.47325 8.99439 7.52675 8.99439 8.17652 8.34461L14 2.52113L11.647 0.168091L7 4.81505Z"
                                      fill="#1F2E45"/>
                            </svg>
                        </button>

                        <div class="ajax-filter briefs-filter-accordion ">
                            <div class="briefs-all ">
                                <?php
                                $args = array(
                                    'post_type' => 'briefs',
                                    'orderby' => 'description',
                                    'order' => 'ASC',
                                    'post_per_page' => -1,
                                    'post_status' => 'publish',
                                    'hide_empty' => true,
                                    'date_query' => array(array(
                                        'year' => $year,
                                    ),),


                                );
                                $the_query = new WP_Query($args);
                                ?>
                                <?php if ($the_query->have_posts()) : ?>

                                    <?php while ($the_query->have_posts()) :
                                        $the_query->the_post();
                                        $do_not_duplicate = $post->ID;
                                        $position = get_field('position');
                                        $year = get_the_date('Y');
                                        ?>

                                        <div class="briefs-items">

                                                <div class="briefs-item accordion-inner flex  justify-between align-center question">
                                                    <?php the_title(); ?>
                                                    <svg class="lock" width="32" height="16" viewBox="0 0 32 16"
                                                         fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M31.0889 8.70711C31.4795 8.31658 31.4795 7.68342 31.0889 7.29289L24.725 0.928932C24.3345 0.538408 23.7013 0.538408 23.3108 0.928932C22.9202 1.31946 22.9202 1.95262 23.3108 2.34315L28.9676 8L23.3108 13.6569C22.9202 14.0474 22.9202 14.6805 23.3108 15.0711C23.7013 15.4616 24.3345 15.4616 24.725 15.0711L31.0889 8.70711ZM0.381836 9H30.3818V7H0.381836V9Z"
                                                              fill="#83303A"/>
                                                    </svg>
                                                    <svg class="unlock" width="15" height="21" viewBox="0 0 15 21"
                                                         fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.08894 20.7071C7.69842 21.0976 7.06525 21.0976 6.67473 20.7071L0.310768 14.3431C-0.0797563 13.9526 -0.0797563 13.3195 0.310768 12.9289C0.701293 12.5384 1.33446 12.5384 1.72498 12.9289L7.38184 18.5858L13.0387 12.9289C13.4292 12.5384 14.0624 12.5384 14.4529 12.9289C14.8434 13.3195 14.8434 13.9526 14.4529 14.3431L8.08894 20.7071ZM8.38184 0L8.38184 20H6.38184L6.38184 0L8.38184 0Z"
                                                              fill="white"/>
                                                    </svg>
                                                </div>
                                                <div class="briefs-item-content answer-inner">
                                                    <?php the_content(); ?>

                                                </div>

                                        </div>

                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>

                                <?php endif; ?>
                            </div>
                        </div>

                <?php
                endforeach; ?>
            </div>
        </div>

    </div>

</section>
<script>

    $(document).ready(function () {

        $('.briefs-filter-button').first().addClass('open');

    });
</script>

<?php get_footer(); ?>

