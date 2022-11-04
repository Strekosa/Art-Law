<section class="interns wrapper">
    <div class="interns-main container-boxed flex column ">
        <div class="interns-title flex column ">
            <?php
            $title = get_sub_field('title');
            if ($title) : ?>
                <h2 class="general"> <?php echo $title; ?></h2>
            <?php endif; ?>

        </div>


        <?php
        add_filter('pre_get_posts', 'number_of_posts_on_archive');
        function number_of_posts_on_archive($query)
        {

            $query->set('posts_per_page', 999);

            return $query;
        }

        $terms_year = array(
            'post_type' => array('employees'),
            'post_per_page' => -1,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'team', // Taxonomy, in my case I need default post categories
                    'field' => 'slug',
                    'terms' => 'interns', // Your category slug (I have a category 'interior')
                ),
            ),
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
        <form action="" class="show-on-mobile pos-rel">
            <select name="" id="" class="select-years-filter">

                <?php

                foreach ($years as $year): ?>
                    <option value=".<?php echo $year; ?>"><?php echo $year; ?></option>

                <?php endforeach;

                ?>
            </select>
        </form>
        <div class="isotop-filter">
            <?php
            $i = 1;
            foreach ($years as $year): ?>
                <h5 class="title-year bold hide-on-mobile"><?php echo $year; ?></h5>
                <div class="interns-all <?php echo $year; if($i>1){echo ' hide-on-mobile-filter';} ?> ">

                    <?php
                    $args = array(
                        'post_type' => 'employees',
                        'orderby' => 'description',
                        'order' => 'ASC',
                        'post_per_page' => -1,
                        'post_status' => 'publish',
                        'hide_empty' => true,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'team', // Taxonomy, in my case I need default post categories
                                'field' => 'slug',
                                'terms' => 'interns', // Your category slug (I have a category 'interior')
                            ),
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
                            ?>


                            <div class="interns-item flex column">
                                <h5 class="bold"><?php the_title(); ?></h5>
                                <h6>
                                    <?php echo $position; ?>
                                </h6>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div>
            <?php
            $i++;
            endforeach; ?>
        </div>

    </div>

</section>
