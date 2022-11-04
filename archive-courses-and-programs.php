<?php
/*
Template Name: Courses and Programs
*/
get_header(); ?>

<section class="courses-and-programs wrapper">
    <div class="courses-and-programs-main container-boxed flex column align-center">
        <div class="courses-and-programs-title text-center xs-text-start">
            <?php if ($title = get_field('courses_title ', 'options')): ?>
                <h2 class="general"><?php echo $title; ?></h2>
            <?php endif; ?>

            <p>Last updated: <?php echo get_the_date(); ?></p>
        </div>

        <div class="courses-and-programs-all">
            <?php
            add_filter('pre_get_posts', 'number_of_posts_on_archive');
            function number_of_posts_on_archive($query)
            {

                $query->set('posts_per_page', 999);

                return $query;
            }

            $args = array(
                'post_type' => 'courses-and-programs',
                'orderby' => 'description',
                'order' => 'ASC',
                'post_per_page' => -1,
                'post_status' => 'publish',
                'hide_empty' => true,

            );
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>

                <?php while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $do_not_duplicate = $post->ID;

                    ?>


                    <a href="<?php the_permalink(); ?>" class="courses-and-programs-item flex column justify-between">
                        <h3> <?php the_title(); ?></h3>

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

    </div>
</section>
<script>

    $(document).ready(function () {


    });
</script>

<?php get_footer(); ?>

