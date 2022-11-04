<?php

/*

Template Name: Newsletters

*/

get_header(); ?>

<section class="newsletters wrapper">
    <div class="newsletters-main container-boxed flex column ">
        <div class="newsletters-title text-center sm-text-start">
            <div class="newsletters-title-wrap text-center sm-text-start">
                <?php if ($newsletters_title = get_field('newsletters_title ', 'options')): ?>
                    <h2 class="general"><?php echo $newsletters_title; ?></h2>
                <?php endif; ?>
                <?php if ($newsletters_text = get_field('newsletters_text ', 'options')): ?>
                    <?php echo $newsletters_text; ?>
                <?php endif; ?>
            </div>
        </div>
        <h4> Search by Years</h4>
        <div class="newsletters-posts flex flex-sm-column">

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

            <div class="newsletters-filter flex column hide-on-mobile">
                <?php $query_date = ''; ?>
                <?php
                $i = 1;
                foreach ($years as $year): ?>
                    <?php if ($i === 1) {
                        $query_date = $year;
                    }; ?>
                    <button class="newsletters-filter-button" data-filter-date="<?php echo $year; ?>">
                        <?php echo $year; ?>
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7 4.81505L2.35304 0.168091L0 2.52113L5.82348 8.34461C6.47325 8.99439 7.52675 8.99439 8.17652 8.34461L14 2.52113L11.647 0.168091L7 4.81505Z"
                                  fill="#1F2E45"/>
                        </svg>
                    </button>
                    <?php
                    $i++;
                endforeach; ?>

            </div>

            <div class="newsletters-filter flex column pos-rel show-on-mobile">
                <select name="newsletters-filter-select" id="newsletters-filter-select">
                    <?php
                    $i = 1;
                    $query_date2 = '';
                    foreach ($years as $year): ?>
                        <?php if ($i === 1) {
                            $query_date2 = $year;
                        }; ?>
                        <option class="newsletters-filter-button" value="<?php echo $year; ?>"
                                data-filter-date="<?php echo $year; ?>" <?php if ($i === 1) {
                            echo 'currency';
                        }; ?> >
                            <?php echo $year; ?>
                        </option>
                        <?php
                        $i++;
                    endforeach; ?>
                </select>
            </div>


            <?php

            $args = newslettersGetQueryArgs($query_date);
            $args2 = newslettersGetQueryArgsmob($query_date2);
            $the_query = new WP_Query($args);
            ?>
            <div class="ajax-filter newsletters-filter-ajax">
                <?php
                $i = 1;
                foreach ($years as $year):
                    if ($i === 1):
                        ?>

                        <div class="newsletters-all newsletters-filter-ajax-desctop hide-on-mobile">
                            <?php $the_query = new WP_Query($args); ?>
                            <?php if ($the_query->have_posts()) : ?>
                                <?php while ($the_query->have_posts()) :
                                    $the_query->the_post();
                                    $do_not_duplicate = $post->ID;
                                    $position = get_field('position');
                                    $year = get_the_date('Y');
                                    get_template_part('template-parts/content-newsletters')
                                    ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="newsletters-all newsletters-filter-ajax-mobile show-on-mobile">
                            <?php
                            add_filter('pre_get_posts', 'number_of_posts_on_archive2');
                            function number_of_posts_on_archive2($query)
                            {

                                $query->set('posts_per_page', 5);

                                return $query;
                            }

                            $the_query = new WP_Query($args2); ?>
                            <?php if ($the_query->have_posts()) : ?>
                                <?php while ($the_query->have_posts()) :
                                    $the_query->the_post();
                                    $do_not_duplicate = $post->ID;
                                    $position = get_field('position');
                                    $year = get_the_date('Y');
                                    get_template_part('template-parts/content-newsletters')
                                    ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                            <div class="lm-btn loadmore-newsletters w-100 flex justify-center">
                                <?php if ($the_query->max_num_pages > 1) : ?>
                                    <button class="button" id="loadmore-newsletters"
                                            data-counter="<?php echo $counter; ?>">
                                        View more
                                    </button>
                                <?php endif; ?>
                            </div>

                        </div>
                    <?php
                    endif;
                    $i++;
                endforeach; ?>
            </div>
        </div>

    </div>

</section>
<script>

    $(document).ready(function () {
        $('.newsletters-filter-button').first().addClass('open');
        jQuery('select').on('change', function () {
            jQuery(this).addClass('hover-select');
            jQuery(this).parent().addClass('hover-select-arrow')
        });

    });
</script>

<?php get_footer(); ?>

