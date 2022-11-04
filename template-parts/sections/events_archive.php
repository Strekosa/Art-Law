<section class="events-archive wrapper" id="events-archive">
    <div class="events-archive-main container-boxed flex column ">
        <h4> Search by Years</h4>
        <div class="events-archive-posts flex flex-sm-column">

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

            <div class="events-archive-filter flex column hide-on-mobile">
                <?php foreach ($years as $year): ?>

                    <button class="events-archive-button" data-filter-date="<?php echo $year; ?>">
                        <?php echo $year; ?>
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7 4.81505L2.35304 0.168091L0 2.52113L5.82348 8.34461C6.47325 8.99439 7.52675 8.99439 8.17652 8.34461L14 2.52113L11.647 0.168091L7 4.81505Z"
                                  fill="#1F2E45"/>
                        </svg>
                    </button>

                <?php endforeach; ?>
            </div>

            <div class="events-archive-filter flex column pos-rel show-on-mobile">
                <select name="events-filter" id="events-archive-filter">
                    <?php foreach ($years as $year): ?>
                        <option class="events-archive-button" value="<?php echo $year; ?>"
                                data-filter-date="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="ajax-filter events-archive-ajax">

                <?php
                add_filter('pre_get_posts', 'number_of_posts_on_archive1');
                function number_of_posts_on_archive1($query)
                {

                    $query->set('posts_per_page', 6);

                    return $query;
                }

                $i = 1;
                foreach ($years as $year):
                    if ($i === 1):
                        ?>

                        <div class="events-archive-all">
                            <?php
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
                                    $link = get_field('event_link');
                                    get_template_part('template-parts/content-events-archive')
                                    ?>

                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>

                            <?php endif; ?>
                            <div class="lm-btn loadmore-events w-100 flex justify-center">
                                <?php if ($the_query->max_num_pages > 1) : ?>
                                    <button class="button" id="loadmore-events" data-counter="<?php echo $counter; ?>">
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

    jQuery(document).ready(function () {
        jQuery('select').on('change', function () {
            jQuery(this).addClass('hover-select');
            jQuery(this).parent().addClass('hover-select-arrow')
        });

        jQuery('.events-archive-button').first().addClass('active-date');

    });
</script>


