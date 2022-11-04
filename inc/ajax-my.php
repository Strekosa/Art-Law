<?php


function loadmore_get_posts()
{
    $arg = array(
        'post_type' => 'post',
        'orderby' => 'date',
        'posts_per_page' => 999,

        'tax_query' => array(
            array(
                'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
                'field' => 'slug',
                'terms' => 'press-publications', // Your category slug (I have a category 'interior')
            ),
        )
    );

    if (isset($_POST['offset'])) {
        $arg['offset'] = $_POST['offset'];
    }


    $the_query = new WP_Query($arg);
    if ($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) :
            $the_query->the_post();
            $link = get_field('post_link');
            ?>
            <div class="publication hide-on-mobile">
                <div class="publication-content flex column justify-between">
                    <div class="publication-text flex column">
                        <h3><?php echo wp_trim_words(get_the_title(), 26); ?></h3>
                    </div>
                    <div class="publication-info flex justify-between">
                        <div class="publication-date"><?php echo get_the_date(); ?></div>

                        <?php
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="publication-link hide-on-mobile" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?> _blank">
                                <?php echo esc_html($link_title); ?>
                            </a>

                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <div class="publication show-on-mobile">
                <?php
                if ($link):
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="publication-content flex column justify-between" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?> _blank">
                        <div class="publication-text flex column">
                            <h3><?php echo wp_trim_words(get_the_title(), 26); ?></h3>
                        </div>
                        <div class="publication-info flex justify-between">
                            <div class="publication-date"><?php echo get_the_date(); ?></div>

                        </div>
                    </a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>

    <?php endif;

    die();
}

add_action('wp_ajax_loadmore', 'loadmore_get_posts');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_get_posts');


function loadmore_books()
{
    $args = array(
        'post_type' => 'books',
        'orderby' => 'description',
        'order' => 'ASC',
        'posts_per_page' => 999,
        'paged' => 1,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'kinds',
                'terms' => 'reviews',
                'field' => 'slug',
            )
        ),
    );


    if (isset($_POST['offset'])) {
        $args['offset'] = $_POST['offset'];
    }

    $the_query2 = new WP_Query($args);
    if ($the_query2->have_posts()) : ?>

        <?php while ($the_query2->have_posts()) :
            $the_query2->the_post();
            get_template_part('template-parts/content-books-review');
            ?>

        <?php endwhile; ?>

    <?php endif;

    die();
}

add_action('wp_ajax_loadmore-books', 'loadmore_books');
add_action('wp_ajax_nopriv_loadmore-books', 'loadmore_books');


function filter_date_get_posts()
{
    ?>
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
    <div class="briefs-all">
        <?php
        $args = array(
            'post_type' => 'briefs',
            'orderby' => 'description',
            'order' => 'ASC',
            'post_per_page' => -1,
            'post_status' => 'publish',
            'hide_empty' => true,
        );

        if (isset($_POST['date'])) {
            $args['date_query'][] = ['year' => $_POST['date']];
        }

        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>

            <?php while ($the_query->have_posts()) :
                $the_query->the_post();
                $do_not_duplicate = $post->ID;
                $position = get_field('position');
                $year = get_the_date('Y');
                ?>


                <a href="<?php the_permalink(); ?>" class="briefs-item flex column justify-between">
                    <?php the_title(); ?>
                    <svg width="53" height="16" viewBox="0 0 53 16" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M52.0234 8.70711C52.4139 8.31658 52.4139 7.68342 52.0234 7.29289L45.6594 0.928932C45.2689 0.538408 44.6357 0.538408 44.2452 0.928932C43.8547 1.31946 43.8547 1.95262 44.2452 2.34315L49.9021 8L44.2452 13.6569C43.8547 14.0474 43.8547 14.6805 44.2452 15.0711C44.6357 15.4616 45.2689 15.4616 45.6594 15.0711L52.0234 8.70711ZM0.585938 9H51.3163V7H0.585938V9Z"
                              fill="#83303A"/>
                    </svg>

                </a>

            <?php endwhile; ?>
            <?php die(); ?>

        <?php endif; ?>
    </div>
    <?php
}

add_action('wp_ajax_filter-date', 'filter_date_get_posts');
add_action('wp_ajax_nopriv_filter-date', 'filter_date_get_posts');


function filter_date_get_case_law()
{
    ?>
    <?php
    add_filter('pre_get_posts', 'number_of_posts_on_archive');
    function number_of_posts_on_archive($query)
    {

        $query->set('posts_per_page', 999);

        return $query;
    }

    $terms_year = array(
        'post_type' => array('case-law-archives'),
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
    <div class="case-law-corner-all">
        <?php
        $args = array(
            'post_type' => 'case-law-archives',
            'orderby' => 'description',
            'order' => 'ASC',
            'post_per_page' => -1,
            'post_status' => 'publish',
            'hide_empty' => true,
        );

        if (isset($_POST['date'])) {
            $args['date_query'][] = ['year' => $_POST['date']];
        }

        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>

            <?php while ($the_query->have_posts()) :
                $the_query->the_post();
                $do_not_duplicate = $post->ID;
                $year = get_the_date('Y');
                get_template_part('template-parts/content-case-law-archive')
                ?>


            <?php endwhile; ?>
            <?php die(); ?>

        <?php endif; ?>
    </div>
    <?php
}

add_action('wp_ajax_filter-date-case-law', 'filter_date_get_case_law');
add_action('wp_ajax_nopriv_filter-date-case-law', 'filter_date_get_case_law');


function filter_date_get_newsletters()
{
    ?>
    <?php
    add_filter('pre_get_posts', 'number_of_posts_on_archive');
    function number_of_posts_on_archive($query)
    {
        if (isset($_POST['number']) && $_POST['number'] !== 'all') {
            $query->set('posts_per_page', $_POST['number']);
        } else {
            $query->set('posts_per_page', 999);
        }


        return $query;
    }

    $terms_year = array(
        'post_type' => array('newsletters'),
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
    <?php
    $args = array(
        'post_type' => 'newsletters',
        'orderby' => 'description',
        'order' => 'DESC',
        'post_per_page' => -1,
        'post_status' => 'publish',
        'hide_empty' => true,
    );

    if (isset($_POST['date'])) {
        $args['date_query'][] = ['year' => $_POST['date']];
    }
    if (isset($_POST['number']) && $_POST['number'] !== 'all') {
        $args['post_per_page'] = $_POST['number'];
    }

    $the_query = new WP_Query($args);
    ?>

    <?php if ($the_query->have_posts()) : ?>

    <?php while ($the_query->have_posts()) :
        $the_query->the_post();
        $do_not_duplicate = $post->ID;
        $year = get_the_date('Y');
        get_template_part('template-parts/content-newsletters')
        ?>


    <?php endwhile; ?>

    <?php if ($the_query->found_posts > 5) : ?>
        <div class="lm-btn loadmore-newsletters w-100 flex justify-center show-on-mobile">
            <button class="button" id="loadmore-newsletters" data-counter="<?php echo $counter; ?>">
                View more
            </button>
        </div>
    <?php endif; ?>

<?php endif; ?>

    <?php die(); ?>
    <?php
}

add_action('wp_ajax_filter-date-newsletters', 'filter_date_get_newsletters');
add_action('wp_ajax_nopriv_filter-date-newsletters', 'filter_date_get_newsletters');


function loadmore_newsletters()
{
    ?>
    <?php
    add_filter('pre_get_posts', 'number_of_posts_on_archive');
    function number_of_posts_on_archive($query)
    {

        $query->set('posts_per_page', 999);

        return $query;
    }

    $terms_year = array(
        'post_type' => array('newsletters'),
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

    <?php
    add_filter('pre_get_posts', 'number_of_posts_on_archive1');
    function number_of_posts_on_archive1($query)
    {
        $query->set('posts_per_page', 999);
        return $query;
    }


//    if (isset($_POST['offset'])) {
//        $args['offset'] = $_POST['offset'];
//    }

    $args2 = array(
        'post_type' => 'newsletters',
        'orderby' => 'description',
        'order' => 'DESC',
        'post_per_page' => -1,
        'post_status' => 'publish',
        'hide_empty' => true,
        'offset' => 5,

    );

    if (isset($_POST['date'])) {
        $args2['date_query'][] = ['year' => $_POST['date']];
    }

    $the_query = new WP_Query($args2); ?>

    <?php if ($the_query->have_posts()) : ?>

    <?php while ($the_query->have_posts()) :
        $the_query->the_post();
        $do_not_duplicate = $post->ID;
        $year = get_the_date('Y');
        get_template_part('template-parts/content-newsletters')
        ?>

    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>


    <?php wp_die();

}

add_action('wp_ajax_loadmore-newsletters', 'loadmore_newsletters');
add_action('wp_ajax_nopriv_loadmore-newsletters', 'loadmore_newsletters');


function filter_date_get_events()
{
    ?>
    <?php
    add_filter('pre_get_posts', 'number_of_posts_on_archive');
    function number_of_posts_on_archive($query)
    {

        $query->set('posts_per_page', 999);

        return $query;
    }

    $terms_year = array(
        'post_type' => array('events'),
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

    <div class="events-archive-all">
        <?php
        add_filter('pre_get_posts', 'number_of_posts_on_archive1');
        function number_of_posts_on_archive1($query)
        {

            $query->set('posts_per_page', 6);

            return $query;
        }

        $args = array(
            'post_type' => 'events',
            'orderby' => 'date',
            'order' => 'DESC',
            'post_per_page' => 6,
            'post_status' => 'publish',
            'hide_empty' => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'types',
                    'terms' => 'programming',
                    'field' => 'slug',
                    'operator' => 'NOT IN',
                )
            ),
        );

        if (isset($_POST['date'])) {
            $args['date_query'][] = ['year' => $_POST['date']];
        }

        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>

            <?php while ($the_query->have_posts()) :
                $the_query->the_post();
                $do_not_duplicate = $post->ID;
                $position = get_field('position');
                $year = get_the_date('Y');
                ?>


                <a href="<?php the_permalink(); ?>" class="events-archive-item  flex column ">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="events-archive-img">
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </div>
                    <?php endif; ?>
                    <div class="events-archive-content flex column">
                        <h3><?php the_title(); ?> </h3>
                        <div class="events-archive-date">
                            <?php echo get_the_date('l, F j , Y'); ?>
                        </div>
                    </div>
                </a>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php endif; ?>
        <div class="lm-btn loadmore-events w-100 flex justify-center">
            <?php if ($the_query->max_num_pages > 1) : ?>
                <button class="button" id="loadmore-events" data-counter="<?php echo $counter; ?>">View more</button>
            <?php endif; ?>
        </div>
    </div>


    <?php wp_die();
}

add_action('wp_ajax_filter-date-events', 'filter_date_get_events');
add_action('wp_ajax_nopriv_filter-date-events', 'filter_date_get_events');


function loadmore_events()
{
    ?>
    <?php
    add_filter('pre_get_posts', 'number_of_posts_on_archive');
    function number_of_posts_on_archive($query)
    {

        $query->set('posts_per_page', 999);

        return $query;
    }

    $terms_year = array(
        'post_type' => array('events'),
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

    <?php
    add_filter('pre_get_posts', 'number_of_posts_on_archive1');
    function number_of_posts_on_archive1($query)
    {

        $query->set('posts_per_page', 999);

        return $query;
    }

    $args = array(
        'post_type' => 'events',
        'orderby' => 'description',
        'order' => 'ASC',
        'post_per_page' => 999,
        'post_status' => 'publish',
        'hide_empty' => true,
        'tax_query' => array(
            array(
                'taxonomy' => 'types',
                'terms' => 'programming',
                'field' => 'slug',
                'operator' => 'NOT IN',
            )
        ),
    );

//    if (isset($_POST['offset'])) {
//        $args['offset'] = $_POST['offset'];
//    }

    if (isset($_POST['date'])) {
        $args['date_query'][] = ['year' => $_POST['date']];
    }

    $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) : ?>

    <?php while ($the_query->have_posts()) :
        $the_query->the_post();
        $do_not_duplicate = $post->ID;
        $position = get_field('position');
        $year = get_the_date('Y');
        get_template_part('template-parts/content-events-archive')
        ?>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php endif; ?>


    <?php wp_die();
}

add_action('wp_ajax_loadmore-event', 'loadmore_events');
add_action('wp_ajax_nopriv_loadmore-event', 'loadmore_events');


