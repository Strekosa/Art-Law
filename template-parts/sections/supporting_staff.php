<section class="supporting-staff wrapper">
    <div class="supporting-staff-main container-boxed flex column ">
        <div class="supporting-staff-title flex column ">
            <?php
            $title = get_sub_field('title');
            if ($title) : ?>
                <h2 class="general"> <?php echo $title; ?></h2>
            <?php endif; ?>

        </div>

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $arg = array(
            'post_type' => 'employees',
            'orderby' => 'description',
            'order' => 'ASC',
            'hide_empty' => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'team', // Taxonomy, in my case I need default post categories
                    'field' => 'slug',
                    'terms' => 'supporting-staff', // Your category slug (I have a category 'interior')
                ),
            )
        );

        $the_query = new WP_Query($arg);
        $counter = $the_query->found_posts;
        if ($the_query->have_posts()) : ?>
            <?php single_cat_title($prefix, $display); ?>
            <div class="supporting-staff-all ">
                <?php while ($the_query->have_posts()) :
                $the_query->the_post();
                $do_not_duplicate = $post->ID;
                $position = get_field('position');
                ?><!-- BEGIN of Post -->

                <div class="supporting-staff-item flex column">

                    <h5 class="bold">
                        <?php echo $position; ?>
                    </h5>
                    <h6><?php the_title(); ?></h6>

                </div>

                <?php

                endwhile; ?><!-- END of Post -->

            </div><!-- END of .post-type -->
        <?php endif;
        wp_reset_query(); ?>
    </div>

</section>
